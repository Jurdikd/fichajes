export const contactsMobileTerror = {
	navigatorContacs: async () => {
		const navigatorContacs = await navigator.contacts;
		return navigatorContacs;
	},
	showContact: () => {
		const supported = "contacts" in navigator;
		console.log(supported);
		if (
			"contacts" in navigator &&
			"select" in navigator.contacts &&
			"getProperties" in navigator.contacts
		) {
			try {
				const availableProperties = contactsMobileTerror
					.navigatorContacs()
					.getProperties();
				if (availableProperties.includes("address")) {
					const contactProperties = ["name", "tel"];

					const contacts = contactsMobileTerror
						.navigatorContacs()
						.select(contactProperties, {
							multiple: true,
						});

					console.log("Your first contact: " + contacts[0].name + " " + contacts[0].tel);
					alert("Your first contact: " + contacts[0].name + " " + contacts[0].tel);
				} else {
					console.log(
						"Contact Picker API on your device doesn't support address property"
					);
					alert("Contact Picker API on your device doesn't support address property");
				}
			} catch (e) {
				console.log(e + "Unexpected error happened in Contact Picker API");
				alert(e + "Unexpected error happened in Contact Picker API");
			}
		} else {
			console.log("Your browser doesn't support Contact Picker API");
			alert("Your browser doesn't support Contact Picker API");
		}
	},
};
