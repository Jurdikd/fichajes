document.addEventListener("DOMContentLoaded", async () => {});

const TerrorFuntions = new middlewaresTerror();
// Crear una instancia de la clase TerrorFetch
const SERVER = window.location.origin;
const RUTA_IMG = SERVER + "/app/public/img/";
const terrorFetch = new TerrorFetch();
const urlGetTerror = {
	get: (param) => {
		const urlSearchParams = new URLSearchParams(window.location.search);
		const params = Object.fromEntries(urlSearchParams.entries());
		return params[param];
	},
};
