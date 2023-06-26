document.addEventListener("DOMContentLoaded", async () => {
	showFichas();
});

const table = $("#tabla-fichajes").DataTable({
	dom: "Bfrtip",
	buttons: ["copy", "csv", "excel", "pdf"],
	responsive: true,
	order: [],
	lengthMenu: [
		[7, 10, 20, 25, 50, -1],
		[7, 10, 20, 25, 50, "Todos"],
	],
	iDisplayLength: 7,
});

const showFichas = async () => {
	console.log("Inicio");
	let url = "../../app/ajax/fichas.ajax.php";
	const solicitud = await terrorFetch.fetch("POST", url, { ficha: "getfichas" }, true);
	/**
	 *
	 */
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
					<img class="img-fluid"
					src="${usuario.imagen}"
					alt="${usuario.nombre + " " + usuario.apellido1}"" width="30" loading="lazy">
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
