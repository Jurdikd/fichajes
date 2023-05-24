document.addEventListener("DOMContentLoaded", async () => {
	lang.changeDataI18n();
});

const lang = new TerrorLang({
	defaultLanguage: "es",
	resources: {
		es: "../../json/translations/page/es_0.1.json",
		en: "../../json/translations/en.json",
		pt: "../../json/translations/pt.json",
		ar: "../../json/translations/ar.json",
		zh: "../../json/translations/zh.json",
		ko: "../../json/translations/ko.json",
		ja: "../../json/translations/ja.json",
	},
});

const lgNav = window.navigator.language || navigator.browserLanguage;
const lg = lgNav.substring(0, 2);

const SetLg = (lg) => {
	const html = document.getElementById("html5");
	if (lg == "es") {
		html.setAttribute("dir", dirHtml.ltr);
		html.setAttribute("lang", "es-VE");
	} else if (lg == "en") {
		html.setAttribute("dir", dirHtml.ltr);
		html.setAttribute("lang", lg);
	} else if (lg == "pt") {
		html.setAttribute("dir", dirHtml.ltr);
		html.setAttribute("lang", lg);
	} else if (lg == "ar") {
		html.setAttribute("dir", dirHtml.rtl);
		html.setAttribute("lang", lg);
	} else if (lg == "zh") {
		html.setAttribute("dir", dirHtml.ltr);
		html.setAttribute("lang", lg);
	} else if (lg == "ko") {
		html.setAttribute("dir", dirHtml.ltr);
		html.setAttribute("lang", lg);
	} else if (lg == "ja") {
		html.setAttribute("dir", dirHtml.ltr);
		html.setAttribute("lang", lg);
	} else {
		html.setAttribute("dir", dirHtml.ltr);
		html.setAttribute("lang", "es-VE");
	}
};
const dirHtml = {
	ltr: "ltr",
	rtl: "rtl",
};

if (!localStorage.getItem("language")) {
	localStorage.setItem("language", lg);
	SetLg(lg);
} else {
	SetLg(localStorage.getItem("language"));
}

//lang
lang.loadLanguage(localStorage.getItem("language"));

function changeLanguage(set) {
	localStorage.setItem("language", set);
	if (localStorage.getItem("language") === set) {
		location.reload(true);
		//location.reload(false);
		//location.assign(location.href);
	}
}
const verifyStorage = () => {
	if (typeof Storage !== "undefined") {
		true;
	} else {
		console.error("LocalStorage no es compatible en este navegador.");
		false;
	}
};
let meta_descripton = lang.t(
	"app.header.meta.meta_description",
	"No hay ninguna URL para copiar2"
);
// set data from meta description
document.getElementById("meta_descripton").setAttribute("content", meta_descripton);

const TerrorFuntions = new middlewaresTerror();
