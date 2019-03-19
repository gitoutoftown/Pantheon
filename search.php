<?php
include("includes/includedFiles.php");

if(isset($_GET['term'])) {
	$term = urldecode($_GET['term']);
}
else {
	$term = "";
}
?>

<div class="searchContainer">

	<h4>Search for a creator, work, review ...</h4>
	<input type="text" class="searchInput" value="<?php echo $term; ?>" placeholder="Start typing..." onfocus="this.value = this.value">

</div>

<script>

$(".searchInput").focus();

$(function() {
	
	$(".searchInput").keyup(function() {
		clearTimeout(timer);

		timer = setTimeout(function() {
			var val = $(".searchInput").val();
			openPage("search.php?term=" + val);
		}, 2000);

	})


})

</script>

<?php if($term == "") exit(); ?>

<div class="transcriptionsContainer borderBottom">
	<h2>LYRICS</h2>
	<?php
	$lyricsQuery = mysqli_query($con, "SELECT id,lyrics FROM transcriptions WHERE lyrics LIKE '%$term%' LIMIT 10");

	if(mysqli_num_rows($lyricsQuery) == 0) {
		echo "<span class='noResults'>No lyrics found matching " . $term . "</span>";
	}

	while($row = mysqli_fetch_array($lyricsQuery)) {

		//$lyricsFound = new Transcription($con, $row['id']);
		$transcriptionId = $row['id'];
		$songLyricsQuery =  mysqli_query($con, "SELECT * FROM songs WHERE transcription='$transcriptionId' LIMIT 10");
		
		if(mysqli_num_rows($songLyricsQuery) == 0) {
			echo "<span class='noResults'>No lyrics found matching songs " . $term . "</span>";
		}
		
		while($rowLyricsId = mysqli_fetch_array($songLyricsQuery)) {
			
			$songLyricsFound = new Song($con, $rowLyricsId['id']);
			$artistFound = new Artist($con, $rowLyricsId['artist']);


			echo "<div class='searchResultRow'>
			<div class='artistName'>

				<span role='link' tabindex='0' onclick='openPage(\"song.php?id=" . $songLyricsFound->getId() ."\")'>
				<img src='" . $rowLyricsId['songArtworkPath'] . "'>

						<div class='gridViewInfo'>"
							. $rowLyricsId['title'] .
						"</div>

						<div class='gridViewInfo'>"
							. $row['lyrics'] .
						"</div>
				"
				. $artistFound->getName() .
				"
				</span>

			</div>

		</div>";
			
		}
		


	}


	?>

</div>

<div class="tracklistContainer borderBottom">
	<h2>SONGS</h2>
	<ul class="tracklist">
		
		<?php
		$songsQuery = mysqli_query($con, "SELECT id FROM songs WHERE title LIKE '$term%' LIMIT 10");

		if(mysqli_num_rows($songsQuery) == 0) {
			echo "<span class='noResults'>No songs found matching " . $term . "</span>";
		}



		$songIdArray = array();

		$i = 1;
		while($row = mysqli_fetch_array($songsQuery)) {

			if($i > 15) {
				break;
			}

			array_push($songIdArray, $row['id']);

			$albumSong = new Song($con, $row['id']);
			$songId = $row['id'];
			$albumArtist = $albumSong->getArtist();

			// belongs inside <div class='trackCount'> ... <img class='play' src='assets/images/icons/play-white.png' onclick='setTrack(\"" . $albumSong->getId() . "\", tempPlaylist, true)'>
			echo "<li class='tracklistRow'>
					<div class='trackCount'>
						
						<span class='trackNumber'>$i</span>
					</div>


					<div class='trackInfo'>
						<span class='trackName' onclick='openPage(\"song.php?id=" . $songId. "\")'>" . $albumSong->getTitle() . "</span>
						<span class='artistName'>" . $albumArtist->getName() . "</span>
					</div>

					<div class='trackOptions'>
						<input type='hidden' class='songId' value='" . $albumSong->getId() . "'>
						<img class='optionsButton' src='assets/images/icons/more.png' onclick='showOptionsMenu(this)'>
					</div>

					<div class='trackDuration'>
						<span class='duration'>" . $albumSong->getDuration() . "</span>
					</div>


				</li>";

			$i = $i + 1;
		}

		?>

		<script>
			var tempSongIds = '<?php echo json_encode($songIdArray); ?>';
			tempPlaylist = JSON.parse(tempSongIds);
		</script>

	</ul>
</div>


<div class="artistsContainer borderBottom">

	<h2>ARTISTS</h2>

	<?php
	$artistsQuery = mysqli_query($con, "SELECT id FROM artists WHERE artistName LIKE '$term%' LIMIT 10");
	
	if(mysqli_num_rows($artistsQuery) == 0) {
		echo "<span class='noResults'>No artists found matching " . $term . "</span>";
	}

	while($row = mysqli_fetch_array($artistsQuery)) {

		$artistFound = new Artist($con, $row['id']);

		echo "<div class='searchResultRow'>
				<div class='artistName'>

					<span role='link' tabindex='0' onclick='openPage(\"artist.php?id=" . $artistFound->getId() ."\")'>
					"
					. $artistFound->getName() .
					"
					</span>

				</div>

			</div>";

	}


	?>

</div>

<div class="gridViewContainer borderBottom">
	<h2>ALBUMS</h2>
	<?php
		$albumQuery = mysqli_query($con, "SELECT * FROM albums WHERE title LIKE '$term%' LIMIT 10");

		if(mysqli_num_rows($albumQuery) == 0) {
			echo "<span class='noResults'>No albums found matching " . $term . "</span>";
		}

		while($row = mysqli_fetch_array($albumQuery)) {

			echo "<div class='gridViewItem'>
					<span role='link' tabindex='0' onclick='openPage(\"album.php?id=" . $row['id'] . "\")'>
						<img src='" . $row['artworkPath'] . "'>

						<div class='gridViewInfo'>"
							. $row['title'] .
						"</div>
					</span>

				</div>";



		}
	?>

</div>

<nav class="optionsMenu">
	<input type="hidden" class="songId">
	<?php echo Playlist::getPlaylistsDropdown($con, $userLoggedIn->getUsername()); ?>
</nav>








