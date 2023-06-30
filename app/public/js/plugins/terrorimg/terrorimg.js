class TerrorIMG {
	constructor() {
		// Constructor de la clase
	}

	// Método para leer una imagen seleccionada y mostrarla en un elemento HTML
	leer(imagen, mostrar) {
		if (imagen.files && imagen.files[0]) {
			let leer = new FileReader();
			leer.onload = function (e) {
				mostrar.setAttribute("src", e.target.result);
			};
			leer.readAsDataURL(imagen.files[0]);
		}
	}
	// Método para obtener imagen en formato base64
	obtenerIMG(imagen) {
		return new Promise((resolve, reject) => {
			if (imagen.files && imagen.files[0]) {
				let leer = new FileReader();
				leer.onload = function (e) {
					resolve(e.target.result);
				};
				leer.onerror = function (error) {
					reject("Error al leer la imagen: " + error);
				};
				leer.readAsDataURL(imagen.files[0]);
			} else {
				reject("No se ha seleccionado ninguna imagen.");
			}
		});
	}
	// Método para convertir el src de una imagen a base64 en formato JPEG
	convertirSrcABase64(src) {
		return new Promise((resolve, reject) => {
			const imagen = new Image();
			imagen.crossOrigin = "Anonymous";

			imagen.onload = function () {
				const canvas = document.createElement("canvas");
				canvas.width = imagen.width;
				canvas.height = imagen.height;

				const contexto = canvas.getContext("2d");
				contexto.drawImage(imagen, 0, 0);

				// Cambiar 'image/png' a 'image/jpeg' y ajustar la calidad (0.0 - 1.0) según tus necesidades
				const dataURL = canvas.toDataURL("image/jpeg", 0.8);
				resolve(dataURL);
			};

			imagen.onerror = function () {
				reject("Error al cargar la imagen.");
			};

			imagen.src = src;
		});
	}

	// Método para comprimir una imagen utilizando un factor de compresión (0-100)
	compresion(i, c) {
		return new Promise((resolve, reject) => {
			let r = document.createElement("canvas");
			r.width = i.naturalWidth;
			r.height = i.naturalHeight;
			let o = (r.getContext("2d").drawImage(i, 0, 0), r.toDataURL("image/jpeg", c / 100));
			let s = new Image();
			s.onload = function () {
				resolve(s);
			};
			s.onerror = function () {
				reject("Error al cargar la imagen comprimida.");
			};
			s.src = o;
		});
	}

	// Método para redimensionar una imagen manteniendo la proporción de aspecto
	redimension(i, w, h) {
		return new Promise((resolve, reject) => {
			let img = new Image();
			img.onload = function () {
				let MAX_WIDTH = w || 600;
				let MAX_HEIGHT = h || 550;
				let width = img.width;
				let height = img.height;

				if (width > height) {
					if (width > MAX_WIDTH) {
						height *= MAX_WIDTH / width;
						width = MAX_WIDTH;
					}
				} else {
					if (height > MAX_HEIGHT) {
						width *= MAX_HEIGHT / height;
						height = MAX_HEIGHT;
					}
				}

				let canvas = document.createElement("canvas");
				canvas.width = width;
				canvas.height = height;
				let ctx = canvas.getContext("2d");
				ctx.drawImage(img, 0, 0, width, height);

				resolve(canvas.toDataURL("image/jpeg", 60 / 100));
			};

			img.onerror = function () {
				reject("Error al cargar la imagen.");
			};

			img.src = i;
		});
	}

	// Método para redimensionar y comprimir una imagen
	redicompress(i, w, h, e) {
		return new Promise((resolve, reject) => {
			let img = new Image();
			img.onload = function () {
				let MAX_WIDTH = w || 600;
				let MAX_HEIGHT = h || 550;
				let calidad = e || 100;
				let width = img.width;
				let height = img.height;

				if (width > height) {
					if (width > MAX_WIDTH) {
						height *= MAX_WIDTH / width;
						width = MAX_WIDTH;
					}
				} else {
					if (height > MAX_HEIGHT) {
						width *= MAX_HEIGHT / height;
						height = MAX_HEIGHT;
					}
				}

				let canvas = document.createElement("canvas");
				canvas.width = width;
				canvas.height = height;
				let ctx = canvas.getContext("2d");
				ctx.drawImage(img, 0, 0, width, height);

				resolve(canvas.toDataURL("image/jpeg", calidad / 100));
			};

			img.onerror = function () {
				reject("Error al cargar la imagen.");
			};

			img.src = i;
		});
	}

	// Método para redimensionar y comprimir una imagen en base a un porcentaje
	rediporcentcompress(i, p, e, s) {
		return new Promise((resolve, reject) => {
			let img = new Image();
			img.onload = function () {
				let width = img.width;
				let height = img.height;
				let procent = p > 99 && s ? 99 : p <= 0 ? 1 : p;
				let MAX_WIDTH;
				let MAX_HEIGHT;
				let calidad = e || 100;

				if (s) {
					MAX_WIDTH = (procent * width) / 100;
					width = width - MAX_WIDTH;
					MAX_HEIGHT = (procent * height) / 100;
					height = height - MAX_HEIGHT;
				} else if (!s) {
					MAX_WIDTH = (procent * width) / 100;
					width = width + MAX_WIDTH;
					MAX_HEIGHT = (procent * height) / 100;
					height = height + MAX_HEIGHT;
				} else {
					reject("Operador no encontrado o definido.");
				}

				let canvas = document.createElement("canvas");
				canvas.width = width;
				canvas.height = height;
				let ctx = canvas.getContext("2d");
				ctx.drawImage(img, 0, 0, width, height);

				resolve(canvas.toDataURL("image/jpeg", calidad / 100));
			};

			img.onerror = function () {
				reject("Error al cargar la imagen.");
			};

			img.src = i;
		});
	}

	// Método para redimensionar y comprimir una imagen grande en base a dimensiones específicas
	redicompressbig(i, w, h, e) {
		return new Promise((resolve, reject) => {
			let img = new Image();
			img.onload = function () {
				let width = img.width;
				let height = img.height;
				let MAX_WIDTH = w;
				let MAX_HEIGHT = h;
				let wa, he;

				if (width > height) {
					if (width < MAX_WIDTH) {
						wa = (MAX_WIDTH * width) / 100;
						he = (height * MAX_HEIGHT) / 100;
					}
				} else {
					if (height < MAX_HEIGHT) {
						he = (height * MAX_HEIGHT) / 100;
						wa = (MAX_WIDTH * width) / 100;
					}
				}

				let canvas = document.createElement("canvas");
				canvas.width = wa;
				canvas.height = he;
				let ctx = canvas.getContext("2d");
				ctx.drawImage(img, 0, 0, wa, he);

				resolve(canvas.toDataURL("image/jpeg", e / 100));
			};

			img.onerror = function () {
				reject("Error al cargar la imagen.");
			};

			img.src = i;
		});
	}

	// Método para redimensionar y comprimir una imagen forzando dimensiones específicas
	redicompressforce(i, w, h, e) {
		return new Promise((resolve, reject) => {
			let img = new Image();
			img.onload = function () {
				let canvas = document.createElement("canvas");
				canvas.width = w;
				canvas.height = h;
				let ctx = canvas.getContext("2d");
				ctx.drawImage(img, 0, 0, w, h);

				resolve(canvas.toDataURL("image/jpeg", e / 100));
			};

			img.onerror = function () {
				reject("Error al cargar la imagen.");
			};

			img.src = i;
		});
	}

	// Método para validar la extensión de un archivo de imagen
	validarExtension(i, extend) {
		let ruta = i.value;
		let extension = ruta.substring(ruta.lastIndexOf(".") + 1).toLowerCase();
		let extensionValida = extend.indexOf(extension);

		return extensionValida >= 0;
	}

	// Método para validar las dimensiones de una imagen
	validarMedidas(ancho, alto, c) {
		return new Promise((resolve, reject) => {
			let img = new Image();
			img.src = window.URL.createObjectURL(event.target.files[0]);
			img.onload = () => {
				if (c) {
					resolve(img.width >= ancho && img.height >= alto);
				} else {
					resolve(img.width < ancho && img.height < alto);
				}
			};

			img.onerror = function () {
				reject("Error al cargar la imagen.");
			};
		});
	}

	// Método para validar el peso de un archivo de imagen
	validarPeso(i, peso) {
		return new Promise((resolve, reject) => {
			if (i.files && i.files[0]) {
				let pesoFichero = i.files[0].size / 1024;
				resolve(pesoFichero <= peso);
			} else {
				reject("No se ha seleccionado ningún archivo.");
			}
		});
	}

	// Método para realizar una solicitud FETCH usando fetch
	async fetch(metodo, url, datos) {
		if (!metodo || !url || !datos) {
			throw new Error("Faltan parámetros en la solicitud FETCH.");
		}

		try {
			const response = await fetch(url, {
				method: metodo,
				body: JSON.stringify(datos),
				headers: {
					"Content-Type": "application/json",
				},
			});

			if (!response.ok) {
				throw new Error("Error en la solicitud FETCH: " + response.status);
			}

			const responseData = await response.json();
			return responseData;
		} catch (error) {
			throw new Error("Error en la solicitud FETCH: " + error.message);
		}
	}
}
