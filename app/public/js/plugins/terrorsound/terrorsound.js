function TerrorSound() {
	const sounds = {};

	function playSound(sound) {
		if (!sounds[sound]) {
			return;
		}
		if (!sounds[sound].paused) {
			return;
		}
		sounds[sound].currentTime = 0;
		sounds[sound].play();
	}

	function stopSound(sound) {
		if (!sounds[sound]) {
			return;
		}
		sounds[sound].pause();
		sounds[sound].currentTime = 0;
	}

	function pauseSound(sound) {
		if (!sounds[sound]) {
			return;
		}
		sounds[sound].pause();
	}

	function resumeSound(sound) {
		if (!sounds[sound]) {
			return;
		}
		sounds[sound].play();
	}

	function setVolume(sound, volume) {
		if (!sounds[sound]) {
			return;
		}
		sounds[sound].volume = volume;
	}

	function onPlay(sound, callback) {
		if (!sounds[sound]) {
			return;
		}
		sounds[sound].addEventListener("play", callback);
	}

	function addSound(name, url) {
		const sound = new Audio(url);
		sounds[name] = sound;
	}

	function isPlaying(sound) {
		if (!sounds[sound]) {
			return false;
		}
		return !sounds[sound].paused;
	}

	return {
		addSound,
		play: playSound,
		stop: stopSound,
		pause: pauseSound,
		resume: resumeSound,
		setVolume,
		onPlay,
		isPlaying,
	};
}
