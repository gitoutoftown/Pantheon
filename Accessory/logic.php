<?php Logic page
    //
    // do for respective arguments i.e $pr,$en etc.
    private function validateProducer($pr) {
        if(strlen($pr) > 50 || strlen($pr) < 0) {
            array_push($this->errorArray, Constants::$titleCharacters);
            return;
            
        }
        else {
            return $pr = 0;
        }

    
        $checkProducerIdQuery = mysqli_query($this->con, "SELECT id, producerName FROM producers WHERE producerName='$pr");
        
        if(mysqli_num_rows($checkProducerIdQuery) != 0) {
            $producerIdRow = mysqli_fetch_assoc($checkArtistIdQuery);
            $pr = $producerIdRow['id'];
            
            return $pr = $producerIdRow['id'];
        }
        else {	
            mysqli_query($this->con, "INSERT INTO producers VALUES ('', '$pr')");
            if(mysqli_num_rows($checkProducerIdQuery) != 0) {
                $newProducerIdRow = mysqli_fetch_assoc($checkProducerIdQuery);
                $pr = $newArtistIdRow['id'];
                
                return $pr;
            }
            
            else {
                array_push($this->errorArray, Constants::$couldNotBeSubmitted);
                return;
            }
                
            
        }
    }
} 









    private function validateArtistAndTitle ($ti, $ar){
        
            $checkArtistIdQuery = mysqli_query($this->con, "SELECT id, artistName FROM artists WHERE artistName='$ar");
            $checkAlbumIdQuery = mysqli_query($this->con, "SELECT id, albumName FROM albums WHERE albumName='$al");
            $checkTranscriptionIdQuery = mysqli_query($this->con, "SELECT id, lyrics FROM transcriptions WHERE lyrics='$tr");


			//if Querying $ar for artist matches in artists table is not null,...
			//assign id of artist found to variable;  
			if(mysqli_num_rows($checkArtistIdQuery) != 0) {
				$artistIdRow = mysqli_fetch_assoc($checkArtistIdQuery);
				$aristIdCrossExamination = $artistIdRow['id'];

				//Query any songs with a matching title to the one proposed ($ti)...
				//accompanied by found artist;
				$checkTitleArtistQuery = mysqli_query($this->con, "SELECT title, artist FROM songs WHERE title='$ti' AND artist='$aristIdCrossExamination'");
			
				//if any songs are found with matching title and artist id... 
				//(based on variable if artist was found prior) song already exists and bounces error 
				if(mysqli_num_rows($checkTitleArtistQuery) != 0) {
					//$titleArtistRow = mysqli_fetch_assoc($checkTitleArtistQuery);
					array_push($this->errorArray, Constants::$titleArtistDuplicate);
					return;
				}
				// if there was a matching artist in artists but no matching song to producer error...
				// assign proposed artist $ar to matching artist id...
				// finally converting a proposed artist in text to its rightful id int
				else {
                    $ar = $artistIdRow['id'];
                    return $ar;
				}
				
			}

			else {
				//being that there were no matches of artist $ar in artist db
				//add artist to artists db	
				mysqli_query($this->con, "INSERT INTO artists VALUES ('', '$ar')");
				//after new artists is created in artists table an id can be used for...
				//converting proposed artist into proper id int
				if(mysqli_num_rows($checkArtistIdQuery) != 0) {
					$newArtistIdRow = mysqli_fetch_assoc($checkArtistIdQuery);
					$ar = $newArtistIdRow['id'];
					
					return $ar; //$newAristId;
				}
				
				else {
                    array_push($this->errorArray, Constants::$couldNotBeSubmitted);
                    return;
				}
					
				
			}

			return;

    }
        




?>



<!--
<form class="newMetadata" id="submitSongForm" action="submitSong.php" method="POST">
            <div>

                    <?php echo $song->getError(Constants::$couldNotBeSubmitted); ?>
                    <?php echo $song->getError(Constants::$titleArtistDuplicate); ?>
                    <input type="text" class="titleMetadata" name="titleMetadata" placeholder="e.g. I Have A Dream, Dear Mama, The Revolution Will Not Be Televised etc." value="<?php getInputValue('titleMetadata') ?>" required>
                    <input type="text" class="performerMetadata" name="performerMetadata" placeholder="e.g. Martin Luther King, Lady Gaga, Kids See Ghost, The Beatles etc." value="<?php getInputValue('performerMetadata') ?>" required>
                    <input type="text" class="albumMetadata" name="albumMetadata" placeholder="e.g. 808s & Heartbreak, Thriller, Discovery etc." value="<?php getInputValue('albumMetadata') ?>">
                    <textarea rows="30" cols="40" type="text" class="transcriptionMetadata" id="transcriptionMetadata" name="transcriptionMetadata" placeholder="i.e (Hook) Write hook here i.e (Verse) Write verse here" value="<?php getInputValue('transcriptionMetadata') ?>" required> </textarea>    
                    
                    <div class="genreOptions">
    
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
                    <input class="required genreOptions-input" data-tag-name="TBD" id="song_primary_tag_id_1452" name="genreMetadata" type="radio" value="genreTBDMetadata" checked>
                    <label class="genreOptions-label" for="song_primary_tag_id_1452">TBD</label>
                </div>

                    <h3>Feature(s)</h3>
                    <input type="text" class="featureMetadata" name="featureMetadata" placeholder="e.g. Kanye West, Justin Beiber, Nicki Minaj etc." value="<?php getInputValue('featureMetadata') ?>" >
                    <h3>Producer(s)</h3>
                    <input type="text" class="producerMetadata" name="producerMetadata" placeholder="e.g. Pharrell Williams, Diplo, Metro Boomin etc." value="<?php getInputValue('producerMetadata') ?>" >
                    <h3>Writer(s)</h3>
                    <input type="text" class="writerMetadata" name="writerMetadata" placeholder="e.g. Max Martin, Neil Young, Aubrey Graham, Quentin Miller etc." value="<?php getInputValue('writerMetadata') ?>" >
                    <h3>Engineer(s)</h3>
                    <input type="text" class="engineerMetadata" name="engineerMetadata" placeholder="e.g Manny Marroquin, Mike Dean, Bob Powers etc." value="<?php getInputValue('engineerMetadata') ?>" >
                    <h3>Link to Content</h3>
                    <input type="text" class="linkMetadata" name="linkMetadata" placeholder="e.g. Youtube, Soundcloud etc. (ubiquitous sources preferred)" value="<?php getInputValue('linkMetadata') ?>" required> 
            </div>

            <button class="button" name="submitSongButton">Submit Song</button>

        </form>

!-->