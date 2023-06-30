document.addEventListener("DOMContentLoaded", async () => {
	showFichas();
});

const tablaUsuarios = $("#tabla-usuarios").DataTable({
	dom: configDataTable.dom,
	buttons: [
		{
			extend: "print",
			text: "Imprimir PDF",
			title: "",
			filename: "Reporte de USUARIOS - FEDEAV",
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
					  <img class="header-image" src="${RUTA_IMG}logo/logo-fedeav.JPG" alt="Logo FEDEAV" width="80" height="80" loading="lazy">
					  <h2>Reporte de USUARIOS | FEDEAV</h2>
					</div>
				`;

				// Agrega la cabecera al documento de impresión antes de la tabla
				$(win.document.body).prepend(headerContent);

				// Agrega la imagen de marca de agua
				$(win.document.body).append(
					`<img class="watermark" src="${RUTA_IMG}logo/logo-fedeav.png" alt="Marca de agua"  width="800" height="800" loading="lazy">`
				);

				// Cambia el título de la pestaña del navegador
				$(win.document).prop("title", "Reporte de USUARIOS - FEDEAV");
			},
			exportOptions: {
				columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13],
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
	let url = "../../app/ajax/users.ajax.php";
	const solicitud = await terrorFetch.fetch("POST", url, { user: "getusers" }, true);

	if (solicitud) {
		const datos = solicitud;

		tablaUsuarios.clear().draw();

		datos.forEach((usuario) => {
			tablaUsuarios.row
				.add([
					`<img class="img-fluid" src="${usuario.imagen}" alt="${
						usuario.nombre + " " + usuario.apellido1
					}" width="80" height="80" loading="lazy">`,
					usuario.nombre + " " + usuario.nombre2,
					usuario.apellido1 + " " + usuario.apellido2,
					usuario.fecha_nacimiento,
					usuario.nombre_sexo,
					usuario.cedula,
					usuario.usuario,
					usuario.codigo_empleado,
					usuario.inpre_abogado,
					`Télefono:<br>${usuario.celular}<br>Correo:<br>${usuario.correo}`,
					usuario.nombre_rol,
					usuario.estado_nom,
					usuario.estado_nom,
					`Edición:<br>${
						usuario.edicion_u == null ? "No actualizado" : usuario.edicion_u
					}<br>Registro:<br>${usuario.registro_u}`,
					`
					<button class="btn btn-warning btn-editUser" data-name="${
						usuario.nombre + usuario.apellido1
					}" data-id="${usuario.id_usuario}">Editar</button>
					<button class="btn btn-danger btn-deleteUser" data-name="${
						usuario.nombre + usuario.apellido1
					}" data-id="${usuario.id_usuario}">Borrar</button>
					`,
				])
				.draw();
		});
	} else {
		console.error("Ocurrió un error al obtener los datos de los usuarios.");
	}
};

const editUser = async (id_user) => {
	console.log("Editar usuario con ID:", id);
	let url = "../../app/ajax/users.ajax.php";
	const solicitud = await terrorFetch.fetch(
		"POST",
		url,
		{ user: "editUser", id_user: id_user },
		true
	);
	if (solicitud === true) {
		showFichas();
	} else {
	}
};

const deleteUser = async (id_user) => {
	// Mostrar el cuadro de diálogo de confirmación
	const result = await Swal.fire({
		title: "Confirmar eliminación",
		text: "Por favor, ingresa tu contraseña para confirmar la eliminación del usuario:",
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
		let url = "../../app/ajax/users.ajax.php";
		const solicitud = await terrorFetch.fetch(
			"POST",
			url,
			{ user: "deleteUser", id_user: id_user, verifyPassword: password },
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
const actionsTablaUsuarios = document.getElementById("tabla-usuarios");
// Agrega el evento de clic utilizando eventos delegados
//Editamos usuario
actionsTablaUsuarios.addEventListener("click", (event) => {
	// Verifica si el elemento clicado tiene la clase "btn-borrar-usuario"
	if (event.target.classList.contains("btn-editUser")) {
		const idUsuario = event.target.dataset.id;
		const nameUsuario = event.target.dataset.name;
		confirm("estas seguro que quieres editar este usuario?" + nameUsuario);
		deleteUser(idUsuario);
	}
});
//Borramos usuario
actionsTablaUsuarios.addEventListener("click", (event) => {
	// Verifica si el elemento clicado tiene la clase "btn-borrar-usuario"
	if (event.target.classList.contains("btn-deleteUser")) {
		const idUsuario = event.target.dataset.id;
		const nameUsuario = event.target.dataset.name;
		//confirm("estas seguro que quieres eliminar este usuario?" + nameUsuario);

		deleteUser(idUsuario);
	}
});
