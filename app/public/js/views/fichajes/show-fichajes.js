document.addEventListener("DOMContentLoaded", async () => {
	showFichas();
});

const tablaFichajes = $("#tabla-fichajes").DataTable({
	dom: configDataTable.dom,
	buttons: [
		{
			extend: "print",
			text: "Imprimir PDF",
			title: "",
			filename: "Reporte de FICHAJES - FEDEAV",
			customize: function (win) {
				// Agrega estilos CSS personalizados al documento de impresión
				$(win.document.head).append(
					"<style>" +
						".header-content { text-align: center; }" +
						".watermark {position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); opacity: 0.1; }" +
						"</style>"
				);

				// Crea el contenido de la cabecera con la imagen y el texto centrado
				const headerContent = `
					<div class="header-content">
					  <h2>Federación Deportiva del Abogado de Venezuela XL Juegos Deportivos Nacionales Intercolegios de Abogados Merida 2023</h2>
					  <img class="header-image" src="${RUTA_IMG}logo/logo-fedeav.JPG" alt="Logo FEDEAV" width="80" height="80">
					  <h2>Reporte de FICHAJES | FEDEAV</h2>
					</div>
				`;

				// Agrega la cabecera al documento de impresión antes de la tabla
				$(win.document.body).prepend(headerContent);

				// Agrega la imagen de marca de agua
				$(win.document.body).append(
					`<img class="watermark" src="${RUTA_IMG}logo/logo-fedeav.png" alt="Marca de agua"  width="800" height="800">`
				);

				// Cambia el título de la pestaña del navegador
				$(win.document).prop("title", "Reporte de FICHAJES - FEDEAV");
			},
			exportOptions: {
				columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
				format: {
					body: function (data, row, column, node) {
						// Personalizar el contenido de la impresión
						if (column === 0) {
							const imageHTML = $(data).prop("outerHTML");
							return imageHTML;
						}
						return data;
					},
				},
				// Opción para imprimir solamente las entradas mostradas
				rows: {
					_: "current",
					page: "current",
					pageLength: "current",
				},
			},
			init: function (api, node, config) {
				$(node).removeClass("btn-secondary").addClass("btn-danger");
			},
		},
	],
	responsive: true,
	lengthMenu: configDataTable.lengthMenu,
	order: [],
	language: configDataTable.language,
});

