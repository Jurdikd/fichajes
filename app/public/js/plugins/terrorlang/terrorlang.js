/**
 * Class Terror Lang
 * t(location, text = null) for get and change textContent
 * changeDataI18n() change everything attribute data-i18n
 */
class TerrorLang {
	constructor(options) {
		this.resources = {};
		this.currentLanguage = null;
		this.cache = {};

		if (options && options.resources) {
			this.resources = options.resources;
		}
	}

	async loadLanguage(lang) {
		//console.log(lang);
		const resourceUrl = this.resources[lang];
		if (!resourceUrl) {
			throw new Error(`Resource not found for language: ${lang}`);
		}

		if (this.currentLanguage !== lang || !this.cache[resourceUrl]) {
			const response = await fetch(resourceUrl);
			const data = await response.json();
			this.cache[resourceUrl] = data;
			console.log(data);
		}
		this.currentLanguage = lang;
	}

	t(location, text = null) {
		//console.log("location T:", location);
		//	console.log("lang:", this.cache[this.resources[this.currentLanguage]]);
		if (!this.currentLanguage) {
			console.warn("No language has been loaded");
			return "";
		}

		const resource = this.cache[this.resources[this.currentLanguage]];

		if (!resource) {
			console.warn("Resource not found in cache");
			return text;
		}

		const keys = location.split(".");
		let value = resource;
		for (let i = 0; i < keys.length; i++) {
			if (keys[i].startsWith("[") && keys[i].endsWith("]")) {
				const index = parseInt(keys[i].substring(1, keys[i].length - 1));
				value = value[index];
			} else {
				value = value[keys[i]];
			}
			if (!value) {
				console.warn(`Translation key not found: ${location}`);
				if (text) {
					return text;
				} else {
					return `Missing Translation: ${location}`;
				}
			}
		}

		return value;
	}

	changeDataI18n() {
		const elements = Array.from(document.querySelectorAll("[data-i18n]"));

		elements.forEach((element) => {
			const location = element.dataset.i18n;
			if (location) {
				const translation = this.t(location);
				if (translation !== `Missing Translation: ${location}` && translation !== "") {
					element.textContent = translation;
				}
			}
		});
	}
}
