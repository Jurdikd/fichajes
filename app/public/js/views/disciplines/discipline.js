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
//CONVERTIR DATA DE IMAGEN
const tableDisciplinas = $("#tabla-disciplinas").DataTable({
	dom: "Bfrtip",
	buttons: [
		{
			extend: "print",
			text: "Imprimir PDF",
			title: "",
			filename: "Reporte de DISCIPLINAS - FEDEAV",
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
					  <h2>Reporte de DISCIPLINAS | FEDEAV</h2>
					</div>
				`;

				// Agrega la cabecera al documento de impresión antes de la tabla
				$(win.document.body).prepend(headerContent);

				// Agrega la imagen de marca de agua
				$(win.document.body).append(
					`<img class="watermark" src="${RUTA_IMG}logo/logo-fedeav.png" alt="Marca de agua"  width="800" height="800">`
				);

				// Cambia el título de la pestaña del navegador
				$(win.document).prop("title", "Reporte de DISCIPLINAS - FEDEAV");
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

			// Limpiar los datos existentes en la tabla
			tableDisciplinas.clear().draw();

			// Llenar la tabla con los datos obtenidos
			datos.forEach((usuario) => {
				tableDisciplinas.row
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
					])
					.draw();
			});
		} else {
			console.error("Ocurrió un error al obtener los datos de los usuarios.");
		}
	}
};
