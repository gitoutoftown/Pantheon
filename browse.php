<?php 
include("includes/includedFiles.php");
 
?>
<!-- <h1 class="pageHeadingBig"><img src="assets/images/icons/Pantheon-neon-logo@1.5x.png"></h1> !-->
<h1 class="pageHeadingBig">PANTHEON</h1>

<div class="gridViewContainer">

		<!-- <h2 class="pageHeadingBig">Trending Songs</h2> !-->

	<?php
		$songQuery = mysqli_query($con, "SELECT * FROM songs ORDER BY RAND() LIMIT 12");
		//($con, "SELECT id FROM songs ORDER BY RAND() LIMIT 10")
		//$songQuery = mysqli_query($con, "SELECT * FROM songs ORDER BY id DESC LIMIT 10");
		//Order by plays

		while($rowSong = mysqli_fetch_array($songQuery)) {
			



			echo "<div class='gridViewItem'>
					<span role='link' tabindex='0' onclick='openPage(\"song.php?id=" . $rowSong['id'] . "\")'>
						<img src='" . $rowSong['songArtworkPath'] . "'>
						

						<div class='gridViewInfo'>"
							. $rowSong['title'] . //. $rowSong['plays'] .
						"</div>
						
					</span>

				</div>";



		}

		/*if($wasSuccessful == true) {
			//$_SESSION['userLoggedIn'] = $username;
			echo'
			<div> 
			<span class="message"> Song was successfully submitted. Check it out in the search bar!</span>
			</div>
			';
			//header("Location: song.php?id=$songId");
			/*<a href='editSong.php?edit=<?php echo $songId; ?>'>edit</a> 
			
		}*/
	?>

</div>