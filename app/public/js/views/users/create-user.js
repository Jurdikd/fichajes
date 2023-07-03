document.addEventListener("DOMContentLoaded", async () => {});

// Obtener formulario
const form_register = document.getElementById("form_register_user");

// Obtener todos los campos de entrada del formulario
const inputFields = form_register.querySelectorAll("input, select");

// Iterar sobre los campos y agregar los eventos change y keyup
inputFields.forEach((input) => {
	input.addEventListener("change", rellenarFicha);
	input.addEventListener("keyup", rellenarFicha);
});
// Obtén una lista de todos los elementos de entrada de texto en el formulario
const inputFieldsText = document.querySelectorAll("input[type='text']");

// Agrega un controlador de eventos a cada campo de entrada
inputFieldsText.forEach((input) => {
	input.addEventListener("input", function () {
		// Convierte el texto del campo de entrada a mayúsculas
		this.value = this.value.toUpperCase();
	});
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
		inpre: ".inpre",
		telefono: ".telephone",
	};

	const userFicha = document.getElementById("userFicha");
	const fieldSelector = fieldSelectors[name];

	if (fieldSelector) {
		//userFicha.querySelector(fieldSelector).textContent = value;
		const fieldElement = userFicha.querySelector(fieldSelector);

		//console.log(`Campo '${name}' cambiado. Nuevo valor: ${value}`);
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
			//console.log("edad:", edad);
		} else {
			fieldElement.textContent = value;
		}
	}
}

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
const selectDelegaciones = document.getElementById("delegacion");
// Crear una instancia de SlimSelect
let selectDelegacion = new SlimSelect({
	select: selectDelegaciones,
	selected: false,
	settings: {
		showSearch: true,
		searchText: "No se encontraron resultados",
		searchPlaceholder: "Buscar...",
		placeholder: "Seleccionar degaciones",
		placeholderText: "Seleccionar degaciones",
		searchHighlight: false,
		closeOnSelect: false,
	},
});
// Obtener referencia al elemento <select> usando su ID
const selectDisciplines = document.getElementById("disciplinas");

// Crear una instancia de SlimSelect
let selectDisipline = new SlimSelect({
	select: selectDisciplines,
	selected: false,
	settings: {
		showSearch: true,
		searchText: "No se encontraron resultados",
		searchPlaceholder: "Buscar...",
		placeholder: "Seleccionar disciplinas",
		placeholderText: "Seleccionar disciplinas",
		searchHighlight: false,
		closeOnSelect: false,
	},
});

