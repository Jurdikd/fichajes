export class loadRatesTerror{
	static verifyStorage() {
		if (typeof Storage !== "undefined") {
			return true;
		} else {
			return false;
		}
	}

	static loadDefault() {
		if (loadRatesTerror.verifyStorage() === true) {
			if (
				!localStorage.getItem("rate") &&
				!localStorage.getItem("currency") &&
				!localStorage.getItem("iso") &&
				!localStorage.getItem("to")
			) {
				localStorage.setItem("rate", "bcv");
				localStorage.setItem("currency", "others");
				localStorage.setItem("to", "ves");
				localStorage.setItem("iso", "usd");
			}
		}
	}

	static getRate() {
		if (loadRatesTerror.verifyStorage() === true) {
			return localStorage.getItem("rate");
		}
	}

	static setRate(rate) {
		if (loadRatesTerror.verifyStorage() === true) {
			localStorage.setItem("rate", rate);
		}
	}

	static deleteRate() {
		if (loadRatesTerror.verifyStorage() === true) {
			localStorage.removeItem("rate");
		}
	}

	static getCurrency() {
		if (loadRatesTerror.verifyStorage() === true) {
			return localStorage.getItem("currency");
		}
	}

	static setCurrency(currency) {
		if (loadRatesTerror.verifyStorage() === true) {
			localStorage.setItem("currency", currency);
		}
	}

	static deleteCurrency() {
		if (loadRatesTerror.verifyStorage() === true) {
			localStorage.removeItem("currency");
		}
	}

	static getIso() {
		if (loadRatesTerror.verifyStorage() === true) {
			return localStorage.getItem("iso");
		}
	}

	static setIso(iso) {
		if (loadRatesTerror.verifyStorage() === true) {
			localStorage.setItem("iso", iso);
		}
	}

	static deleteIso() {
		if (loadRatesTerror.verifyStorage() === true) {
			localStorage.removeItem("iso");
		}
	}

	static getTo() {
		if (loadRatesTerror.verifyStorage() === true) {
			return localStorage.getItem("to");
		}
	}

	static setTo(to) {
		if (loadRatesTerror.verifyStorage() === true) {
			localStorage.setItem("to", to);
		}
	}

	static deleteTo() {
		if (loadRatesTerror.verifyStorage() === true) {
			localStorage.removeItem("to");
		}
	}
}
