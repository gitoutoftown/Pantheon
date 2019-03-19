<?php
    
    //include("includes/config.php");
    /*
    include("includes/classes/Song.php");
    include("includes/classes/User.php");
	include("includes/classes/Artist.php");
    include("includes/classes/Album.php");
    include("includes/classes/Playlist.php");
    */

    include("includes/header.php");
	include("includes/footer.php");
    //include("includes/includedFiles.php");
    include("includes/classes/Constants.php");
    
    if(isset($_GET['edit'])) {
        $songId = $_GET['edit'];
        $songQueryAll = mysqli_query($con, "SELECT * FROM songs WHERE id='$songId'");
        $row = mysqli_fetch_array($songQueryAll);
        //$row[]
        //return $songId;
    }
    //$songId = $_GET['edit'];

    if($userLoggedIn == 'Guest') {
        header("location: song.php?id=$songId");
    }

    //Dummy Id
    //$tempId;
    //$tempId = '0';
    
    $song = new Song($con, $songId);

    include("includes/handlers/submitSong-handler.php");



/*
	include("includes/handlers/register-handler.php");
	include("includes/handlers/login-handler.php");
*/

    

    

	function getInputValue($name) {
		if(isset($_POST[$name])) {
			echo $_POST[$name];
		}
    }
    
   
?>



