var currentPlaylistArray = new Array();
var audioElement;
var mouseDown = false;

function Audio() {
	this.audio = document.createElement('audio');
	this.currentlyPlaying;

	this.setTrack = function(track){
		//console.log(track);
		this.audio.src = track.path;
		this.currentlyPlaying = track;

		this.audio.addEventListener("canplay",function(){
			$(".progressTime.remaining").text(formatTime(this.duration));
		});

		this.audio.addEventListener("timeupdate",function(){
			if(this.duration){
				updateTimeProgressBar(this);
			}
		});
	}

	this.play = function(){
		this.audio.play();
	}

	this.pause = function(){
		this.audio.pause();
	}

	this.setTime = function(seconds){
		this.audio.currentTime = seconds;
	}
}

function formatTime(seconds){
	var time = Math.round(seconds);
	var minutes = Math.floor(time/60);
	var seconds = time - minutes * 60;

	var extraZero = (seconds < 10) ? "0" : "";

	return minutes + ":" + extraZero + seconds;
}

function updateTimeProgressBar(audio){
	$(".progressTime.current").text(formatTime(audio.currentTime));
	//$(".progressTime.remaining").text(formatTime(audio.duration - audio.currentTime));

	var progress = audio.currentTime / audio.duration * 100;
	$(".playbackBar .progress").css("width",progress + "%");
}