const showFichas = async () => {
	let url = "../../app/ajax/fichas.ajax.php";
	const solicitud = await terrorFetch.fetch("POST", url, { ficha: "getfichas" }, true);

	if (solicitud) {
		const datos = solicitud;

		// Limpiar los datos existentes en la tabla
		tablaFichajes.clear().draw();

		// Llenar la tabla con los datos obtenidos
		datos.forEach((usuario) => {
			const disciplinas = usuario.disciplinas.join(", "); // Convertir el array de disciplinas en una cadena de texto
			tablaFichajes.row
				.add([
					`
                    <img class="img-fluid" src="${usuario.imagen}" alt="${
						usuario.nombre + " " + usuario.apellido1
					}" width="80" height="80" loading="lazy">
                    `,
					usuario.nombre + " " + usuario.nombre2,
					usuario.apellido1 + " " + usuario.apellido2,
					usuario.fecha_nacimiento,
					usuario.nombre_sexo,
					usuario.cedula,
					usuario.codigo_empleado,
					usuario.inpre_abogado,
					usuario.celular,
					usuario.estado_nom,
					// Agregar aquí las disciplinas del usuario
					disciplinas, // MOSTRAMOS DISCIPLINAS
					`
					<button class="btn btn-primary btn-printFicha mb-1" data-name="${
						usuario.nombre + usuario.apellido1
					}" data-id="${usuario.id_usuario}">Ver ficha</button>
					<button class="btn btn-warning btn-editUser mb-1" data-name="${
						usuario.nombre + usuario.apellido1
					}" data-id="${usuario.id_usuario}">Editar</button>
					<button class="btn btn-danger btn-deleteUser mb-1" data-name="${
						usuario.nombre + " " + usuario.apellido1
					}" data-id="${usuario.id_usuario}">Borrar</button>
					`,
				])
				.draw();
		});
	} else {
		console.error("Ocurrió un error al obtener los datos de los usuarios.");
	}
};
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
const deleteUser = async (id_user, nameUsuario) => {
	// Mostrar el cuadro de diálogo de confirmación
	const result = await Swal.fire({
		title: "Confirmar eliminación",
		text:
			"Por favor, ingresa tu contraseña para confirmar la eliminación del usuario: " +
			nameUsuario,
		input: "password",
		showCancelButton: true,
		confirmButtonText: "Eliminar",
		cancelButtonText: "Cancelar",
		inputValidator: (value) => {
			if (!value) {
				return "Debes ingresar tu contraseña";
			}
		},
	});

	// Si se proporciona una contraseña, continuar con la eliminación del usuario
	if (result.isConfirmed) {
		const password = result.value;
		//borramos el usuario
		let url = "../../app/ajax/fichas.ajax.php";
		const solicitud = await terrorFetch.fetch(
			"POST",
			url,
			{ ficha: "deleteUser", id_user: id_user, verifyPassword: password },
			true
		);
		if (solicitud == 1) {
			// Mostrar mensaje de éxito
			Swal.fire(
				"Usuario eliminado",
				"El usuario ha sido eliminado correctamente.",
				"success"
			);
			showFichas();
		} else if (solicitud == 2) {
			Swal.fire("Usuario eliminado", "Error al borrar imagen o no existia.", "warning");
			showFichas();
		} else if (solicitud == 3) {
			Swal.fire(
				"Usuario no eliminado",
				"El usuario no ha sido eliminado correctamente.",
				"error"
			);
		} else if (solicitud == 4) {
			Swal.fire("Clave incorrecta", "Verifica tu clave.", "warning");
		}
	}
};
// Obtén una referencia al contenedor de la tabla
const actionsTablaUsuarios = document.getElementById("tabla-fichajes");
// Agrega el evento de clic utilizando eventos delegados

actionsTablaUsuarios.addEventListener("click", (event) => {
	//Editamos usuario
	// Verifica si el elemento clicado tiene la clase "btn-editUser"
	if (event.target.classList.contains("btn-editUser")) {
		const idUsuario = event.target.dataset.id;
		openEditarUsuarioModal(idUsuario);
	}
	//Borramos usuario
	// Verifica si el elemento clicado tiene la clase "btn-deleteUser"
	if (event.target.classList.contains("btn-deleteUser")) {
		const idUsuario = event.target.dataset.id;
		const nameUsuario = event.target.dataset.name;
		deleteUser(idUsuario, nameUsuario);
	}
	//ficha usuario
	// Verifica si el elemento clicado tiene la clase "btn-deleteUser"
	if (event.target.classList.contains("btn-printFicha")) {
		const idUsuario = event.target.dataset.id;
		const nameUsuario = event.target.dataset.name;
		openImprimirFichaModal(idUsuario, nameUsuario);
	}
});
const openEditarUsuarioModal = async (idUsuario) => {
	const url = "../../app/ajax/users.ajax.php";
	const solicitud = await terrorFetch.fetch("POST", url, {
		user: "getUser",
		id_user: idUsuario,
	});

	if (solicitud) {
		const usuario = solicitud[0];
		//console.log(usuario);
		document.getElementById("btn-actualizar").setAttribute("data-id", idUsuario);
		// Rellena los campos de la modal con la información del usuario
		document.getElementById("primer-nombre").value = usuario.nombre;
		document.getElementById("segundo-nombre").value = usuario.nombre2;
		document.getElementById("primer-apellido").value = usuario.apellido1;
		document.getElementById("segundo-apellido").value = usuario.apellido2;
		document.getElementById("cedula").value = usuario.cedula;
		document.getElementById("sexo").value = usuario.id_sexo;
		document.getElementById("fecha-nacimiento").value = usuario.fecha_nacimiento;
		document.getElementById("correo").value = usuario.correo;
		document.getElementById("inpre-abogado").value = usuario.inpre_abogado;
		document.getElementById("telefono").value = usuario.celular;
		document.getElementById("img-user").setAttribute("src", usuario.imagen);
		selectDisipline.setSelected(usuario.disciplinas);

		// Abre la modal
		const modalEditarUsuario = new bootstrap.Modal(
			document.getElementById("modalEditarUsuario")
		);
		modalEditarUsuario.show();
	} else {
		console.error("Ocurrió un error al obtener la información del usuario.");
	}
};
// Obtener formulario
const form_editUser = document.getElementById("form_edit_user");

