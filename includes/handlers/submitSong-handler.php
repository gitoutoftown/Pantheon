<?php 
 
//include("includes/classes/Song.php");
/*
function sanitizeFormPassword($inputText) {
	$inputText = strip_tags($inputText);
	return $inputText;
}

function sanitizeFormUsername($inputText) {
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ", "", $inputText);
	return $inputText;
}

function sanitizeFormString($inputText) {
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ", "", $inputText);
	$inputText = ucfirst(strtolower($inputText));
	return $inputText;
}

*/

function sanitizeFormStripTagsReplaceSpaces($inputText) {
	$inputText = strip_tags($inputText);
	$inputText = str_replace("'","",$inputText);
	$inputText = str_replace("&#39;","",$inputText);
	$inputText = str_replace(" ", "", $inputText); //prob better to make it any space > than 1 to = to 1 space;
	//$inputText = ucfirst(strtolower($inputText));
	return $inputText;
}

function sanitizeFormStripTags($inputText) {
	$inputText = strip_tags($inputText);
	$inputText = str_replace("'","",$inputText);
	$inputText = str_replace("&#39;","",$inputText);

	//$inputText = str_replace(" ", "", $inputText);
	//$inputText = ucfirst(strtolower($inputText));
	return $inputText;
}

function sanitizeFormIfEmpty($inputText) {
	if ($inputText == "") {
		$inputText = "NULL";
	}

	return $inputText;
}

function sanitizeFormGenre($inputText) {
	switch ($inputText) {
		case $inputText == 'genreRapMetadata':
    	$inputText = 1;
    	break;
		case $inputText == 'genrePopMetadata':
    	$inputText = 2;
		break;
		case $inputText == 'genreEDMMetadata':
    	$inputText = 3;
		break;
		case $inputText == 'genreRnBMetadata':
    	$inputText = 4;
		break;
		case $inputText == 'genreRockMetadata':
    	$inputText = 5;
		break;
		case $inputText == 'genreCountryMetadata':
    	$inputText = 6;
		break;
		case $inputText == 'genreAfro-CaribbeanMetadata':
    	$inputText = 7;
		break;
		case $inputText == 'genreJazzMetadata':
    	$inputText = 8;
		break;
		case $inputText == 'genreFolkMetadata':
    	$inputText = 9;
		break;
		case $inputText == 'genreClassicalMetadata':
    	$inputText = 10;
		break;
		case $inputText == 'genreTBDMetadata':
    	$inputText = 11;
		break;
		default:
		$inputText = 11;
	}
	return $inputText;
}


if(isset($_POST['submitSongButton'])) {
	//submitSongButton was pressed
	 $titleSongHandler = sanitizeFormIfEmpty(sanitizeFormStripTags($_POST['titleMetadata'])); 
	 $artistSongHandler = sanitizeFormIfEmpty(sanitizeFormStripTags($_POST['performerMetadata']));
	 $albumSongHandler = sanitizeFormIfEmpty(sanitizeFormStripTags($_POST['albumMetadata']));
	 $transcriptionSongHandler = sanitizeFormIfEmpty($_POST['transcriptionMetadata']);
	 $genreSongHandler = sanitizeFormGenre($_POST['genreMetadata']);
	 $featuredArtistSongHandler = sanitizeFormIfEmpty(sanitizeFormStripTags($_POST['featureMetadata']));
	 $producerSongHandler = sanitizeFormIfEmpty(sanitizeFormStripTags($_POST['producerMetadata']));
	 $writerSongHandler = sanitizeFormIfEmpty(sanitizeFormStripTags($_POST['writerMetadata']));
	 $engineerSongHandler = sanitizeFormIfEmpty(sanitizeFormStripTags($_POST['engineerMetadata']));
	 $linkSongHandler = sanitizeFormIfEmpty(sanitizeFormStripTags($_POST['linkMetadata']));

	/*'titleMetadata'
	'performerMetadata'
	'AlbumMetadata'
	'TranscriptionMetadata'
	Metadata
	
	'featureMetadata'
	'producerMetadata'
	'writerMetadata'
	'engineerMetadata'
	'linkMetadata'
	*/

	$wasSuccessful = $song->submitSong($titleSongHandler, $artistSongHandler, $albumSongHandler, $transcriptionSongHandler, $genreSongHandler, $featuredArtistSongHandler, $producerSongHandler, $writerSongHandler, $engineerSongHandler, $linkSongHandler);
	//$wasSuccessful = submitSong($titleSongHandler, $artistSongHandler, $albumSongHandler, $transcriptionSongHandler, $genreSongHandler, $featuredArtistSongHandler, $producerSongHandler, $writerSongHandler, $engineerSongHandler, $linkSongHandler);

	/*
	if($wasSuccessful == true) {
		$_SESSION['userLoggedIn'] = $username;
		header("Location: index.php");
	}
	*/

	
	if($wasSuccessful == true) {
		$_SESSION['userLoggedIn'] = $username;
		header("Location: index.php");
		
	}
	

}

