document.addEventListener("DOMContentLoaded", async () => {});
const SERVER = window.location.origin;
const RUTA_IMG = SERVER + "/app/public/img/";
const form_register = document.getElementById("form_register_user");

// Obtener todos los campos de entrada del formulario
const inputFields = form_register.querySelectorAll("input, select");

// Iterar sobre los campos y agregar los eventos change y keyup
inputFields.forEach((input) => {
	input.addEventListener("change", rellenarFicha);
	input.addEventListener("keyup", rellenarFicha);
});

// Función para manejar los cambios en los campos de entrada
function rellenarFicha(event) {
	const input = event.target;
	const value = input.value;
	const name = input.name;

	const fieldSelectors = {
		"primer-nombre": ".name",
		"primer-apellido": ".lastname",
		"fecha-nacimiento": ".age",
		sexo: ".sex",
		cedula: ".cedula",
		fedeav: ".fedeav",
		inpre: ".inpre",
		telefono: ".telephone",
		delegacion: ".delegacion",
	};

	const userFicha = document.getElementById("userFicha");
	const fieldSelector = fieldSelectors[name];

	if (fieldSelector) {
		//userFicha.querySelector(fieldSelector).textContent = value;
		const fieldElement = userFicha.querySelector(fieldSelector);

		console.log(`Campo '${name}' cambiado. Nuevo valor: ${value}`);
		if (name === "fecha-nacimiento") {
			const fechaNac = new Date(value);
			const fechaActual = new Date();

			const edad = fechaActual.getFullYear() - fechaNac.getFullYear();

			// Verificar si el cumpleaños ya ha pasado este año
			if (
				fechaNac.getMonth() > fechaActual.getMonth() ||
				(fechaNac.getMonth() === fechaActual.getMonth() &&
					fechaNac.getDate() > fechaActual.getDate())
			) {
				edad--;
			}

			fieldElement.textContent = edad + " AÑOS";
		} else {
			fieldElement.textContent = value;
		}
		console.log("edad:", edad);
	}
}

// Crear una instancia de la clase TerrorIMG
const terrorIMG = new TerrorIMG();
// Obtener referencia al input de imagen y la etiqueta img de vista previa
const imagenInput = document.getElementById("imagen");
const previewImg = document.getElementById("preview");

// Agregar un event listener al elemento de entrada de archivo
imagenInput.addEventListener("change", function () {
	// Leer la imagen seleccionada y mostrarla en el elemento HTML
	terrorIMG.leer(this, previewImg);
});
//********************************************* */

// Obtener referencia al elemento <select> usando su ID
const selectDisciplines = document.getElementById("disciplinas");

// Crear una instancia de SlimSelect
let slim = new SlimSelect({
	select: selectDisciplines,
	selected: false,
	settings: {
		showSearch: true,
		searchText: "No se encontraron resultados",
		searchPlaceholder: "Buscar...",
		placeholder: "Seleccionar disciplinas",
		placeholderText: "Seleccionar disciplinas",
		searchHighlight: false,
	},
});

// Función para actualizar los botones y el collapse
function actualizarBotones() {
	// Obtener los valores seleccionados
	const selectedValues = slim.getSelected();

	// Obtener referencia al contenedor donde se mostrarán los botones principales y el botón "Ver más"
	const disponiblesContainer = document.getElementById("discpliplines-show");
	// Obtener referencia al collapse
	const collapse = document.getElementById("collapseDiscipline");
	// Eliminar los botones anteriores
	disponiblesContainer.innerHTML = "";
	// Eliminar los valores anteriores
	collapse.innerHTML = "";

	// Crear botón por cada valor en el array
	selectedValues.slice(0, 3).forEach((valor) => {
		// Crear elemento de botón
		const boton = crearBotonDisciplina(valor);

		// Agregar el botón al contenedor principal
		disponiblesContainer.appendChild(boton);
	});

	// Si hay más de 3 valores, agregar botón "Ver más"
	if (selectedValues.length > 3) {
		const valoresRestantes = selectedValues.slice(3);
		const botonVerMas = crearBotonVerMas(valoresRestantes);
		disponiblesContainer.appendChild(botonVerMas);

		// Crear elemento de lista por cada valor restante
		valoresRestantes.forEach((valor) => {
			const botonItem = crearBotonDisciplina(valor);
			// Agregar el elemento de lista al contenedor del collapse
			collapse.appendChild(botonItem);
		});

		// Agregar evento click al botón "Ver más"
		botonVerMas.addEventListener("click", function () {
			// Desplegar el collapse si está oculto
			if (collapse.classList.contains("show")) {
				collapse.classList.remove("show");
				botonVerMas.setAttribute("aria-expanded", "false");
			} else {
				collapse.classList.add("show");
				botonVerMas.setAttribute("aria-expanded", "true");
			}
		});
	}
}

// Agregar evento change al elemento <select>
selectDisciplines.addEventListener("change", function () {
	actualizarBotones();

	// Imprimir los valores seleccionados en la consola
	console.log(slim.getSelected());
});

// Función para crear un botón de disciplina
function crearBotonDisciplina(valor) {
	const boton = document.createElement("button");
	boton.classList.add("btn", "p-0", "rounded-circle", "d-2");
	boton.setAttribute("data-bs-toggle", "tooltip");
	boton.setAttribute("data-bs-placement", "top");
	boton.setAttribute("data-bs-custom-class", "custom-tooltip");
	boton.setAttribute("data-bs-title", valor);

	// Crear elemento de imagen
	const imagen = document.createElement("img");
	imagen.classList.add("img-fluid", "shadow-discipline");
	imagen.setAttribute(
		"src",
		RUTA_IMG + "icons/icons-discipline-rounded-solid/" + valor + ".svg"
	);
	imagen.setAttribute("alt", valor);
	imagen.setAttribute("srcset", "");
	imagen.setAttribute("width", "30");
	imagen.setAttribute("loading", "lazy");

	// Agregar la imagen al botón
	boton.appendChild(imagen);

	return boton;
}

// Función para crear el botón "Ver más" con los valores restantes
function crearBotonVerMas(valores) {
	const botonVerMas = document.createElement("button");
	botonVerMas.classList.add(
		"btn",
		"btn-secondary",
		"__ficha-btn-plus",
		"rounded-circle",
		"text-ficha-list"
	);
	botonVerMas.setAttribute("type", "button");
	botonVerMas.setAttribute("data-bs-target", "#collapseDiscipline");
	botonVerMas.setAttribute("aria-expanded", "false");
	botonVerMas.setAttribute("aria-controls", "collapseDiscipline");
	botonVerMas.setAttribute("data-bs-toggle", "collapse");
	botonVerMas.setAttribute("data-bs-toggle", "tooltip");
	botonVerMas.setAttribute("data-bs-placement", "top");
	botonVerMas.setAttribute("data-bs-custom-class", "custom-tooltip");
	botonVerMas.setAttribute("data-bs-title", "Ver más");

	// Crear icono para el botón "Ver más"
	const icono = document.createElement("i");
	icono.classList.add("fas", "fa-plus");

	// Agregar el icono al botón
	botonVerMas.appendChild(icono);

	return botonVerMas;
}

// Actualizar los botones al cargar la página
actualizarBotones();
