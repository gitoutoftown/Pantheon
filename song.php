<?php
    //include("includes/includedFiles.php");
    include("includes/header.php");
	include("includes/footer.php");
    //include("includes/includedFiles.php");
    include("includes/classes/Constants.php");

    if(isset($_GET['id'])) {
        $songId = $_GET['id'];
    }
    else {
        header("Location: index.php");
    }

    $song = new Song($con, $songId);
     
    $transcription = $song->getTranscription();
    $transcriptionId = $transcription->getId();

    $artist = $song->getArtist();
    $artistId = $artist->getId();

    $album = $song->getAlbum();
    $albumId = $album->getTitle();

    $producer = $song->getProducer();
    $producerId = $producer->getId();

    $writer = $song->getWriter();
    $writerId = $writer->getId();

    $engineer = $song->getEngineer();
    $engineerId = $engineer->getId();

    $featuredArtist = $song->getFeaturedArtist();
    $featuredArtistId = $featuredArtist->getId();

    $link = $song->getLink();
/* <a href='editSong.php?edit=<?php echo $songId; ?>'>edit</a> */   

?>

<div class="entityInfo">
<form class="newMetadata" id=" " action="editSong.php?edit=<?php echo $songId ?>" method="POST">

<div class="leftSection">
    <img src="<?php echo $song->getSongArtworkPath(); ?>">
    
    <p role="link" tabindex="0" onclick="openPage('artist.php?id=<?php echo $artistId; ?>')">By <?php echo $artist->getName(); ?></p>
    
    <div>
    <h4>Album</h4>
    <p> <?php echo $album->getTitle(); ?></p>
    </div>

    <div>
    <h4>Producer(s)</h4>
    <p> <?php echo $producer->getName(); ?></p>
    </div>

    <div>
    <h4>Writer(s)</h4>
    <p> <?php echo $writer->getName(); ?></p>
    </div>

    <div>
    <h4>Engineer(s)</h4>
    <p> <?php echo $engineer->getName(); ?></p>
    </div>

    <div>
    <h4>Feature(s)</h4>
    <p> <?php echo $featuredArtist->getName(); ?></p>
    </div>

    <div>
    <h4>Link(s)</h4>
    <a href="<?php echo $link; ?>" target="_blank"> <?php echo $link; ?> <br/></a>
    </div>

</div>

<div class="rightSection">
    <h2><?php echo $song->getTitle(); ?></h2>
    <!--<h3>Lyrics</h3>!-->
    <p role="link" class="lyrics" tabindex="0"> <br> <?php echo $transcription->getLyrics(); ?> </p>
    
    
    <?php

    if(isset($_GET['userLoggedIn'])) {
        if($_GET['userLoggedIn'] != 'Guest') {
        
            echo' <button class="button" name="editSongButton" onclick>Edit Song</button>';
        
        } else {
            
            echo '
            <div class="leftSection">
            <a href="register.php"> Start an account to edit songs </a>
            </div>';   
        
        }
    }
    
 /*   if($_GET['userLoggedIn'] != 'Guest') {
        
        echo' <button class="button" name="editSongButton" onclick>Edit Song</button>';
    
    } else {
        
        echo '
        <div class="leftSection">
        <a href="register.php"> Start an account to edit songs </a>
        </div>';   
    
    }
*/
    ?>
    
</div>
</form>


<!-- 
<div>
    <a href='$link' role="link" tabindex="0" onclick="openPage($link ?>')">Embedded Link <br> 
   <?php if( $link == 'NULL' || $link == '') {
       echo "Link Is Null";
   } else {
       echo $link;
   }
   
   
   ?></a>
</div>

<audio controls>
  <source src="horse.ogg" type="audio/ogg">
  <source src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/360008900&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true" type="audio/mpeg">
Your browser does not support the audio element.
</audio>

<div>
<iframe width="560" height="315" src="https://www.youtube.com/embed/EvlQOjK0MPk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>

<div>
<iframe width="100%" height="300" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/360008900&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe>
</div>
!-->
</div>