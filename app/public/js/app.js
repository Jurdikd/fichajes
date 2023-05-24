/* app */
import { loadingTerror } from "./loadingTerror.js"; // This is while the page it's loading everething
import { loadRatesTerror } from "./loadRatesTerror.js"; // This is for load or set rates
import { loadRatesData } from "./rates/loadratesdata.js"; // This is for load or set rates
import { calcualteTodayTerror } from "./calcualteTodayTerror.js"; // Import calcualteTodayTerror (funtions) for to calculate

// Load page
document.addEventListener("DOMContentLoaded", async () => {
	// set values
	loadRatesTerror.loadDefault();
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

const btnCreateRate = document.getElementById("btnCreateRate");

btnCreateRate.addEventListener("click", (e) => {
	e.stopPropagation();
	createUrlRate(e);
});

const createUrlRate = (e) => {
	const parent = e.target.parentElement.parentElement;
	const nameCreate = parent.querySelector("#nameCreate");
	const rateCreate = parent.querySelector("#rateCreate");
	const resultRateCreate = parent.querySelector("#resultRateCreate");
	const btnUrl = parent.querySelector("#btnUrl");

	if (rateCreate.value > 0 && nameCreate.value !== "") {
		const jsonData = {
			currency: "ves",
			to: "ves",
			iso: "usd",
			rate: rateCreate.value,
			name: nameCreate.value,
		};

		// compressed
		const compressed = LZString.compressToEncodedURIComponent(JSON.stringify(jsonData));

		let urlCreate = `${window.location.origin}/custom?business=${compressed}&name=${nameCreate.value}`;
		resultRateCreate.value = urlCreate;
		btnUrl.href = urlCreate;
		btnUrl.classList.remove("disabled");
	} else {
		terroralert.swal(alertPosition, "warning", "Debes llenar ambos campos", 7000);
	}
};

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

const copyIcon = document.getElementById("copyIcon");
const input = document.getElementById("resultRateCreate");

copyIcon.addEventListener("click", () => {
	let textAlert = lang.t(
		"app.components.offcanvas.create_rate.alerts.success.copy_url",
		"¡URL copiada correctamente!"
	);
	let textAlert2 = lang.t(
		"app.components.offcanvas.create_rate.alerts.warning.copy_url",
		"No hay ninguna URL para copiar"
	);
	TerrorFuntions.copyInput(input, textAlert, textAlert2);
});
copyIcon.addEventListener("touchstart", () => {
	let textAlert = lang.t(
		"app.components.offcanvas.create_rate.alerts.success.copy_url",
		"¡URL copiada correctamente!"
	);
	let textAlert2 = lang.t(
		"app.components.offcanvas.create_rate.alerts.warning.copy_url",
		"No hay ninguna URL para copiar"
	);
	TerrorFuntions.copyInput(input, textAlert, textAlert2);
});
