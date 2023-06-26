document.addEventListener("DOMContentLoaded", async () => {
	showFichas();
});

var table = $("#tabla-fichajes").DataTable({
	dom: "Bfrtip",
	responsive: true,
});

const showFichas = async () => {
	console.log("inicio");
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
					usuario.nombre,
					usuario.nombre2,
					usuario.apellido1,
					usuario.apellido2,
					usuario.cedula,
					usuario.nombre_sexo,
					usuario.fecha_nacimiento,
					usuario.codigo_empleado,
					usuario.celular,
					usuario.correo,
					usuario.edicion_u,
					usuario.registro_u,
					usuario.id_usuario,
				])
				.draw();
		});
	} else {
		console.error("Ocurrió un error al obtener los datos de los usuarios.");
	}
};
