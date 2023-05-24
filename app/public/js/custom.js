import { TerrorMoney } from "./TerrorMoney.js"; // This is for to format currencys
import { urlGetTerror } from "./urlGetTerror.js"; // This is for get url
import { loadRatesTerror } from "./loadRatesTerror.js"; // This is for load or set rates
// Load page
document.addEventListener("DOMContentLoaded", async () => {
	await dataLoad();
	await loadCalculator();
});

let rate;
let currency;
let to;
let iso;
let nameRate;

if (urlGetTerror.get("business") !== undefined) {
	// Data get url
	const business = LZString.decompressFromEncodedURIComponent(
		urlGetTerror.get("business")
	);
	const dataBusiness = JSON.parse(business);
	rate = dataBusiness.rate;
	currency = dataBusiness.currency;
	to = dataBusiness.to;
	iso = dataBusiness.iso;
	nameRate = dataBusiness.name;
} else if (
	urlGetTerror.get("name") !== undefined &&
	urlGetTerror.get("rate") !== undefined &&
	urlGetTerror.get("currency") !== undefined &&
	urlGetTerror.get("to") !== undefined &&
	urlGetTerror.get("iso") !== undefined
) {
	rate = urlGetTerror.get("rate");
	currency = urlGetTerror.get("currency");
	to = urlGetTerror.get("to");
	iso = urlGetTerror.get("iso");
	nameRate = urlGetTerror.get("name");
}

// Load data storage
const dataLoad = async () => {
	if (
		rate !== undefined &&
		currency !== undefined &&
		to !== undefined &&
		iso !== undefined &&
		nameRate !== undefined
	) {
		if (loadRatesTerror.verifyStorage()) {
			localStorage.setItem("rateCustom", rate);
			localStorage.setItem("currencyCustom", currency);
			localStorage.setItem("toCustom", to);
			localStorage.setItem("isoCustom", iso);
			localStorage.setItem("nameRateCustom", nameRate);
		}
	}
};
// Load calculator
const loadCalculator = async () => {
	const calculator = document.querySelector(".card-new-calculator");
	const template = document.getElementById("card-new-calculator").content;
	const fragment = document.createDocumentFragment();

	const clone = template.cloneNode(true);
	clone.querySelector(".card-tittle").textContent = "Tasa de: " + nameRate;
	clone.querySelector("#selectRates").remove();
	clone.querySelector(".newAmountRate").textContent = localStorage.getItem("toCustom");
	clone.querySelector(".newResultRate").textContent = localStorage.getItem("isoCustom");
	clone.querySelector("#amountNewCalculator").value = rate;
	clone.querySelector("#resultNewCalculator").value = 1;
	fragment.appendChild(clone);
	calculator.appendChild(fragment);
};

