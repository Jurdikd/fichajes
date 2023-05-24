export const urlGetTerror = {
	get: (param) => {
		const urlSearchParams = new URLSearchParams(window.location.search);
		const params = Object.fromEntries(urlSearchParams.entries());
		return params[param];
	},
};
