<?php

if(isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
	include("includes/config.php");
	include("includes/classes/User.php");
	include("includes/classes/Artist.php");
	include("includes/classes/Album.php");
	include("includes/classes/Song.php");
	include("includes/classes/Transcription.php");
	include("includes/classes/FeaturedArtist.php");
	include("includes/classes/Producer.php");
	include("includes/classes/Writer.php");
	include("includes/classes/Engineer.php");
	//include("includes/classes/testSong.php");
	include("includes/classes/Playlist.php");
//  include("includes/classes/Edit.php");
//  include("includes/classes/Review.php");
	include("includes/classes/Constants.php");
//	include("includes/handlers/submitSong-handler.php");

	if(isset($_GET['userLoggedIn'])) {
		$userLoggedIn = new User($con, $_GET['userLoggedIn']);
		
	} elseif( $_SESSION['userLoggedIn'] == 'Guest') {
		$userLoggedIn = 'Guest';
		$username = 'Guest';
	}
	else {
		echo "Username variable was not passed into page. Check the openPage JS function";
		exit();
	}
}
else {
	include("includes/header.php");
	include("includes/footer.php");

	$url = $_SERVER['REQUEST_URI'];
	echo "<script>openPage('$url')</script>";
	exit();
}

?>