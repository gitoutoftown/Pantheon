<?php
	class Song {

		private $con;
		private $id;
		private $errorArray;
		private $mysqliData;
		private $title;
		private $artistId;
		private $albumId;
		private $transcriptionId;
		private $genre;
		private $featuredArtistId;
		private $producerId;
		private $writerId;
		private $engineerId;
		private $link;
		private $duration;
		

		public function __construct($con, $id) {
			$this->con = $con;
            $this->id = $id;
            
			$this->errorArray = array(); //

			$query = mysqli_query($this->con, "SELECT * FROM songs WHERE id='$this->id'");
			$this->mysqliData = mysqli_fetch_array($query);
			$this->title = $this->mysqliData['title'];
			$this->artistId = $this->mysqliData['artist'];
			$this->albumId = $this->mysqliData['album'];

			$this->transcriptionId = $this->mysqliData['transcription'];

			$this->genre = $this->mysqliData['genre'];
			$this->featuredArtistId = $this->mysqliData['featuredArtist'];
			$this->producerId = $this->mysqliData['producer'];
			$this->writerId = $this->mysqliData['writer'];
			$this->engineerId = $this->mysqliData['engineer'];

			$this->link = $this->mysqliData['link'];
			$this->duration = $this->mysqliData['duration'];
			$this->songArtworkPath = $this->mysqliData['songArtworkPath'];
			
			
		}

		public function getTitle() {
			return $this->title;
		}

		public function getId() {
			return $this->id;
		}

		public function getArtist() {
			return new Artist($this->con, $this->artistId);
		}

		public function getAlbum() {
			return new Album($this->con, $this->albumId);
		}

		public function getLink() {
			return $this->link;
		}

		public function getDuration() {
			return $this->duration;
		}

		public function getMysqliData() {
			return $this->mysqliData;
		}
		//genre refers to a # should it be GenreId referenced like artist,album etc.?
		public function getGenre() {
			return $this->genre;
		}

		public function getTranscription() {
			return new Transcription($this->con, $this->transcriptionId);
		}

		public function getFeaturedArtist() {
			return new FeaturedArtist($this->con, $this->featuredArtistId);
		}

		public function getProducer() {
			return new Producer($this->con, $this->producerId);
		}

		public function getWriter() {
			return new Writer($this->con, $this->writerId);
		}

		public function getEngineer() {
			return new Engineer($this->con, $this->engineerId);
		}

		public function getSongArtworkPath() {
			return $this->songArtworkPath;
		}



		public function submitSong($ti, $ar, $al, $tr, $ge, $fe, $pr, $wr, $en, $li) {
			
		


			$this->validateArtistAndTitle($ti, $ar);

			
			if(empty($this->errorArray) == false) {
				return false;
			}
			
			$this->validateAlbum($ti, $ar, $al, $ge);
			$this->realEscapeStringTranscription($tr);
			$this->validateTranscription($tr);
			$this->validateFeaturedArtist($fe);
			$this->validateProducer($pr);
			$this->validateWriter($wr);
			$this->validateEngineer($en);
			//$this->validateLink($li);
		

			if(empty($this->errorArray) == true) {
				//Insert into db
				return $this->insertUserDetails($ti, $ar, $al, $tr, $ge, $fe, $pr, $wr, $en, $li);
			}
			else {
				return false;
			}

		}

		public function editSong($id, $ti, $ar, $al, $tr, $ge, $fe, $pr, $wr, $en, $li) {
			
		


			//$this->validateArtistAndTitle($ti, $ar);

			
			/*
			if(empty($this->errorArray) == false) {
				return false;
			}
			*/
			
			$this->validateAlbum($ti, $ar, $al, $ge);
			$this->realEscapeStringTranscription($tr);
			$this->validateTranscription($tr);
			$this->validateFeaturedArtist($fe);
			$this->validateProducer($pr);
			$this->validateWriter($wr);
			$this->validateEngineer($en);
			//$this->validateLink($li);
		
			
			if(empty($this->errorArray) == true) {
				//Insert into db
				//return $this->editUserDetails($id, $ti, $ar, $al, $tr, $ge, $fe, $pr, $wr, $en, $li);
				return $result = mysqli_query($this->con, "UPDATE songs SET album='$al', transcription='$tr', featuredArtist='$fe', producer='$pr', writer='$wr', engineer='$en', link='$li' WHERE id='$id'");
			}
			else {
				return false;
			}

		}

		public function getError($error) {
			if(!in_array($error, $this->errorArray)) {
				$error = "";
			}
			return "<span class='errorMessage'>$error</span>";
		}

		public function songIdToStringConverter ($songId, $tableName) {
			
			$this->id = $songId;
			$query = mysqli_query($this->con, "SELECT * FROM songs WHERE id='$songId'");
			$row = mysqli_fetch_array($query);
			$artistId = $row['artist'];
			$albumId = $row['album'];
			$featuredArtistId = $row['featuredArtist'];
			$producerId = $row['producer'];
			$writerId = $row['writer'];
			$engineerId = $row['engineer'];
			$transcriptionId = $row['transcription'];

			$artistQuery = mysqli_query($this->con, "SELECT * FROM artists WHERE id='$artistId'");
			$albumQuery = mysqli_query($this->con, "SELECT * FROM albums WHERE id='$albumId'");
			$featuredArtistQuery = mysqli_query($this->con, "SELECT * FROM featuredArtists WHERE id='$featuredArtistId'");
			$producerQuery = mysqli_query($this->con, "SELECT * FROM producers WHERE id='$producerId'");
			$writerQuery = mysqli_query($this->con, "SELECT * FROM writers WHERE id='$writerId'");
			$engineerQuery = mysqli_query($this->con, "SELECT * FROM engineers WHERE id='$engineerId'");
			$transcriptionQuery = mysqli_query($this->con, "SELECT * FROM transcriptions WHERE id='$transcriptionId'");
			
			if($tableName == 'artists') {
				$row = mysqli_fetch_array($artistQuery);
				$artistName = $row['artistName'];
				return $artistName;
			}
			
			if($tableName == 'albums') {
				$row = mysqli_fetch_array($albumQuery);
				$title = $row['title'];
				return $title;
			}
			
			if($tableName == 'featuredArtists') {
				$row = mysqli_fetch_array($featuredArtistQuery);
				$featuredArtistName = $row['featuredArtistName'];
				return $featuredArtistName;
			}

			if($tableName == 'producers') {
				$row = mysqli_fetch_array($producerQuery);
				$producerName = $row['producerName'];
				return $producerName;
			}

			if($tableName == 'writers') {
				$row = mysqli_fetch_array($writerQuery);
				$writerName = $row['writerName'];
				return $writerName;
			}

			if($tableName == 'engineers') {
				$row = mysqli_fetch_array($engineerQuery);
				$engineerName = $row['engineerName'];
				return $engineerName;
			}

			if($tableName == 'transcriptions') {
				$row = mysqli_fetch_array($transcriptionQuery);
				$lyrics = $row['lyrics'];
				return $lyrics;
			}

			return;

		}

		private function insertUserDetails($ti, $ar, $al, $tr, $ge, $fe, $pr, $wr, $en, $li) {

			//$ti = 'Elon'; 
			//$ar = 2;
			//$al = 1;
			//$tr = 1;
			//$ge = 1;
			//$fe = 1;
			//$pr = 1;
			//$wr = 1;
			//$en = 1;
			//$li = 'www.soundcloud.com/baybfacetoure'; 
			//		$du = '0:00';
			//$ao = 1;
			//$pl = 100000000;
			
			// $ge = 
			$sa = 'assets/images/artwork/stockAlbumArtboard.png';
			//echo "INSERT INTO songs VALUES ('', '$ti', '$ar', '$al', '$tr', '$ge', '$fe', '$pr', '$wr', '$en', '$li', 'NULL', 'NULL', 'NULL', '$sa')";
			$result = mysqli_query($this->con, "INSERT INTO songs VALUES ('', '$ti', '$ar', '$al', '$tr', '$ge', '$fe', '$pr', '$wr', '$en', '$li', 'NULL', 'NULL', 'NULL', '$sa')");
			// Function for values inserted into songs inserting in other sub tables

			return $result;
		}

		private function editUserDetails($id, $ti, $ar, $al, $tr, $ge, $fe, $pr, $wr, $en, $li) {

			//$ti = 'Elon'; 
			//$ar = 2;
			//$al = 1;
			//$tr = 1;
			//$ge = 1;
			//$fe = 1;
			//$pr = 1;
			//$wr = 1;
			//$en = 1;
			//$li = 'www.soundcloud.com/baybfacetoure'; 
			//		$du = '0:00';
			//$ao = 1;
			//$pl = 100000000;
			
			// $ge = 
			//$sa = 'assets/images/artwork/stockAlbumArtboard.png';
			//echo "UPDATE INTO songs VALUES ('', '$ti', '$ar', '$al', '$tr', '$ge', '$fe', '$pr', '$wr', '$en', '$li', 'NULL', 'NULL', 'NULL', '$sa')";
			//$result = mysqli_query($this->con, "UPDATE INTO songs VALUES ('$id', '$ti', '$ar', '$al', '$tr', '$ge', '$fe', '$pr', '$wr', '$en', '$li', 'NULL', 'NULL', 'NULL', '$sa')");
			//$result = mysqli_query($this->con, "UPDATE songs SET album='$al', transcription='$tr', featuredArtist='$fe', producer='$pr', writer='$en', link='$li' WHERE id='$id'");
			//"UPDATE songs SET album='$al', transcription='$tr', featuredArtist='$fe', producer='$pr', writer='$en', link='$li' WHERE id='$id'"
			// Function for values inserted into songs inserting in other sub tables

			return $result;
		}

		private function realEscapeStringTranscription (&$tr) {
			$tr = mysqli_real_escape_string($this->con, $tr);
			return $tr;
		}

		private function validateArtistAndTitle ($ti, &$ar){
        
            $checkArtistIdQuery = mysqli_query($this->con, "SELECT id, artistName FROM artists WHERE artistName='$ar'");
            //$checkAlbumIdQuery = mysqli_query($this->con, "SELECT id, albumName FROM albums WHERE albumName='$al");
            //$checkTranscriptionIdQuery = mysqli_query($this->con, "SELECT id, lyrics FROM transcriptions WHERE lyrics='$tr");
			

			if(!$checkArtistIdQuery) { 
					//echo("Error description: $checkArtistIdQuery" . mysqli_error($this->con));
					//echo "500,000 the song";
					array_push($this->errorArray, Constants::$couldNotBeSubmitted);
					return;
					
			} else if(mysqli_num_rows($checkArtistIdQuery) != 0) {
					$artistIdRow = mysqli_fetch_assoc($checkArtistIdQuery);
					$artistIdCrossExamination = $artistIdRow['id'];
					// omitted
					
					$checkTitleArtistQuery = mysqli_query($this->con, "SELECT title, artist FROM songs WHERE title='$ti' AND artist='$artistIdCrossExamination'");

					if(!$checkTitleArtistQuery) {
						//echo("Error description: $checkTitleArtistQuery" . mysqli_error($this->con));
						//echo "550,000";
						array_push($this->errorArray, Constants::$couldNotBeSubmitted);
						return;
						
						
					} else if(mysqli_num_rows($checkTitleArtistQuery) != 0) {
						//echo "575,000";
						array_push($this->errorArray, Constants::$titleArtistDuplicate);
						return;
					}
					else {
						$ar = $artistIdRow['id'];
						return $ar;
					}
				} else {
						//echo "invalid username or password";
						mysqli_query($this->con, "INSERT INTO artists VALUES ('', '$ar')");
						
						$checkArtistNameQuery = mysqli_query($this->con, "SELECT id, artistName FROM artists WHERE artistName='$ar'");
						
						if(!$checkArtistNameQuery) {
						//	echo("Error description: $checkArtistIdQuery" . mysqli_error($this->con));
						//echo "600,001";	
						array_push($this->errorArray, Constants::$couldNotBeSubmitted);
						return;
							
						} else if(mysqli_num_rows($checkArtistNameQuery) != 0) {
							$newArtistIdRow = mysqli_fetch_assoc($checkArtistNameQuery);
							$ar = $newArtistIdRow['id'];
							
							return $ar; //$newArtistId;
						}
						
						else {
						//	array_push($this->errorArray, Constants::$couldNotBeSubmitted);
						echo "700,000";	
						array_push($this->errorArray, Constants::$couldNotBeSubmitted);
							
							return;
						}
					}
					return $ar;

			
			
			/*
			//if Querying $ar for artist matches in artists table is not null,...
			//assign id of artist found to variable;  
			if(mysqli_num_rows($checkArtistIdQuery) != 0) {
				$artistIdRow = mysqli_fetch_assoc($checkArtistIdQuery);
				$artistIdCrossExamination = $artistIdRow['id'];

				//Query any songs with a matching title to the one proposed ($ti)...
				//accompanied by found artist;
				$checkTitleArtistQuery = mysqli_query($this->con, "SELECT title, artist FROM songs WHERE title='$ti' AND artist='$artistIdCrossExamination'");
			
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
			 	$checkArtistNameQuery = mysqli_query($this->con, "SELECT id, artistName FROM artists WHERE artistName'$ar'");
				if(mysqli_num_rows($checkArtistNameQuery) != 0) {
					$newArtistIdRow = mysqli_fetch_assoc($checkArtistNameQuery);
					$ar = $newArtistIdRow['id'];
					
					return $ar; //$newArtistId;
				}
				
				else {
                    array_push($this->errorArray, Constants::$couldNotBeSubmitted);
                    return;
				}
					
				
			}

			return;

			*/

		}
		
		private function validateAlbum ($ti, $ar, &$al, $ge) {
			$checkAlbumIdQuery = mysqli_query($this->con, "SELECT id, title, artist FROM albums WHERE title='$al' AND artist='$ar'");
            //$checkAlbumIdQuery = mysqli_query($this->con, "SELECT id, albumName FROM albums WHERE albumName='$al");
            //$checkTranscriptionIdQuery = mysqli_query($this->con, "SELECT id, lyrics FROM transcriptions WHERE lyrics='$tr");
			

			if(!$checkAlbumIdQuery) { 
					//echo("Error description: $checkArtistIdQuery" . mysqli_error($this->con));
					//echo "500,000 al";
					array_push($this->errorArray, Constants::$couldNotBeSubmitted);
					
					return;
					
			} else if(mysqli_num_rows($checkAlbumIdQuery) != 0) {
					// assuming a match of proposed album title and proposed artist; extract the id of that match
					$albumIdRow = mysqli_fetch_assoc($checkAlbumIdQuery);
					$albumIdCrossExamination = $albumIdRow['id'];
					// omitted
					//use the id of that matching album to see if the proposed song pre exists with the matched album
					$checkTitleAlbumQuery = mysqli_query($this->con, "SELECT title, artist, album FROM songs WHERE artist='$ar' AND album='$albumIdCrossExamination'");

					if(!$checkTitleAlbumQuery) {
						//echo("Error description: $checkTitleArtistQuery" . mysqli_error($this->con));
						//echo "550,000 al";
						array_push($this->errorArray, Constants::$couldNotBeSubmitted);
						return;
						
						
					} else if(mysqli_num_rows($checkTitleAlbumQuery) != 0) {
						//this point assumes there is a matching album in db with proposed artist in which we extract array of data 
						$albumTitleAlbumRow = mysqli_fetch_assoc($checkTitleAlbumQuery);
						if ($albumTitleAlbumRow['title'] == $ti) {
							//echo "560,000 song from this artist already exists for proposed album";
							array_push($this->errorArray, Constants::$couldNotBeSubmitted);
							return;
						} else if ($albumTitleAlbumRow['title'] != $ti) {
							$al = $albumTitleAlbumRow['album'];
							return $al;
						}
						else{
							//echo Constants::$couldNotBeSubmitted;
							//echo "575,000 album already exists for proposed artist";
							array_push($this->errorArray, Constants::$couldNotBeSubmitted);
							$al = $albumIdRow['id'];
							return $al;
						} 
					} 	
				} else {
						//assuming no matching albums in db with proposed artist, create one
						mysqli_query($this->con, "INSERT INTO albums VALUES ('', '$al', '$ar', '$ge', 'assets/images/artwork/stockAlbumArtboard.png')");
						$checkAlbumNameQuery = mysqli_query($this->con, "SELECT id, title, artist FROM albums WHERE title='$al' AND artist='$ar'");
						
						if(!$checkAlbumNameQuery) {
						//	echo("Error description: $checkArtistIdQuery" . mysqli_error($this->con));
						//echo "600,000 al not being read by sql";	
						array_push($this->errorArray, Constants::$couldNotBeSubmitted);
						return;

						} else if(mysqli_num_rows($checkAlbumNameQuery) != 0) {
							$newAlbumIdRow = mysqli_fetch_assoc($checkAlbumNameQuery);
							
							$al = $newAlbumIdRow['id'];
							
							return $al; //$newArtistId;
						}
						
						else {
						//	array_push($this->errorArray, Constants::$couldNotBeSubmitted);
						//echo "700,000 al";	
						array_push($this->errorArray, Constants::$couldNotBeSubmitted);
							
							return;
						}
						return;
					}
					return $al;
		}

		private function validateTranscription(&$tr) {
			mysqli_query($this->con, "INSERT INTO transcriptions VALUES ('', '$tr')");

			$checkTranscriptionId = mysqli_query($this->con, "SELECT id FROM transcriptions WHERE lyrics='$tr'");
			if(!$checkTranscriptionId) {
				//	echo("Error description: $checkArtistIdQuery" . mysqli_error($this->con));
				//echo "600,002";	
				array_push($this->errorArray, Constants::$couldNotBeSubmitted);
				return;
					
				} else if(mysqli_num_rows($checkTranscriptionId) != 0) {
					$newTranscriptionIdRow = mysqli_fetch_assoc($checkTranscriptionId);
					$tr = $newTranscriptionIdRow['id'];
					
					return $tr; //$newArtistId;
				}
				
				else {
				//	array_push($this->errorArray, Constants::$couldNotBeSubmitted);
				//echo "700,000";	
				array_push($this->errorArray, Constants::$couldNotBeSubmitted);
					
					return;
				}
				return $tr;
		}

		private function validateFeaturedArtist(&$fe) {

			$checkFeaturedArtistsId = mysqli_query($this->con, "SELECT id FROM featuredArtists WHERE featuredArtistName='$fe'");
			
			if(!$checkFeaturedArtistsId) {
				//	echo("Error description: $checkArtistIdQuery" . mysqli_error($this->con));
				//echo "600,003";	
				//array_push($this->errorArray, Constants::$couldNotBeSubmitted);

				mysqli_query($this->con, "INSERT INTO featuredArtists VALUES ('', '$fe')");

				if(!$checkFeaturedArtistsId) {
					//	echo("Error description: $checkArtistIdQuery" . mysqli_error($this->con));
					//echo "600,004";	
					array_push($this->errorArray, Constants::$couldNotBeSubmitted);
					return;
						
					} else if(mysqli_num_rows($checkFeaturedArtistsId) != 0) {
						$newFeaturedArtistsIdRow = mysqli_fetch_assoc($checkFeaturedArtistsId);
						$fe = $newFeaturedArtistsIdRow['id'];
						
						return $fe; //$newArtistId;
					}

					return $fe;

				return;
					
				} else if(mysqli_num_rows($checkFeaturedArtistsId) != 0) {
					$newFeaturedArtistsIdRow = mysqli_fetch_assoc($checkFeaturedArtistsId);
					$fe = $newFeaturedArtistsIdRow['id'];
					
					return $fe; //$newArtistId;
				}
				
				else {
				//	array_push($this->errorArray, Constants::$couldNotBeSubmitted);
				//echo "700,000";	
				//array_push($this->errorArray, Constants::$couldNotBeSubmitted);
				mysqli_query($this->con, "INSERT INTO featuredArtists VALUES ('', '$fe')");

				if(!$checkFeaturedArtistsId) {
					//	echo("Error description: $checkArtistIdQuery" . mysqli_error($this->con));
					//echo "600,005";	
					array_push($this->errorArray, Constants::$couldNotBeSubmitted);
					return;
						
					} else if(mysqli_num_rows($checkFeaturedArtistsId) != 0) {
						$newFeaturedArtistsIdRow2 = mysqli_fetch_assoc($checkFeaturedArtistsId);
						$fe = $newFeaturedArtistsIdRow2['id'];
						
						return $fe; //$newArtistId;
					}

					return $fe;
				}

				return $fe;
		}

		private function validateProducer(&$pr) {

			$checkProducerId = mysqli_query($this->con, "SELECT id FROM producers WHERE producerName='$pr'");
			
			if(!$checkProducerId) {
				//	echo("Error description: $checkArtistIdQuery" . mysqli_error($this->con));
				//echo "600,000";	
				//array_push($this->errorArray, Constants::$couldNotBeSubmitted);

				mysqli_query($this->con, "INSERT INTO producers VALUES ('', '$pr')");

				if(!$checkProducerId) {
					//	echo("Error description: $checkArtistIdQuery" . mysqli_error($this->con));
					//echo "600,000";	
					//array_push($this->errorArray, Constants::$couldNotBeSubmitted);

					mysqli_query($this->con, "INSERT INTO producers VALUES ('', '$pr')");

				if(!$checkProducerId) {
					//	echo("Error description: $checkArtistIdQuery" . mysqli_error($this->con));
					//echo "600,006";	
					array_push($this->errorArray, Constants::$couldNotBeSubmitted);
					return;
						
					} else if(mysqli_num_rows($checkProducerId) != 0) {
						$newProdcuerIdRow = mysqli_fetch_assoc($checkProducerId);
						$pr = $newProdcuerIdRow['id'];
						
						return $pr; //$newArtistId;
					}

					return $pr;

					return;
						
					} else if(mysqli_num_rows($checkProducerId) != 0) {
						$newProdcuerIdRow = mysqli_fetch_assoc($checkProducerId);
						$pr = $newProdcuerIdRow['id'];
						
						return $pr; //$newArtistId;
					}

					return $pr;

				return;
					
				} else if(mysqli_num_rows($checkProducerId) != 0) {
					$newProdcuerIdRow = mysqli_fetch_assoc($checkProducerId);
					$pr = $newProdcuerIdRow['id'];
					
					return $pr; //$newArtistId;
				}
				
				else {
				//	array_push($this->errorArray, Constants::$couldNotBeSubmitted);
				//echo "700,000";	
				//array_push($this->errorArray, Constants::$couldNotBeSubmitted);
				mysqli_query($this->con, "INSERT INTO producers VALUES ('', '$pr')");

				if(!$checkProducerId) {
					//	echo("Error description: $checkArtistIdQuery" . mysqli_error($this->con));
					//echo "600,007";	
					array_push($this->errorArray, Constants::$couldNotBeSubmitted);
					return;
						
					} else if(mysqli_num_rows($checkProducerId) != 0) {
						$newProdcuerIdRow2 = mysqli_fetch_assoc($checkProducerId);
						$pr = $newProdcuerIdRow2['id'];
						
						return $pr; //$newArtistId;
					}

					return $pr;
				}

				return $pr;
		}

		private function validateWriter(&$wr) {

			$checkWriterId = mysqli_query($this->con, "SELECT id FROM writers WHERE writerName='$wr'");
			
			if(!$checkWriterId) {
				//	echo("Error description: $checkArtistIdQuery" . mysqli_error($this->con));
				//echo "600,000";	
				//array_push($this->errorArray, Constants::$couldNotBeSubmitted);

				mysqli_query($this->con, "INSERT INTO writers VALUES ('', '$wr')");

				if(!$checkWriterId) {
					//	echo("Error description: $checkArtistIdQuery" . mysqli_error($this->con));
					//echo "600,008";	
					array_push($this->errorArray, Constants::$couldNotBeSubmitted);
					return;
						
					} else if(mysqli_num_rows($checkWriterId) != 0) {
						$newWriterIdRow = mysqli_fetch_assoc($checkWriterId);
						$wr = $newWriterIdRow['id'];
						
						return $wr; //$newArtistId;
					}

					return $wr;

				return;
					
				} else if(mysqli_num_rows($checkWriterId) != 0) {
					$newWriterIdRow = mysqli_fetch_assoc($checkWriterId);
					$wr = $newWriterIdRow['id'];
					
					return $wr; //$newArtistId;
				}
				
				else {
				//	array_push($this->errorArray, Constants::$couldNotBeSubmitted);
				//echo "700,000";	
				//array_push($this->errorArray, Constants::$couldNotBeSubmitted);
				mysqli_query($this->con, "INSERT INTO writers VALUES ('', '$wr')");

				if(!$checkWriterId) {
					//	echo("Error description: $checkArtistIdQuery" . mysqli_error($this->con));
					//echo "600,009";	
					array_push($this->errorArray, Constants::$couldNotBeSubmitted);
					return;
						
					} else if(mysqli_num_rows($checkWriterId) != 0) {
						$newWriterIdRow2 = mysqli_fetch_assoc($checkWriterId);
						$wr = $newWriterIdRow2['id'];
						
						return $wr; //$newArtistId;
					}

					return $wr;
				}

				return $wr;
		}

		private function validateEngineer(&$en) {

			$checkEngineerId = mysqli_query($this->con, "SELECT id FROM engineers WHERE engineerName='$en'");
			
			if(!$checkEngineerId) {
				//	echo("Error description: $checkArtistIdQuery" . mysqli_error($this->con));
				//echo "600,010";	
				array_push($this->errorArray, Constants::$couldNotBeSubmitted);
				return;
					
				} else if(mysqli_num_rows($checkEngineerId) != 0) {
					$newEngineerIdRow = mysqli_fetch_assoc($checkEngineerId);
					$en = $newEngineerIdRow['id'];
					
					return $en; //$newArtistId;
				}
				
				else {
				//	array_push($this->errorArray, Constants::$couldNotBeSubmitted);
				//echo "700,000";	
				//array_push($this->errorArray, Constants::$couldNotBeSubmitted);
				mysqli_query($this->con, "INSERT INTO engineers VALUES ('', '$en')");

				if(!$checkEngineerId) {
					//	echo("Error description: $checkArtistIdQuery" . mysqli_error($this->con));
					//echo "600,011";	
					array_push($this->errorArray, Constants::$couldNotBeSubmitted);
					return;
						
					} else if(mysqli_num_rows($checkEngineerId) != 0) {
						$newEngineerIdRow2 = mysqli_fetch_assoc($checkEngineerId);
						$wr = $newEngineerIdRow2['id'];
						
						return $en; //$newArtistId;
					}

					return $en;
				}

				return $en;
		}

		/*
		private function validateEngineer(&$en) {

			$checkEngineerId = mysqli_query($this->con, "SELECT id FROM engineers WHERE engineerName='$en'");
			
			if(!$checkEngineerId) {
				//	echo("Error description: $checkArtistIdQuery" . mysqli_error($this->con));
				echo "600,000";	
				array_push($this->errorArray, Constants::$couldNotBeSubmitted);
				return;
					
				} else if(mysqli_num_rows($checkEngineerId) != 0) {
					$newEngineerIdRow = mysqli_fetch_assoc($checkEngineerId);
					$en = $newEngineerIdRow['id'];
					
					return $en; //$newArtistId;
				}
				
				else {
				//	array_push($this->errorArray, Constants::$couldNotBeSubmitted);
				//echo "700,000";	
				//array_push($this->errorArray, Constants::$couldNotBeSubmitted);
				mysqli_query($this->con, "INSERT INTO engineers VALUES ('', '$en')");

				if(!$checkEngineerId) {
					//	echo("Error description: $checkArtistIdQuery" . mysqli_error($this->con));
					echo "600,000";	
					array_push($this->errorArray, Constants::$couldNotBeSubmitted);
					return;
						
					} else if(mysqli_num_rows($checkEngineerId) != 0) {
						$newEngineerIdRow = mysqli_fetch_assoc($checkEngineerId);
						$wr = $newEngineerIdRow['id'];
						
						return $en; //$newArtistId;
					}

					return $en;
				}

				return $en;
		}
		*/
	}

?>