var playlist = new Playlist();

//songs add
var strangersInTheNight = new Song("Strangers In The Night", "Frank Sinatra", "2:59");
var yesterday = new Song("Yesterday", "The Beatles", "3:11");

//movies add
var matrix = new Movie("The Matrix", 1999, "2:30:00");

playlist.add(strangersInTheNight);
playlist.add(yesterday);
playlist.add(matrix);

var playlistElement = document.getElementById('playlist');

playlist.renderInElement(playlistElement);

var playButton = document.getElementById('play');
playButton.onclick = function() {
	playlist.play();
	playlist.renderInElement(playlistElement);
}
var nextButton = document.getElementById('next');
nextButton.onclick = function() {
	playlist.next();
	playlist.renderInElement(playlistElement);
}
var stopButton = document.getElementById('stop');
stopButton.onclick = function() {
	playlist.stop();
	playlist.renderInElement(playlistElement);
}