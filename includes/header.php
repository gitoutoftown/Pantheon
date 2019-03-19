<?php
include("includes/config.php");
include("includes/classes/User.php");
include("includes/classes/Artist.php");
include("includes/classes/Album.php");
include("includes/classes/Song.php");
include("includes/classes/Playlist.php");
include("includes/classes/Transcription.php");
include("includes/classes/FeaturedArtist.php");
include("includes/classes/Producer.php");
include("includes/classes/Writer.php");
include("includes/classes/Engineer.php");
//include("includes/classes/Account.php");

//session_destroy(); LOGOUT

if(isset($_SESSION['userLoggedIn'])) {
	$userLoggedIn = new User($con, $_SESSION['userLoggedIn']);
	$username = $userLoggedIn->getUsername();
	echo "<script>userLoggedIn = '$username';</script>";
}
else {
	//header("Location: register.php");
	$userLoggedIn = new User($con, "Guest");
	$username = $userLoggedIn->getUsername();
	echo "<script>userLoggedIn = '$username';</script>";
	
}

?>

<html>
<head>
	<title>Pantheon</title>

	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="assets/js/script.js"></script>
</head>

<body>

	<div id="mainContainer">

		<div id="topContainer">

			<?php include("includes/navBarContainer.php"); ?>

			<div id="mainViewContainer">

				<div id="mainContent">