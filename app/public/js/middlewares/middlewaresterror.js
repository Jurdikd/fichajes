class middlewaresTerror {
	copyInput(getInput, textAlert, textAlert2) {
		// Obtén el input
		const input = getInput;
		// Comprobar si hay algo que copiar
		if (input.value !== "") {
			// Guarda el tipo de entrada original
			const originalType = input.type;

			// Cambia el tipo de entrada a "text" temporalmente
			input.type = "text";

			// Selecciona el texto del input
			input.select();
			input.setSelectionRange(0, 99999); // Para dispositivos móviles

			// Copia el texto seleccionado al portapapeles
			document.execCommand("copy");

			// Restaura el tipo de entrada original
			input.type = originalType;

			const alert1 = terroralert.swal(alertPosition, "success", textAlert, 5000, 1050);
			if (alert1) {
				soundAlerts.play("success1");
			} else {
				console.warn("Error: swal");
			}
		} else {
			const alert2 = terroralert.swal(alertPosition, "warning", textAlert2, 5000, 1050);
			if (alert2) {
				soundAlerts.play("error1");
			} else {
				console.warn("Error: swal");
			}
		}
	}
}
