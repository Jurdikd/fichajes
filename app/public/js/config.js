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

async function imprimirFicha(element, setWidth, color) {
	let tarjeta = element;

	// Establece explícitamente las dimensiones de la tarjeta utilizando CSS
	tarjeta.style.width = setWidth;
	//tarjeta.style.width = "306px";
	//tarjeta.style.width = "1320px";
	//tarjeta.style.height = "527px";

	// Ajusta la escala del canvas para obtener mayor calidad
	var escala = 4; // Puedes ajustar este valor según tus necesidades
	var canvas = await html2canvas(tarjeta, { scale: escala });

	// Crea un elemento de imagen
	var img = document.createElement("img");
	img.src = canvas.toDataURL("image/png"); // Convierte el canvas a una URL de imagen

	// Abre una nueva ventana para imprimir
	let title = "FICHA";
	var win = window.open();
	win.document.write(
		`<html>
		<head><title>${title}</title></head>
		<body style="display:flex; justify-content:center; align-items:center; position:relative;">
		<img src="${img.src}" style="width: 169px; height: 321px; position:absolute; z-index:1"/>
		<div style="background:${color}; width: 207.87px; height: 321px;"></div>
		</body>
		</html>`
	);
	win.document.close();

	// Espera un breve momento para asegurar que la imagen se haya cargado completamente
	await new Promise((resolve) => setTimeout(resolve, 700));

	// Imprime la ventana actual
	win.print();

	// Cierra la ventana de imagen después de imprimir
	win.close();

	// Elimina la propiedad style.width para restaurar el tamaño original
	tarjeta.style.removeProperty("width");
}
