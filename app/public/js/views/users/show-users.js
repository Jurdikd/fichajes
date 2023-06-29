document.addEventListener("DOMContentLoaded", async () => {
	showFichas();
});
//dom: '<"row"<"col-md-6 mb-1"l><"col-md-6"f><"col-md-6 text-md-end mt-1"B>>rtip',
console.log(configDataTable);
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
					<button class="btn btn-warning btn-editar-usuario" data-id="${usuario.id_usuario}" onclick="editUser(${usuario.id_usuario})">Editar</button>
					<button class="btn btn-danger btn-editar-usuario" data-id="${usuario.id_usuario}" onclick="deleteUser(${usuario.id_usuario})">Borrar</button>
					`,
				])
				.draw();
		});
	} else {
		console.error("Ocurrió un error al obtener los datos de los usuarios.");
	}
};

function editUser(id) {
	console.log("Editar usuario con ID:", id);
}
function deleteUser(id) {
	console.log("Editar usuario con ID:", id);
}