if(isset($_POST['submitEditButton'])) {
	//submitSongButton was pressed
	 $idSongHandler = $_POST['idMetadata'];
	//echo $titleSongHandler = sanitizeFormIfEmpty(sanitizeFormStripTags($_POST['titleMetadata'])); 
	//echo $artistSongHandler = sanitizeFormIfEmpty(sanitizeFormStripTags($_POST['performerMetadata']));
	 $titleSongHandler = sanitizeFormIfEmpty(sanitizeFormStripTags($_POST['titleMetadata'])); 
	 $artistSongHandler = sanitizeFormIfEmpty(sanitizeFormStripTags($_POST['performerMetadata']));
	 $albumSongHandler = sanitizeFormIfEmpty(sanitizeFormStripTags($_POST['albumMetadata']));
	 $transcriptionSongHandler = sanitizeFormIfEmpty($_POST['transcriptionMetadata']);
	 $genreSongHandler = sanitizeFormGenre($_POST['genreMetadata']);
	 $featuredArtistSongHandler = sanitizeFormIfEmpty(sanitizeFormStripTags($_POST['featureMetadata']));
	 $producerSongHandler = sanitizeFormIfEmpty(sanitizeFormStripTags($_POST['producerMetadata']));
	 $writerSongHandler = sanitizeFormIfEmpty(sanitizeFormStripTags($_POST['writerMetadata']));
	 $engineerSongHandler = sanitizeFormIfEmpty(sanitizeFormStripTags($_POST['engineerMetadata']));
	 $linkSongHandler = sanitizeFormIfEmpty(sanitizeFormStripTags($_POST['linkMetadata']));

	/*'titleMetadata'
	'performerMetadata'
	'AlbumMetadata'
	'TranscriptionMetadata'
	Metadata
	
	'featureMetadata'
	'producerMetadata'
	'writerMetadata'
	'engineerMetadata'
	'linkMetadata'
	*/

	$wasSuccessful = $song->editSong($idSongHandler, $titleSongHandler, $artistSongHandler, $albumSongHandler, $transcriptionSongHandler, $genreSongHandler, $featuredArtistSongHandler, $producerSongHandler, $writerSongHandler, $engineerSongHandler, $linkSongHandler);
	//$wasSuccessful = submitSong($titleSongHandler, $artistSongHandler, $albumSongHandler, $transcriptionSongHandler, $genreSongHandler, $featuredArtistSongHandler, $producerSongHandler, $writerSongHandler, $engineerSongHandler, $linkSongHandler);
	global $wasSuccessful;
	/*
	if($wasSuccessful == true) {
		$_SESSION['userLoggedIn'] = $username;
		header("Location: index.php");
	}
	*/

	 
	if($wasSuccessful == true) {
		//$_SESSION['userLoggedIn'] = $username;
		header("Location: index.php");
		//isset($_POST[$wasSuccessful]);
		//header("Location: song.php?id=$songId");
		/*<a href='editSong.php?edit=<?php echo $songId; ?>'>edit</a> */
		
	}
	

}



?>