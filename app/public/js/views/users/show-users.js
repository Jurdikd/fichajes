document.addEventListener("DOMContentLoaded", async () => {
	showFichas();
});

const tablaUsuarios = $("#tabla-usuarios").DataTable({
	//dom: '<"row"<"col-md-6 mb-1"l><"col-md-6"f><"col-md-6 text-md-end mt-1"B>>rtip',
	dom: lfBrtip,
	buttons: [
		{
			extend: "print",
			text: "Imprimir PDF",
			title: "",
			filename: "Reporte de USUARIOS | FEDEAV",
			customize: function (win) {
				// Agrega estilos CSS personalizados al documento de impresión
				$(win.document.head).append(
					"<style>.header-content { text-align: center; }</style>"
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

				// Cambia el título de la pestaña del navegador
				$(win.document).prop("title", "Reporte de USUARIOS | FEDEAV");
			},
			exportOptions: {
				columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
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
				rows: function (idx, data, node) {
					const api = this.api();
					const pageLength = api.page.len();
					const currentPage = api.page();
					const displayedIndex = currentPage * pageLength + idx;
					return api.page.info().recordsDisplay > displayedIndex;
				},
			},
			init: function (api, node, config) {
				$(node).removeClass("btn-secondary").addClass("btn-primary");
			},
		},
	],
	responsive: true,
	lengthMenu: [
		[6, 12, 24, 48, 120, -1],
		[6, 12, 24, 48, 120, "Todos"],
	],
	order: [],
	language: {
		paginate: {
			previous: '<i class="bi bi-chevron-left"></i> Anterior',
			next: 'Siguiente <i class="bi bi-chevron-right"></i>',
		},
		sEmptyTable: "No se encontraron datos",
		sInfo: "Mostrando _START_ a _END_ de _TOTAL_ entradas",
		sInfoEmpty: "Mostrando 0 a 0 de 0 entradas",
		sInfoFiltered: "(filtrado de _MAX_ entradas totales)",
		sInfoPostFix: "",
		sInfoThousands: ",",
		sLengthMenu: "Mostrar _MENU_ entradas",
		sLoadingRecords: "Cargando...",
		sProcessing: "Procesando...",
		sSearch: "Buscar:",
		sZeroRecords: "No se encontraron registros coincidentes",
		oAria: {
			sSortAscending: ": activar para ordenar la columna de manera ascendente",
			sSortDescending: ": activar para ordenar la columna de manera descendente",
		},
	},
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
					usuario.codigo_empleado,
					usuario.inpre_abogado,
					`Télefono:<br>${usuario.celular}<br>Correo:<br>${usuario.correo}`,
					usuario.nombre_rol,
					usuario.estado_nom,
					usuario.estado_nom,
					`Edición:<br>${
						usuario.edicion_u == null ? "No actualizado" : usuario.edicion_u
					}<br>Registro:<br>${usuario.registro_u}`,
					`<button class="btn btn-primary btn-editar-usuario" data-id="${usuario.id_usuario}" onclick="editarUsuario(${usuario.id_usuario})">Editar</button>`,
				])
				.draw();
		});
	} else {
		console.error("Ocurrió un error al obtener los datos de los usuarios.");
	}
};

function editarUsuario(id) {
	console.log("Editar usuario con ID:", id);
}
