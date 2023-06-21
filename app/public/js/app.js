/* app */
import { loadingTerror } from "./loadingTerror.js"; // This is while the page it's loading everething

// Load page
document.addEventListener("DOMContentLoaded", async () => {

	// Loader message
	await loadingTerror.message(document.getElementById("msgPreloader"));

	// Loader
	loadingTerror.load(document.getElementById("preloader"), 5000);
});

// Escuchar el evento 'online' del objeto window
window.addEventListener("online", () => {
	// Mostrar un mensaje de éxito cuando se establece la conexión a Internet
	terroralert.swal(alertPosition, "success", "Conexión establecida", 8000);
	console.log("Conexión establecida");
});

// Escuchar el evento 'offline' del objeto window
window.addEventListener("offline", () => {
	// Mostrar un mensaje de error cuando se pierde la conexión a Internet
	terroralert.swal(alertPosition, "warning", "Sin conexión", 8000);
	console.log("Sin conexión");
});


let originalTitle = document.title;
let newTitle =
	lang.t("app.components.tittles.page_return", "¡🖖🏼No te vayas vuelve!") +
	" | " +
	originalTitle;

window.addEventListener("blur", () => {
	document.title = newTitle;
});

window.addEventListener("focus", () => {
	document.title = originalTitle;
});
