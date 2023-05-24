const terroralert = {
	//p=posicion, i= icono, t=titulo, ti= tiempo, zIndex= zindex
	swal: function (p, i, t, ti, zIndex = null) {
		let alerta;
		if (zIndex === null) {
			alerta = Swal.mixin({
				toast: true,
				position: p,
				showConfirmButton: false,
				timer: ti,
				timerProgressBar: ti,
			});
		} else {
			alerta = Swal.mixin({
				toast: true,
				position: p,
				showConfirmButton: false,
				timer: ti,
				timerProgressBar: ti,
				customClass: {
					container: `zindex-${zIndex}`,
				},
				didOpen: (toast) => {
					toast.style.top = `${parseInt(toast.style.top)}px`;
				},
			});
		}
		alerta.fire({
			icon: i,
			title: t,
		});
		return true;
	},
	alertify_success: function (p, m, callback) {
		alertify.set("notifier", "position", p);
		alertify.success(m, function () {
			if (callback) callback(true);
		});
	},
	alertify_error: function (p, m, callback) {
		alertify.set("notifier", "position", p);
		alertify.error(m, function () {
			if (callback) callback(true);
		});
	},
	alertify_warning: function (p, m, callback) {
		alertify.set("notifier", "position", p);
		alertify.warning(m, function () {
			if (callback) callback(true);
		});
	},
	alertify_confirm: function (p, m, callback) {
		alertify.set("notifier", "position", p);
		alertify.confirm(m, function (e) {
			if (callback) callback(e);
		});
	},
	showAlerts: function (messages, position, type, zIndex, sound, soundAlerts) {
		let index = 0;
		function showAlert() {
			const message = messages[index];
			const duration = messages[index + 1];
			terroralert.swal(position, type, message, duration, zIndex);
			if (sound) {
				soundAlerts.play(sound);
			}
			index += 2;
			if (index < messages.length) {
				setTimeout(showAlert, duration);
			} else {
				return true;
			}
		}
		return showAlert();
	},
	getWindowSize: function () {
		const windowWidth = window.innerWidth;
		if (windowWidth >= 1200) {
			return "lg";
		} else if (windowWidth >= 992) {
			return "md";
		} else if (windowWidth >= 768) {
			return "sm";
		} else {
			return "xs";
		}
	},
};
