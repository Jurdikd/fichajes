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
const selectSexos = document.getElementById("sexo");
// Crear una instancia de SlimSelect
let selectSexo = new SlimSelect({
	select: selectSexos,
	selected: false,
	settings: {
		showSearch: true,
		searchText: "No se encontraron resultados",
		searchPlaceholder: "Buscar...",
		placeholder: "Seleccionar sexo",
		placeholderText: "Seleccionar sexo",
		searchHighlight: false,
		closeOnSelect: false,
	},
});
document.addEventListener("DOMContentLoaded", async () => {
	//CONVERTIR DATA DE IMAGEN
	const tableDisciplinas = $("#tabla-disciplinas").DataTable({
		dom: "Bfrtip",
		buttons: [
			{
				extend: "print",
				text: "Imprimir PDF",
				//title: "Reporte de fichajes por disciplina | FEDEAV",
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
	// Agregar evento change al elemento <select>
	selectSexos.addEventListener("change", function () {
		console.log(selectDelegaciones);
		let selectedOptionDelegacion;
		if (selectDelegaciones !== null) {
			selectedOptionDelegacion = selectDelegacion.getSelected()[0];
		}

		const selectedOptionSexo = selectSexo.getSelected()[0];
		showFichas(selectedOptionDelegacion, selectedOptionSexo);
	});
});

const showFichas = async (selectedOptionDelegacion, selectedOptionSexo) => {
	let disciplina;
	if (urlGetTerror.get("d") !== undefined) {
		disciplina = urlGetTerror.get("d");
		console.log(disciplina);
		let url = "../../app/ajax/fichas.ajax.php";
		const solicitud = await terrorFetch.fetch(
			"POST",
			url,
			{
				ficha: "getfichasdiscipline",
				delegacion: selectedOptionDelegacion,
				disciplina: disciplina,
				sexo: selectedOptionSexo,
			},
			true
		);

		if (solicitud) {
			const datos = solicitud;

			// Obtener referencia a la tabla
			let tablaUsuarios = $("#tabla-disciplinas").DataTable();

			// Limpiar los datos existentes en la tabla
			tablaUsuarios.clear().draw();

			// Llenar la tabla con los datos obtenidos
			datos.forEach((usuario) => {
				tablaUsuarios.row
					.add([
						`
                    <img class="img-fluid" src="${SERVER}/${usuario.imagen}" alt="${
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
						usuario.name_disciplina,
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
	}
};
