var currentPlaylistArray = new Array();
var shufflePlaylistArray = new Array();
var tempPlayListArray = new Array();
var audioElement;
var mouseDown = false;
var currentIndex;
var previousIndex;
var repeatState = false;
var shuffle = false;
var userLoggedIn;
var timer;

$(document).click(function(click){
	var target = $(click.target);
	if(!target.hasClass("item") && !target.hasClass("optionsButton")){
		hideOptionsMenu();
	}
});

$(window).scroll(function(){
	hideOptionsMenu();
});

$(document).on("change","select.playlist",function(){
	var select = $(this);
	var playlistId = $(this).val();
	var songId = $(this).prev(".songId").val();

	$.post("includes/handlers/ajax/addToPlaylist.php",{playlistId:playlistId,songId:songId})
	.done(function(error){
		hideOptionsMenu();
		select.val("");
		if(error != ""){
			console.log(error);
		}
	});
});

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

		this.audio.addEventListener("volumechange",function(){
			//console.log("Hello")
			updateVolumeProgressBar(this);
		});

		this.audio.addEventListener("ended",function(){
			nextSong();
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

function updateVolumeProgressBar(audio){
	var volume = audio.volume * 100;
	$(".volumeBar .progress").css("width",volume+"%");
}

function openPage(url){
	if(timer != null){
		clearTimeout(timer);
	}
	if(url.indexOf("?") == -1){
		url = url+"?";
	}
	var encodeURL = encodeURI(url + "&userLoggedIn="+ userLoggedIn);
	$("#mainContent").load(encodeURL);
	$("body").scrollTop(0);
	history.pushState(null,null,url);
}

function playArtistSongs(){
	setTrack(tempPlayListArray[0],tempPlayListArray,true);
}

function createPlaylist(){
	var popup = prompt("Please enter name of your playlist");

	if(popup != null){
		$.post("includes/handlers/ajax/createPlaylist.php",{name:popup,username:userLoggedIn}).done(function(error){
			if(error != null){
				alert(error);
			}
			openPage("yourMusic.php");
		});
	}
}

function deletePlaylist(playlistId){
	var prompt = confirm("Are you sure you want to delete this playlist");
	if(prompt){
		$.post("includes/handlers/ajax/deletePlaylist.php",{playlistId:playlistId}).done(function(error){
			if(error != null){
				alert(error);
			}
			openPage("yourMusic.php");
		});
	}
}

function showOptionsMenu(button){
	var songId = $(button).prevAll(".songId").val();
	var menu = $(".optionsMenu");
	menu.find(".songId").val(songId);
	var menuWidth = menu.width();
	var scrollTop = $(window).scrollTop();
	var elementOffset = $(button).offset().top;

	var top = elementOffset - scrollTop;
	var left = $(button).position().left;
	menu.css({"top":top+"px","left":left - menuWidth +"px","display":"inline"});
}

function hideOptionsMenu(){
	var menu = $(".optionsMenu");
	if(menu.css("display") != "none"){
		menu.css("display","none");
	}
}

function deleteFromPlaylist(button,playlistId){
	var songId = $(button).prevAll(".songId").val();
	$.post("includes/handlers/ajax/deleteFromPlaylist.php",{playlistId:playlistId,songId:songId})
	.done(function(error){
		//console.log("Valar Morghulis");
		if(error != ""){
				alert(error);
				console.log("error");
				return;
		}
		openPage("playlist.php?id=" + playlistId);
	});
}

function logout(){
	$.post("includes/handlers/ajax/logout.php",function(){
		location.reload();
	});
}

function updateEmail(emailClass){
	var emailValue = $("." + emailClass).val();
	$.post("includes/handlers/ajax/updateEmail.php",{email:emailValue,username : userLoggedIn})
	.done(function(response){
		$("." + emailClass).nextAll(".message").text(response);
	});
}

function updatePassword(oldPasswordClass, newPasswordClass1, newPasswordClass2){
	var oldPassword = $("." + oldPasswordClass).val();
	var newPassword1 = $("." + newPasswordClass1).val();
	var newPassword2 = $("." + newPasswordClass2).val();
	$.post("includes/handlers/ajax/updatePassword.php",{oldPassword:oldPassword,
		newPassword1:newPassword1,
		newPassword2:newPassword2,
		username : userLoggedIn})
	.done(function(response){
		$("." + oldPasswordClass).nextAll(".message").text(response);
	});
}