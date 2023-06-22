document.addEventListener("DOMContentLoaded", async () => {});
const form_register = document.getElementById("form_register_user");

// Obtener todos los campos de entrada del formulario
const inputFields = form_register.querySelectorAll("input, select");

// Iterar sobre los campos y agregar los eventos change y keyup
inputFields.forEach((input) => {
	input.addEventListener("change", rellenarFicha);
	input.addEventListener("keyup", rellenarFicha);
});

// Función para manejar los cambios en los campos de entrada
function rellenarFicha(event) {
	const input = event.target;
	const value = input.value;
	const name = input.name;

	const fieldSelectors = {
		"primer-nombre": ".name",
		"primer-apellido": ".lastname",
		"fecha-nacimiento": ".age",
		sexo: ".sex",
		cedula: ".cedula",
		fedeav: ".fedeav",
		inpre: ".inpre",
		telefono: ".telephone",
		delegacion: ".delegacion",
	};

	const userFicha = document.getElementById("userFicha");
	const fieldSelector = fieldSelectors[name];

	if (fieldSelector) {
		//userFicha.querySelector(fieldSelector).textContent = value;
		const fieldElement = userFicha.querySelector(fieldSelector);

		console.log(`Campo '${name}' cambiado. Nuevo valor: ${value}`);
		if (name === "fecha-nacimiento") {
			const fechaNac = new Date(value);
			const fechaActual = new Date();

			const edad = fechaActual.getFullYear() - fechaNac.getFullYear();

			// Verificar si el cumpleaños ya ha pasado este año
			if (
				fechaNac.getMonth() > fechaActual.getMonth() ||
				(fechaNac.getMonth() === fechaActual.getMonth() &&
					fechaNac.getDate() > fechaActual.getDate())
			) {
				edad--;
			}

			fieldElement.textContent = edad + " AÑOS";
		} else {
			fieldElement.textContent = value;
		}
		console.log("edad:", edad);
	}
}
// Obtener referencia al input de imagen y la etiqueta img de vista previa
const imagenInput = document.getElementById('imagen');
const previewImg = document.getElementById('preview');

// Escuchar el evento change del input de imagen
imagenInput.addEventListener('change', () => {
    // Obtener la imagen seleccionada
    const imagenSeleccionada = imagenInput.files[0];

    // Crear un objeto FileReader para leer la imagen
    const reader = new FileReader();

    // Cuando la imagen se cargue, mostrarla en la vista previa
    reader.onload = function(e) {
        previewImg.setAttribute('src', e.target.result);
    };

    // Leer la imagen como una URL de datos
    reader.readAsDataURL(imagenSeleccionada);
});