// Función para actualizar los botones y el collapse
function actualizarBotones() {
	// Obtener los valores seleccionados
	const selectedValues = selectDisipline.getSelected();

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
/////////////////////////////////////////////////////////////////////////////////////////

/** validacion de formulario */

document.addEventListener("DOMContentLoaded", function () {
	const form = document.getElementById("form_register_user");
	let setDelegacion;
	if (selectDelegaciones.type === "text") {
		setDelegacion = true;
	} else if (selectDelegaciones.type === "select-one") {
		setDelegacion = false;
	}
	const campos = {
		"primer-nombre": false,
		"segundo-nombre": true,
		"primer-apellido": false,
		"segundo-apellido": true,
		"fecha-nacimiento": false,
		sexo: false,
		cedula: false,
		correo: false,
		"inpre-abogado": false,
		telefono: false,
		imagen: false,
		rol: false,
		clave: false,
		delegacion: setDelegacion,
		disciplinas: false,
	};

	form.addEventListener("submit", function (event) {
		event.preventDefault();
		if (validarFormulario()) {
			// El formulario es válido, puedes realizar las acciones necesarias aquí
			//console.log("Formulario válido:", form);

			enviarFormulario(form);
			// form.submit(); // Descomenta esta línea para enviar el formulario
		} else {
			console.log("Formulario inválido");
		}
	});

	function validarFormulario() {
		let formValido = true;

		for (const campo in campos) {
			if (campos.hasOwnProperty(campo)) {
				const valor = document.getElementById(campo).value.trim();

				if (campos[campo]) {
					// No se realiza validación para campos opcionales
					continue;
				}

				if (valor === "") {
					marcarCampoInvalido(campo);
					formValido = false;
				} else {
					marcarCampoValido(campo);
				}
			}
		}

		// Validar campo de disciplinas
		const disciplinas = document.getElementById("disciplinas");
		if (disciplinas.value.length === 0) {
			marcarCampoInvalido("disciplinas");
			formValido = false;
		} else {
			marcarCampoValido("disciplinas");
		}

		return formValido;
	}

	function marcarCampoInvalido(campo) {
		const input = document.getElementById(campo);
		input.classList.add("is-invalid");
		input.classList.remove("is-valid");
	}

	function marcarCampoValido(campo) {
		const input = document.getElementById(campo);
		input.classList.remove("is-invalid");
		input.classList.add("is-valid");
	}
	const enviarFormulario = async (form) => {
		const imagenU = await terrorIMG.obtenerIMG(imagenInput);
		let delegacionSend;
		console.log(setDelegacion);
		if (setDelegacion) {
			delegacionSend = form.querySelector("#delegacion").value;
		} else {
			delegacionSend = selectDelegacion.getSelected();
		}
		const dataForm = {
			"primer-nombre": form.querySelector("#primer-nombre").value,
			"segundo-nombre": form.querySelector("#segundo-nombre").value,
			"primer-apellido": form.querySelector("#primer-apellido").value,
			"segundo-apellido": form.querySelector("#segundo-apellido").value,
			"fecha-nacimiento": form.querySelector("#fecha-nacimiento").value,
			sexo: form.querySelector("#sexo").value,
			cedula: form.querySelector("#cedula").value,
			correo: form.querySelector("#correo").value,
			"inpre-abogado": form.querySelector("#inpre-abogado").value,
			telefono: form.querySelector("#telefono").value,
			imagen: imagenU,
			rol: form.querySelector("#rol").value,
			clave: form.querySelector("#clave").value,
			delegacion: delegacionSend,
			disciplinas: selectDisipline.getSelected(),
		};

		// Agregar la clase para el spinner giratorio del boton
		const submitBtn = form.querySelector("#btn-submit");
		const textSubmitBtn = submitBtn.innerHTML;
		submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
		// Deshabilitar el botón agregando el atributo "disabled"
		submitBtn.setAttribute("disabled", true);

		let url = "../../app/ajax/users.ajax.php";
		const solicitud = await terrorFetch.fetch(
			"POST",
			url,
			{ user: "registeruser", datauser: dataForm },
			true
		);
		if (solicitud === 1) {
			console.log("Ficha registrada correctamente");
			const alert = terroralert.swal(
				alertPosition,
				"success",
				"Ficha registrada correctamente",
				7000,
				1050
			);
			if (alert) {
				form.reset();
				location.reload(true);
			}
		} else if (solicitud === 2) {
			console.log(
				"Ficha insertada correctamente! pero ha habido un error al guardar las disciplinas!",
				solicitud
			);
			const alert = terroralert.swal(
				alertPosition,
				"warning",
				"Ficha insertada correctamente! pero ha habido un error al guardar las disciplinas!",
				5000,
				1050
			);
		} else if (solicitud === 3) {
			console.log(
				"Ficha insertada correctamente! pero ha habido un error al guardar el registro!",
				solicitud
			);
			const alert = terroralert.swal(
				alertPosition,
				"warning",
				"Ficha insertada correctamente! pero ha habido un error al guardar el registro!",
				5000,
				1050
			);
		} else if (solicitud === 4) {
			console.log(
				"Ficha insertada correctamente! pero ha habido un error al guardar el registro y disciplinas!",
				solicitud
			);
			const alert = terroralert.swal(
				alertPosition,
				"warning",
				"Ficha insertada correctamente! pero ha habido un error al guardar el registro y disciplinas!",
				5000,
				1050
			);
		} else if (solicitud === 5) {
			console.log("¡Ha habido un error al insertar ficha!", solicitud);
			const alert = terroralert.swal(
				alertPosition,
				"error",
				"¡Ha habido un error al insertar ficha!",
				5000,
				1050
			);
			// Eliminar el spinner y restaurar el contenido original del botón
			submitBtn.innerHTML = textSubmitBtn;
			// Habilitar el botón quitando el atributo "disabled"
			submitBtn.removeAttribute("disabled");
		} else if (solicitud === 6) {
			console.log("Ficha ya existe", solicitud);
			const alert = terroralert.swal(
				alertPosition,
				"error",
				"¡Ficha ya existe!",
				5000,
				1050
			);
			// Eliminar el spinner y restaurar el contenido original del botón
			submitBtn.innerHTML = textSubmitBtn;
			// Habilitar el botón quitando el atributo "disabled"
			submitBtn.removeAttribute("disabled");
		} else {
			console.log("Error al cargar los datos de ficha:", solicitud);
			const alert = terroralert.swal(
				alertPosition,
				"error",
				"Error al cargar los datos de ficha",
				5000,
				1050
			);
			// Eliminar el spinner y restaurar el contenido original del botón
			submitBtn.innerHTML = textSubmitBtn;
			// Habilitar el botón quitando el atributo "disabled"
			submitBtn.removeAttribute("disabled");
		}
	};
	// Código para el botón de reset
	const resetButton = document.getElementById("resetButton");

	resetButton.addEventListener("click", function () {
		form.reset();
	});
});
