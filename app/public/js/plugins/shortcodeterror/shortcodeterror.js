class ShortCodeTerror {
	constructor() {
		this.codeLength = 4; // Cambiar la longitud del código aquí
	}

	hash(jsonData) {
		// Ciframos el texto completo
		const cipherText = btoa(jsonData);

		// Generamos un código de longitud especificada
		const code = Math.random()
			.toString(36)
			.substring(2, 2 + this.codeLength);

		// Devolvemos el código y el texto cifrado concatenados
		return code + cipherText;
	}

	unhash(encrypted) {
		// Separamos el código y el texto cifrado completo a partir del texto proporcionado
		const code = encrypted.slice(0, this.codeLength);
		const cipherText = encrypted.slice(this.codeLength);

		// Desciframos el texto cifrado completo
		const dataString = atob(cipherText);
		return dataString;
	}

	hashjson(jsonData) {
		// Convertimos el JSON a una cadena de texto
		const jsonString = JSON.stringify(jsonData);

		// Ciframos el texto completo
		const cipherText = btoa(jsonString);

		// Generamos un código de longitud especificada
		const code = Math.random()
			.toString(36)
			.substring(2, 2 + this.codeLength);

		// Devolvemos el código y el texto cifrado concatenados
		return code + cipherText;
	}

	unhashjson(encrypted) {
		// Separamos el código y el texto cifrado completo a partir del texto proporcionado
		const code = encrypted.slice(0, this.codeLength);
		const cipherText = encrypted.slice(this.codeLength);

		// Desciframos el texto cifrado completo
		const jsonString = atob(cipherText);

		try {
			const parsedData = JSON.parse(jsonString);
			return parsedData;
		} catch (error) {
			console.error("JSON inválido:", error);
			return null;
		}
	}
}
