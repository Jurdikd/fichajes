document.addEventListener("DOMContentLoaded", async () => {});

const TerrorFuntions = new middlewaresTerror();
// Crear una instancia de la clase TerrorFetch
const SERVER = window.location.origin;
const RUTA_IMG = SERVER + "/app/public/img/";
const terrorFetch = new TerrorFetch();
// Crear una instancia de la clase TerrorIMG
const terrorIMG = new TerrorIMG();
console.log(terrorIMG);
const urlGetTerror = {
	get: (param) => {
		const urlSearchParams = new URLSearchParams(window.location.search);
		const params = Object.fromEntries(urlSearchParams.entries());
		return params[param];
	},
};
const configDataTable = {
	dom: '<"mb-2"B><"mb-2"l>frtip',
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
		sLengthMenu: "Mostrar _MENU_ registros",
		sLoadingRecords: "Cargando...",
		sProcessing: "Procesando...",
		sSearch: "Buscar:",
		sZeroRecords: "No se encontraron registros coincidentes",
		oAria: {
			sSortAscending: ": activar para ordenar la columna de manera ascendente",
			sSortDescending: ": activar para ordenar la columna de manera descendente",
		},
	},
	lengthMenu: [
		[6, 12, 24, 48, 120, -1],
		[6, 12, 24, 48, 120, "Todos"],
	],
};
