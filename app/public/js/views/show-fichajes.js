document.addEventListener("DOMContentLoaded", async () => {
	showFichas();
});

const table = $("#tabla-fichajes").DataTable({
	dom: "Bfrtip",
	buttons: [
		{
			extend: "excelHtml5",
			title: "Reporte de fichajes",
			exportOptions: {
				columns: [0, 1, 2, 3, 4, 5, 6, 7, 8], // Exportar todas las columnas excepto la última (acciones)
				format: {
					body: function (data, row, column, node) {
						// Verificar si es la columna de la imagen
						if (column === 0) {
							// Retornar el contenido HTML de la imagen
							return $(data).prop("outerHTML");
						}
						return data;
					},
				},
			},
		},

		{
			extend: "print",
			text: "Imprimir",
			title: "Reporte de fichajes",
			exportOptions: {
				columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
				format: {
					body: function (data, row, column, node) {
						// Personalizar el contenido de la impresión
						if (column === 0) {
							return ""; // Dejar en blanco la primera columna (imagen)
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
		[7, 10, 20, 25, 50, -1],
		[7, 10, 20, 25, 50, "Todos"],
	],
	iDisplayLength: 7,
});

const showFichas = async () => {
	let url = "../../app/ajax/fichas.ajax.php";
	const solicitud = await terrorFetch.fetch("POST", url, { ficha: "getfichas" }, true);

	if (solicitud) {
		const datos = solicitud;

		// Obtener referencia a la tabla
		let tablaUsuarios = $("#tabla-fichajes").DataTable();

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
					usuario.estado_nom,
					usuario.estado_nom,
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