// Obtener referencia al input de imagen y la etiqueta img de vista previa
const imagenInput = document.getElementById("imagen");
const previewImg = document.getElementById("img-user");

// Agregar un event listener al elemento de entrada de archivo
imagenInput.addEventListener("change", function () {
	// Leer la imagen seleccionada y mostrarla en el elemento HTML
	terrorIMG.leer(this, previewImg);
});
//********************************************* */

/** validacion de formulario */
// Obtener referencia al elemento <select> usando su ID
const selectDelegaciones = document.getElementById("delegacion");
document.addEventListener("DOMContentLoaded", function () {
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
		imagen: true,
		delegacion: setDelegacion,
		disciplinas: false,
	};

	form_editUser.addEventListener("submit", function (event) {
		event.preventDefault();
		if (validarFormulario()) {
			// El formulario es válido, puedes realizar las acciones necesarias aquí
			//console.log("Formulario válido:", form_editUser);

			enviarFormulario(form_editUser);
			// form_editUser.submit(); // Descomenta esta línea para enviar el formulario
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
	const enviarFormulario = async (form_editUser) => {
		let imagenU = "";
		if (imagenInput.value === "") {
			imagenU = await terrorIMG.convertirSrcABase64(previewImg.getAttribute("src"));
		} else {
			imagenU = await terrorIMG.obtenerIMG(imagenInput);
		}

		let delegacionSend;
		if (setDelegacion) {
			delegacionSend = form_editUser.querySelector("#delegacion").value;
		} else {
			delegacionSend = selectDelegacion.getSelected();
		}
		const id_usuario = document.getElementById("btn-actualizar").getAttribute("data-id");
		const dataForm = {
			id_usuario: id_usuario,
			"primer-nombre": form_editUser.querySelector("#primer-nombre").value,
			"segundo-nombre": form_editUser.querySelector("#segundo-nombre").value,
			"primer-apellido": form_editUser.querySelector("#primer-apellido").value,
			"segundo-apellido": form_editUser.querySelector("#segundo-apellido").value,
			"fecha-nacimiento": form_editUser.querySelector("#fecha-nacimiento").value,
			sexo: form_editUser.querySelector("#sexo").value,
			cedula: form_editUser.querySelector("#cedula").value,
			correo: form_editUser.querySelector("#correo").value,
			"inpre-abogado": form_editUser.querySelector("#inpre-abogado").value,
			telefono: form_editUser.querySelector("#telefono").value,
			imagen: imagenU,
			disciplinas: selectDisipline.getSelected(),
		};

		// Agregar la clase para el spinner giratorio del boton
		const submitBtn = form_editUser.querySelector("#btn-actualizar");
		const textSubmitBtn = submitBtn.innerHTML;
		submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
		// Deshabilitar el botón agregando el atributo "disabled"
		submitBtn.setAttribute("disabled", true);

		let url = "../../app/ajax/fichas.ajax.php";
		const solicitud = await terrorFetch.fetch(
			"POST",
			url,
			{ ficha: "editFicha", dataFicha: dataForm },
			true
		);
		if (solicitud === 1) {
			console.log("Usuario actualizado correctamente");
			const alert = terroralert.swal(
				alertPosition,
				"success",
				"Usuario actualizado correctamente",
				7000,
				1050
			);
			location.reload(true);
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
});

//********************************************* */

// Imprimir ficha//
const openImprimirFichaModal = async (idUsuario, nameUsuario) => {
	const url = "../../app/ajax/users.ajax.php";
	const solicitud = await terrorFetch.fetch("POST", url, {
		user: "getUser",
		id_user: idUsuario,
	});

	if (solicitud) {
		const usuario = solicitud[0];
		// obtener modal
		const modalFicha = document.getElementById("modalPrintFicha");
		const modalPrintFicha = new bootstrap.Modal(modalFicha);

		// id de usuario
		modalFicha.querySelector("#btn-printFicha").setAttribute("data-id", idUsuario);
		let sexUser;
		if (usuario.id_sexo == 1) {
			sexUser = "FEMENINO";
		} else if (usuario.id_sexo == 2) {
			sexUser = "MASCULINO";
		}
		// Rellena los campos de la modal con la información del usuario
		modalFicha.querySelector("#previewImg").setAttribute("src", usuario.imagen);
		modalFicha.querySelector(".name").textContent = usuario.nombre;
		modalFicha.querySelector(".lastname").textContent = usuario.apellido1;
		modalFicha.querySelector(".cedula").textContent = usuario.cedula;
		modalFicha.querySelector(".age").textContent = usuario.fecha_nacimiento;
		modalFicha.querySelector(".sex").textContent = sexUser;
		modalFicha.querySelector(".inpre").textContent = usuario.inpre_abogado;
		modalFicha.querySelector(".telephone").textContent = usuario.celular;
		modalFicha.querySelector(".delegacion").textContent =
			usuario.estado_nom.toUpperCase();
		modalFicha.querySelector(".fedeav").textContent = usuario.codigo_empleado;
		// crear botones de disciplinas
		actualizarBotones(usuario.disciplinas);
		// Abre la modal
		modalPrintFicha.show();
	} else {
		console.error("Ocurrió un error al obtener la información del usuario.");
	}
};
// imprimir ficha boton

const btnImprimirFicha = document.getElementById("btn-printFicha");
btnImprimirFicha.addEventListener("click", async (e) => {
	const idFicha = e.target.getAttribute("data-id");
	const userFichaPrint = document.getElementById("userFichaPrint");
	console.log("imprimiendo ficha", idFicha);
	await imprimirFicha(userFichaPrint, "309.08px", "#164ea1");
});
// Función para actualizar los botones y el collapse
function actualizarBotones(disciplinas) {
	// Obtener los valores seleccionados
	const selectedValues = disciplinas;

	// Obtener referencia al contenedor donde se mostrarán los botones principales y el botón "Ver más"
	const disponiblesContainer = document.getElementById("discpliplines-show");

	// Eliminar los botones anteriores
	disponiblesContainer.innerHTML = "";

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
	}
}
// Función para crear un botón de disciplina
function crearBotonDisciplina(valor) {
	const boton = document.createElement("button");
	boton.classList.add("btn", "p-0", "rounded-circle");
	boton.setAttribute("data-bs-title", valor);

	// Crear elemento de imagen
	const imagen = document.createElement("img");
	imagen.classList.add("img-fluid", "shadow-discipline");
	imagen.setAttribute(
		"src",
		RUTA_IMG + "icons/icons-discipline-rounded-solid/" + valor + ".svg"
	);
	imagen.setAttribute("alt", valor);
	imagen.setAttribute("width", "30");
	imagen.setAttribute("loading", "lazy");

	// Agregar la imagen al botón
	boton.appendChild(imagen);

	return boton;
}
function crearBotonVerMas(valores) {
	let total = valores.length;
	const botonVerMas = document.createElement("button");
	botonVerMas.classList.add(
		"btn",
		"btn-primary",
		"__ficha-btn-plus",
		"rounded-circle",
		"text-ficha-list"
	);
	botonVerMas.setAttribute("type", "button");

	botonVerMas.textContent = total;

	// Crear icono para el botón "Ver más"
	const icono = document.createElement("i");
	icono.classList.add("fas", "fa-plus");

	// Agregar el icono al botón
	botonVerMas.appendChild(icono);

	return botonVerMas;
}
