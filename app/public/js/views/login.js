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
const submitBtn = document.querySelector(".submit-btn");

login.addEventListener("submit", function (event) {
	event.preventDefault();

	// Agregar la clase para el snippet giratorio
	textBtn = submitBtn.textContent;
	submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"> </i>';

	// Simular una solicitud de consulta
	setTimeout(function () {
		// Eliminar la clase para detener el snippet giratorio
		submitBtn.innerHTML = "";
		submitBtn.textContent = textBtn;
		// Realizar acciones adicionales después de la consulta
		console.log("Formulario enviado correctamente");
		const alert = terroralert.swal(
			alertPosition,
			"success",
			"Incion de seción correcto redireccionando...",
			7000,
			1050
		);
		if (alert) {
			location.reload(true);
		}
	}, 2000);
});
