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

// Agregar evento change al elemento <select>
selectDelegaciones.addEventListener("change", function () {
	const delegacion = selectDelegaciones.getSeletec();
	console.log();
	// Imprimir los valores seleccionados en la consola
	//console.log(selectDisipline.getSelected());
});
