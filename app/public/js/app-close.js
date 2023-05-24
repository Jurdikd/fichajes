// Load page
document.addEventListener("DOMContentLoaded", async () => {

	document.querySelectorAll(".shadow-hover-red").forEach((card) => {
		card.addEventListener("click", (event) => {
			// Obtiene todas las cards
			const cards = document.querySelectorAll(".shadow-hover-red");

			// Quita la clase "shadow-active" de todas las cards
			cards.forEach((card) => {
				card.classList.remove("shadow-active");
			});

			// Añade la clase "shadow-active" a la card seleccionada
			event.currentTarget.classList.add("shadow-active");
		});
	});

	document.addEventListener("click", (event) => {
		// Si el clic no fue en una card, remueve la clase "shadow-active" de todas las cards
		if (!event.target.closest(".shadow-hover-red")) {
			document.querySelectorAll(".shadow-hover-red").forEach((card) => {
				card.classList.remove("shadow-active");
			});
		}
	});
});
//-----------------------------------------------------------------

