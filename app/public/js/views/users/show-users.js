document.addEventListener("DOMContentLoaded", async () => {
	showFichas();
});

const table = $("#tabla-usuarios").DataTable({
	dom: "Bfrtip",
	buttons: [
		{
			extend: "print",
			text: "Imprimir PDF",
			title: "",
			filename: "Reporte de USUARIOS | FEDEAV", // Nombre del archivo
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
			},
			exportOptions: {
				columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15],
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
			},
		},
	],
	responsive: true,
	order: [],
	lengthMenu: [
		[5, 10, 20, 50, -1], // Opciones de cantidad de registros a mostrar
		[5, 10, 20, 50, "Todos"], // Texto de las opciones
	],
	iDisplayLength: -1, // Mostrar todos los registros
});

const showFichas = async () => {
	let url = "../../app/ajax/users.ajax.php";
	const solicitud = await terrorFetch.fetch("POST", url, { user: "getusers" }, true);

	if (solicitud) {
		const datos = solicitud;

		// Obtener referencia a la tabla
		let tablaUsuarios = $("#tabla-usuarios").DataTable();

		// Limpiar los datos existentes en la tabla
		tablaUsuarios.clear().draw();

		// Llenar la tabla con los datos obtenidos
		datos.forEach((usuario) => {
			tablaUsuarios.row
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
					usuario.correo,
					usuario.nombre_rol,
					usuario.estado_nom,
					usuario.estado_nom,
					`${usuario.edicion_u == null ? "NO ACTUALIZADO" : usuario.edicion_u}`,
					usuario.registro_u,
					// Agregar aquí las disciplinas del usuario
					`
                    <button class="btn btn-primary btn-editar-usuario" data-id="${usuario.id_usuario}" onclick="editarUsuario(${usuario.id_usuario})">Editar</button>
                    `,
				])
				.draw();
		});
	} else {
		console.error("Ocurrió un error al obtener los datos de los usuarios.");
	}
};

// Función para editar un usuario
function editarUsuario(id) {
	// Aquí puedes implementar la lógica para editar el usuario con el ID proporcionado
	console.log("Editar usuario con ID:", id);
}
