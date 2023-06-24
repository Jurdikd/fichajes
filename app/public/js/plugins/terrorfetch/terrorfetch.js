class TerrorFetch {
	constructor() {
		// Constructor de la clase
	}

	// Método para realizar una solicitud FETCH usando fetch
	async fetch(metodo, url, datos, consola = null) {
		if (!metodo || !url || !datos) {
			throw new Error("Faltan parámetros en la solicitud FETCH.");
		}

		try {
			const response = await fetch(url, {
				method: metodo,
				body: JSON.stringify(datos),
				headers: {
					Accept: "application/json",
					"Content-Type": "application/json",
				},
			});

			if (!response.ok) {
				throw new Error("Error en la solicitud FETCH: " + response.status);
			}

			const responseData = await response.json();
			if (consola !== null && consola == true) {
				console.log(responseData);
			}
			return responseData;
		} catch (error) {
			throw new Error("Error en la solicitud FETCH: " + error.message);
		}
	}
}
