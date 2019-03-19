<?php
	class Transcription {

		private $con;
		private $id;

		public function __construct($con, $id) {
			$this->con = $con;
			$this->id = $id;
		}

		public function getId() {
			return $this->id;
		}

		public function getLyrics() {
			$transcriptionQuery = mysqli_query($this->con, "SELECT lyrics FROM transcriptions WHERE id='$this->id'");
			$transcription = mysqli_fetch_array($transcriptionQuery);
			return $transcription['lyrics'];
		}
		
		public function getSongIds() {

			$query = mysqli_query($this->con, "SELECT id FROM songs WHERE transcription='$this->id' ORDER BY plays ASC");

			$array = array();

			while($row = mysqli_fetch_array($query)) {
				array_push($array, $row['id']);
			}

			return $array;

		}
	}
?>