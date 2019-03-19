<?php
include("includes/includedFiles.php");
?>

<div class="playlistsContainer">

	<div class="gridViewContainer">
		<h2>PLAYLISTS</h2>

		<div class="buttonItems">
			<?php
			if($_GET['userLoggedIn'] != 'Guest') {
				echo '<button class="button playlist" onclick="createPlaylist()">NEW PLAYLIST</button>';
			} else {
				
			}
			
			//OG button code just in case
			/*<button class="button playlist" onclick="createPlaylist()">NEW PLAYLIST</button> */
			?>
		</div>



		<?php
			$username = $userLoggedIn->getUsername();

			$playlistsQuery = mysqli_query($con, "SELECT * FROM playlists WHERE owner='$username'");

			if($_GET['userLoggedIn'] != 'Guest') {
				if(mysqli_num_rows($playlistsQuery) == 0) {
					echo "<span class='noResults'>You don't have any playlists yet.</span>";
				}
			} else {
				echo "<span class='noResults'> Guest's permissions limited</span>";
			}
			

			while($row = mysqli_fetch_array($playlistsQuery)) {

				$playlist = new Playlist($con, $row);

				echo "<div class='gridViewItem' role='link' tabindex='0' 
							onclick='openPage(\"playlist.php?id=" . $playlist->getId() . "\")'>

						<div class='playlistImage'>
							<img src='assets/images/icons/playlist.png'>
						</div>
						
						<div class='gridViewInfo'>"
							. $playlist->getName() .
						"</div>

					</div>";



			}
		?>






	</div>

</div>