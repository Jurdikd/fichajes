export const loadingTerror = {
	load: (loading, time) => {
		setTimeout(() => {
			loading.style.display = "none";
		}, time);
	},
	message: async (msg) => {
		try {
			const res = await fetch("json/messageLoader.json");
			const data = await res.json();
			const msgSelect = Math.floor(Math.random() * data.length);
			msg.innerText = data[msgSelect].message;
		} catch (error) {
			console.log(error);
		}
	},
};
