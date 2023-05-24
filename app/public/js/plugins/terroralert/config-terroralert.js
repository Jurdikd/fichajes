//config to alerts
const windowSize = terroralert.getWindowSize();
const alertPositions = {
	xs: "top-start",
	sm: "top-start",
	md: "bottom-left",
	lg: "top-right",
};

const alertPosition = alertPositions[windowSize];
