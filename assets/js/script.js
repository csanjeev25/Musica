function Audio() {
	this.audio = document.createElement('audio');
	this.currentlyPlaying;

	this.setTrack = function(src){
		this.audio.src = src;
	}
}