const passwordInput = document.getElementById("password");
const passwordToggle = document.getElementById("password-toggle");

passwordToggle.addEventListener("click", function () {
	const passwordFieldType = passwordInput.getAttribute("type");
	const newPasswordFieldType = passwordFieldType === "password" ? "text" : "password";
	passwordInput.setAttribute("type", newPasswordFieldType);
	passwordToggle.classList.toggle("fa-eye-slash");
	passwordToggle.classList.toggle("fa-eye");
});

const login = document.getElementById("login");
const submitBtn = login.querySelector(".submit-btn");

login.addEventListener("submit", async (event) => {
	event.preventDefault();

	const usernameInput = document.getElementById("username");
	const passwordInput = document.getElementById("password");

	const username = usernameInput.value.trim();
	const password = passwordInput.value.trim();

	if (validarFormulario(username, password)) {
		// Agregar la clase para el spinner giratorio
		submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
		// Deshabilitar el botón agregando el atributo "disabled"
		submitBtn.setAttribute("disabled", true);

		// Crear la URL
		let url = "../../app/ajax/login.ajax.php";
		const dataLogin = { username: username, password: password };

		// Enviar la solicitud
		const solicitud = await terrorFetch.fetch("POST", url, { login: dataLogin });

		if (solicitud === true) {
			// Realizar acciones adicionales después de la consulta
			console.log("Formulario enviado correctamente");
			const alert = terroralert.swal(
				alertPosition,
				"success",
				"Inicio de sesión correcto. Redireccionando...",
				7000,
				1050
			);
			if (alert) {
				location.reload(true);
			}
		} else {
			// Eliminar el spinner y restaurar el contenido original del botón
			submitBtn.innerHTML = "Iniciar Sesión";
			// Habilitar el botón quitando el atributo "disabled"
			submitBtn.removeAttribute("disabled");
			// Mostrar error de sesión
			console.log("Error al iniciar sesión");
			const alert = terroralert.swal(
				alertPosition,
				"error",
				"Error al iniciar sesión",
				5000,
				1050
			);
		}
	} else {
		console.log("Error al iniciar sesión");
		const alert = terroralert.swal(
			alertPosition,
			"error",
			"Error al iniciar sesión",
			5000,
			1050
		);
	}
});

function validarFormulario(username, password) {
	if (username === "") {
		marcarCampoInvalido("username");
		return false;
	} else {
		marcarCampoValido("username");
	}

	if (password === "") {
		marcarCampoInvalido("password");
		return false;
	} else {
		marcarCampoValido("password");
	}

	return true;
}

function marcarCampoInvalido(campo) {
	const input = document.getElementById(campo);
	input.classList.add("is-invalid");
	input.classList.remove("is-valid");
}

function marcarCampoValido(campo) {
	const input = document.getElementById(campo);
	input.classList.remove("is-invalid");
	input.classList.add("is-valid");
}
