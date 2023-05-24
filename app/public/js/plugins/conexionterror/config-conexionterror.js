// Crear una instancia de la clase
const conexion = new ConexionTerror();

// Verificar el estado de la conexión a Internet
console.log(conexion.verify()); // Devuelve true si hay conexión a Internet, de lo contrario devuelve false
if (conexion.verify()) {
	// conexión a Internet
	//terroralert.swal("top-end", "success", "Conexión establecida", 8000);
} else {
	//terroralert.swal("top-end", "danger", "Sin conexión", 8000);
}
// Ejecutar una función cuando hay conexión a Internet
conexion.onConnected = async () => {
	//terroralert.swal("top-end", "success", "Conexión establecida", 8000);
	//const Rates = await loadsRatesData();
	//loadRatesData.loadDefault("rates");
	//loadRatesData.loadDefault(Rates);
};

// Ejecutar una función cuando no hay conexión a Internet
conexion.onDisconnected = () => {
	//terroralert.swal("top-end", "danger", "Sin conexión", 8000);
	//console.log(loadRatesData.getRates());
};
const loadsRatesData = async () => {
	const allRates = await calcualteTodayTerror.fetchDivisa({ rates: "rates" });
	return allRates;
};
