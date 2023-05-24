class ConexionTerror {
	constructor() {
		window.addEventListener("load", () => {
			this.checkInternetConnection();
		});

		window.addEventListener("online", () => {
			this.checkInternetConnection();
		});

		window.addEventListener("offline", () => {
			this.checkInternetConnection();
		});

		this.onConnected = null;
		this.onDisconnected = null;
	}

	verify() {
		return navigator.onLine;
	}

	checkInternetConnection() {
		const online = navigator.onLine;
		if (online) {
			if (this.onConnected) {
				this.onConnected();
			}
		} else {
			if (this.onDisconnected) {
				this.onDisconnected();
			}
		}
	}
}