<!-- id="mainViewContainer" !-->
    <div id="mainViewContainer" class=>
        <div id="mainContent">
            <h1>Edit Song</h1>

            <form class="newMetadata" id=" "  action="editSong.php?edit=<?php echo $songId ?>" method="POST" >
            
            
                <div class="addInfoColumn">
                    <div class="addInfoSuggestions transcription">
                        <div class="">
                            <div class="">
                                    <h4>Need help editing? <a href="">FAQ</a> </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="addInfoSection">
                    <div class="addInfoPrimary addInfoColumn">
                        <h1>Title</h1>
                        <h5>includes Speeches, Songs, Spoken Word etc.</h5>
                        <br>
                        <?php echo $song->getError(Constants::$couldNotBeSubmitted); ?>
                        <?php echo $song->getError(Constants::$titleArtistDuplicate); ?>
                        <input type="hidden" class="idMetadata" name="idMetadata" placeholder="" value="<?php echo $row['id']// getInputValue('titleMetadata') ?>" readonly>
                        <input type="text" class="titleMetadata" name="titleMetadata" placeholder="e.g. I Have A Dream, Dear Mama, The Revolution Will Not Be Televised etc." value="<?php echo $row['title']// getInputValue('titleMetadata') ?>" readonly>
                        <h1>Primary Performer</h1> 
                        <h5>includes Speaker, Solo artist, Duo (Trio, Collaborative efforts etc.), Groups (i.e. Bob Marley & The Wailers is a seperate artist from Bob Marley) </h5> 
                        <br>
                        <input type="text" class="performerMetadata" name="performerMetadata" placeholder="e.g. Martin Luther King, Lady Gaga, Kids See Ghost, The Beatles etc." value="<?php echo $song->songIdToStringConverter($songId, 'artists') // getInputValue('performerMetadata') ?>" readonly>
                        <h1>Album</h1>
                        <br>
                        <input type="text" class="AlbumMetadata" name="albumMetadata" placeholder="e.g. 808s & Heartbreak, Thriller, Discovery etc." value="<?php echo $song->songIdToStringConverter($songId, 'albums') // getInputValue('albumMetadata') ?>">
                        <span class="message"></span>
                    </div>

                </div>

                <div class="addInfoSection">
                    <div class="addInfoTranscription addInfoColumn">
                        <h1>Transcription</h1>
                        <h3>Current Lyrics</h3>
                        <p role="link" id='text' tabindex="0"> <?php echo $song->songIdToStringConverter($songId, 'transcriptions') ?> </p> <br>
                        <br>
                        <!-- <button class="button">Copy</button> !-->
                        <br>
                        <script type="text/javascript">
                            function copy() {
                                var text = document.getElementById('text');
                                var range = document.createRange();

                                range.selectNode(text);
                                window.getSelection().addRange(range);
                                document.execCommand('copy');
                            }
                        </script>
                        <textarea maxlength='20000' rows="30" cols="40" type="text" class="transcriptionMetadata" name="transcriptionMetadata" placeholder="<?php echo $song->songIdToStringConverter($songId, 'transcriptions') // getInputValue('transcriptionMetadata') ?>" value="<?php echo $song->songIdToStringConverter($songId, 'transcriptions') // getInputValue('transcriptionMetadata') ?>" required> </textarea>
                        <span class="message"></span>
                    </div>

                </div>

                <div class="genreOptions">

                    <!--<select name='genreMetadata'> !-->

                        <div class="genreOptions-tag">
                            <input class="required genreOptions-input" data-tag-name="Rap" id="song_primary_tag_id_1434" name="genreMetadata" type="radio" value="genreRapMetadata">
                            <label class="genreOptions-label" for="song_primary_tag_id_1434">Rap</label>
                        </div>

                        <div class="genreOptions-tag">
                            <input class="required genreOptions-input" data-tag-name="Pop" id="song_primary_tag_id_16" name="genreMetadata" type="radio" value="genrePopMetadata">
                            <label class="genreOptions-label" for="song_primary_tag_id_16">Pop</label>
                        </div>

                        <div class="genreOptions-tag">
                            <input class="required genreOptions-input" data-tag-name="EDM" id="song_primary_tag_id_xx" name="genreMetadata" type="radio" value="genreEDMMetadata">
                            <label class="genreOptions-label" for="song_primary_tag_id_xx">EDM</label>
                        </div>

                        <div class="genreOptions-tag">
                            <input class="required genreOptions-input" data-tag-name="RnB" id="song_primary_tag_id_352" name="genreMetadata" type="radio" value="genreRnBMetadata">
                            <label class="genreOptions-label" for="song_primary_tag_id_352">RnB</label>
                        </div>

                        <div class="genreOptions-tag">
                            <input class="required genreOptions-input" data-tag-name="Rock" id="song_primary_tag_id_567" name="genreMetadata" type="radio" value="genreRockMetadata">
                            <label class="genreOptions-label" for="song_primary_tag_id_567">Rock</label>
                        </div>

                        <div class="genreOptions-tag">
                            <input class="required genreOptions-input" data-tag-name="Country" id="song_primary_tag_id_413" name="genreMetadata" type="radio" value="genreCountryMetadata">
                            <label class="genreOptions-label" for="song_primary_tag_id_413">Country</label>
                        </div>

                        <div class="genreOptions-tag">
                            <input class="required genreOptions-input" data-tag-name="Afro-Caribbean" id="song_primary_tag_id_1452" name="genreMetadata" type="radio" value="genreAfro-CaribbeanMetadata">
                            <label class="genreOptions-label" for="song_primary_tag_id_1452">Afro-Caribbean</label>
                        </div>

                        <div class="genreOptions-tag">
                            <input class="required genreOptions-input" data-tag-name="Jazz" id="song_primary_tag_id_1452" name="genreMetadata" type="radio" value="genreJazzMetadata">
                            <label class="genreOptions-label" for="song_primary_tag_id_1452">Jazz</label>
                        </div>

                        <div class="genreOptions-tag">
                            <input class="required genreOptions-input" data-tag-name="Folk" id="song_primary_tag_id_1452" name="genreMetadata" type="radio" value="genreFolkMetadata">
                            <label class="genreOptions-label" for="song_primary_tag_id_1452">Folk</label>
                        </div>

                        <div class="genreOptions-tag">
                            <input class="required genreOptions-input" data-tag-name="Classical" id="song_primary_tag_id_1452" name="genreMetadata" type="radio" value="genreClassicalMetadata">
                            <label class="genreOptions-label" for="song_primary_tag_id_1452">Classical</label>
                        </div>

                        <div class="genreOptions-tag">
                            <input class="required genreOptions-input" data-tag-name="TBD" id="song_primary_tag_id_1452" name="genreMetadata" type="radio" value="genreTBDMetadata">
                            <label class="genreOptions-label" for="song_primary_tag_id_1452">TBD</label>
                        </div>
                
                    </select>

                </div>

                <div class="addInfoSection header">
                    <h2>Supplementary Data</h2>
                </div>

                <div class="addInfoSection">

                    <div class="addInfoSupplementary addInfoColumn">
                        <h3>Feature(s)</h3>
                        <input type="text" class="featureMetadata" name="featureMetadata" placeholder="e.g. Kanye West, Justin Beiber, Nicki Minaj etc." value="<?php echo $song->songIdToStringConverter($songId, 'featuredArtists')//getInputValue('featureMetadata') ?>" >
                        <h3>Producer(s)</h3>
                        <input type="text" class="producerMetadata" name="producerMetadata" placeholder="e.g. Pharrell Williams, Diplo, Metro Boomin etc." value="<?php echo $song->songIdToStringConverter($songId, 'producers')//getInputValue('producerMetadata') ?>" >
                        <h3>Writer(s)</h3>
                        <input type="text" class="writerMetadata" name="writerMetadata" placeholder="e.g. Max Martin, Neil Young, Aubrey Graham, Quentin Miller etc." value="<?php echo $song->songIdToStringConverter($songId, 'writers')// getInputValue('writerMetadata') ?>" >
                        <h3>Engineer(s)</h3>
                        <input type="text" class="engineerMetadata" name="engineerMetadata" placeholder="e.g Manny Marroquin, Mike Dean, Bob Powers etc." value="<?php echo $song->songIdToStringConverter($songId, 'engineers') //getInputValue('engineerMetadata') ?>" >
                        <span class="message"></span>
                    </div>

                    <div class="addInfoColumn">
                        <div class="addInfoSuggestions supplementary">
                                
                        </div>
                    </div>
                </div>

                <div class="addInfoSection header">
                    <h3>Link to Content</h3>
                    <input type="text" class="linkMetadata" name="linkMetadata" placeholder="e.g. Youtube, Soundcloud etc. (ubiquitous sources preferred)" value="<?php echo $row['link'] // getInputValue('linkMetadata') ?>" required>
                </div>
                
                    <button class="button" name="submitEditButton">Submit Edit</button>
            
            </form>
            
        </div>
    </div>
    <!-- <div class="submissionContent">
</div>
!-->