<?php
	class FeaturedArtist {

		private $con;
		private $id;

		public function __construct($con, $id) {
			$this->con = $con;
			$this->id = $id;
		}

		public function getId() {
			return $this->id;
		}

		public function getName() {
			$featuredArtistQuery = mysqli_query($this->con, "SELECT featuredArtistName FROM featuredArtists WHERE id='$this->id'");
			$featuredArtist = mysqli_fetch_array($featuredArtistQuery);
			return $featuredArtist['featuredArtistName'];
		}
		
		public function getSongIds() {

			$query = mysqli_query($this->con, "SELECT id FROM songs WHERE featuredArtist='$this->id' ORDER BY plays ASC");

			$array = array();

			while($row = mysqli_fetch_array($query)) {
				array_push($array, $row['id']);
			}

			return $array;

		}
	}
?>