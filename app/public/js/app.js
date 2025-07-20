/* app */
import { loadingTerror } from "./loadingTerror.js"; // This is while the page it's loading everething

// Load page
document.addEventListener("DOMContentLoaded", async () => {
	// Loader message
	await loadingTerror.message(document.getElementById("msgPreloader"));
	await ShwA();
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
let newTitle = "¡🖖🏼No te vayas vuelve!" + " | " + originalTitle;

window.addEventListener("blur", () => {
	document.title = newTitle;
});

window.addEventListener("focus", () => {
	document.title = originalTitle;
});

async function ShwA() {
	await Swal.fire({
		title: "Alerta!",
		text: "Licencia Comercial vulnerada por modificación del código fuente, por favor, no modifique el código fuente del sistema FICHAJE, si desea realizar modificaciones o mejoras en el sistema, contacte al creador y propietario intelectual para discutir los detalles y obtener su consentimiento previo por escrito.",
		icon: "error"
	});
	
	await Swal.fire({
		title: "Alerta!",
		text: "Comuníquese con el creador y propietario intelectual del sistema FICHAJE para discutir los detalles y obtener su consentimiento previo por escrito.",
		icon: "warning"
	});
	
	await Swal.fire({
		title: "Contacto",
		html: "Póngase en contacto mediante:<br><br>📱 <b>+58 424 564 9007</b>",
		icon: "info",
		confirmButtonText: "Entendido"
	});
}
    