// Get rate with calculator
const cardCalculator = document.querySelector(".card-new-calculator");
cardCalculator.addEventListener("change", async (e) => {
	await calculatorProcess(e);
});
cardCalculator.addEventListener("keyup", async (e) => {
	await calculatorProcess(e);
});
const calculatorProcess = async (e) => {
	if (e.target && e.target.name === "amount") {
		const amount = e.target;
		const result =
			e.target.parentElement.parentElement.nextElementSibling.firstElementChild
				.lastElementChild;
		const btnInverter =
			e.target.parentElement.parentElement.nextElementSibling.nextElementSibling
				.firstElementChild.nextElementSibling;
		const btnShare = btnInverter.nextElementSibling;
		result.value = "";
		btnInverter.disabled = true;
		btnShare.disabled = true;
		console.log(amount.value);
		await calculateEvent(amount, result);
		if (result.value <= 0) {
			result.value = "";
		}
		if (amount.value !== "" && eval(amount.value) > 0) {
			btnInverter.disabled = false;
			btnShare.disabled = false;
		} else {
			btnInverter.disabled = true;
			btnShare.disabled = true;
		}
	}
};
//Btn inverter
cardCalculator.addEventListener("click", async (e) => {
	e.stopPropagation();
	if (e.target && e.target.name === "rateInverter") {
		btnInverter(e);
	} else if (e.target && e.target.name === "shareRate") {
		btnShareWs(e);
	}
});
const btnInverter = async (e) => {
	if (e.target && e.target.name === "rateInverter") {
		const amount =
			e.target.parentElement.parentElement.querySelector("#amountNewCalculator");
		const result =
			e.target.parentElement.parentElement.querySelector("#resultNewCalculator");
		const amountLabel =
			e.target.parentElement.parentElement.querySelector(".newAmountRate");
		const resultLabel =
			e.target.parentElement.parentElement.querySelector(".newResultRate");

		if (localStorage.getItem("currencyCustom") === currency) {
			localStorage.setItem("currencyCustom", iso);
			//set load rates
			let NewResult = calcular(amount);
			if (!NewResult) {
				NewResult = amount.value;
			}
			amount.value = result.value;
			result.value = NewResult;
			// preReload
			let textPreload = e.target.textContent;
			e.target.disabled = true;
			e.target.textContent = "......";

			soundAlerts.play("rope1");

			const btnShare = e.target.nextElementSibling;
			btnShare.disabled = true;
			amount.disabled = true;
			// Reload rate
			await calculateEvent(amount, result);
			amountLabel.textContent = localStorage.getItem("isoCustom");
			resultLabel.textContent = localStorage.getItem("toCustom");
			amount.disabled = false;
			e.target.disabled = false;
			e.target.textContent = textPreload;
			btnShare.disabled = false;
		} else if (localStorage.getItem("currencyCustom") === iso) {
			localStorage.setItem("currencyCustom", currency);
			let NewResult = calcular(amount);
			if (!NewResult) {
				NewResult = amount.value;
			}
			amount.value = result.value;
			result.value = NewResult;

			// preReload
			amount.disabled = true;
			let textPreload = e.target.textContent;
			e.target.disabled = true;
			e.target.textContent = "......";

			soundAlerts.play("rope1");

			const btnShare = e.target.nextElementSibling;
			btnShare.disabled = true;
			// Reload rate
			await calculateEvent(amount, result);
			amountLabel.textContent = localStorage.getItem("toCustom");
			resultLabel.textContent = localStorage.getItem("isoCustom");

			amount.disabled = false;
			e.target.disabled = false;
			e.target.textContent = textPreload;
			btnShare.disabled = false;
		}
	}
};
const btnShareWs = async (e) => {
	if (e.target && e.target.name === "shareRate") {
		//console.log(e.target);
		// desactivamos el boton
		e.target.disabled = true;
		const result =
			e.target.parentElement.parentElement.querySelector("#resultNewCalculator");
		const amount =
			e.target.parentElement.parentElement.querySelector("#amountNewCalculator");
		const amountLabel =
			e.target.parentElement.parentElement.querySelector(".newAmountRate").textContent;
		const resultLabel =
			e.target.parentElement.parentElement.querySelector(".newResultRate").textContent;

		// verificamos si no es un calculo
		let amountShare = await calcular(amount);

		if (!amountShare) {
			amountShare = amount.value;
		}
		const amountshow = TerrorMoney.monetizarR(amountLabel, "es-VE", amountShare);
		const resultShow = TerrorMoney.monetizarR(resultLabel, "es-VE", result.value);

		const message = `El monto es: *${resultShow}*, cambio de: *${amountshow}*, tipo de tasa: *${localStorage.getItem(
			"nameRateCustom"
		)}*, Desde: ${window.location}`;
		const shareMe = window.open(
			"https://wa.me/?text=" + encodeURIComponent(message),
			"_blank"
		);

		if (shareMe) {
			if (!soundAlerts.isPlaying("open1")) {
				soundAlerts.play("open1");
			} else {
				soundAlerts.stop("open1");
			}
			e.target.disabled = false;
		} else {
			console.log("No se abrio pestaña");
			e.target.disabled = false;
		}
	}
};
// Caculates
const calculateEvent = async (amount, result) => {
	const valResult = await calcular(amount);
	console.log(valResult);
	let amountVal = amount.value.replace(",", ".");

	if (valResult != false) {
		amountVal = valResult;
	}
	if (amountVal < 0) {
		amountVal = 0;
	} else {
		console.log(amountVal);
		if (localStorage.getItem("currencyCustom") === currency) {
			result.value = await calculateConvert(
				localStorage.getItem("rateCustom"),
				"/",
				amountVal
			);
		} else if (localStorage.getItem("currencyCustom") === iso) {
			// Convertir bs a eur
			result.value = await calculateConvert(
				localStorage.getItem("rateCustom"),
				"*",
				amountVal
			);
		}
	}
};
// Calocate and converter
const calculateConvert = async (rate, mate, amount) => {
	if (mate === "+") {
		return (amount + rate).toFixed(2);
	} else if (mate === "-") {
		return (amount - rate).toFixed(2);
	} else if (mate === "*") {
		return (amount * rate).toFixed(2);
	} else if (mate === "/") {
		return (amount / rate).toFixed(2);
	}
};
//funtion calcular
const calcular = async (expresionInput) => {
	// regex to validate value from calculator
	const expresionRegex =
		/^(?:-?\d+(?:\.\d+)?[-+*/]\d+(?:\.\d+)?(?:[-+*/]\d+(?:\.\d+)?)*)$(?<![-+*/])/;
	// Obtiene la expresión ingresada por el usuario

	const replacements = {
		",": ".",
		Σ: "+",
		x: "*",
		"×": "*",
		X: "*",
		"÷": "/",
	};

	const expresion = expresionInput.value.replace(
		/[,ΣxX×÷]/g,
		(match) => replacements[match]
	);

	// Valida que la expresión sea válida según la expresión regular
	if (!expresionRegex.test(expresion)) {
		//console.log("La expresión contiene caracteres no permitidos");
		return false;
	}

	// Evalúa la expresión y muestra el resultado en el input correspondiente
	try {
		let resultado = eval(expresion);

		return resultado;
	} catch (error) {
		console.log("La expresión es inválida");
		const alert = terroralert.swal(
			alertPosition,
			"danger",
			"La expresión es inválida",
			7000,
			1050
		);
		if (alert) {
			soundAlerts.play("error5");
		} else {
			console.log("error: swal");
		}
		return false;
	}
};
