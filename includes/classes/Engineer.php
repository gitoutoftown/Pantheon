<?php
	class Engineer {

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
			$engineerQuery = mysqli_query($this->con, "SELECT engineerName FROM engineers WHERE id='$this->id'");
			$engineer = mysqli_fetch_array($engineerQuery);
			return $engineer['engineerName'];
		}
		
		public function getSongIds() {

			$query = mysqli_query($this->con, "SELECT id FROM songs WHERE engineer='$this->id' ORDER BY plays ASC");

			$array = array();

			while($row = mysqli_fetch_array($query)) {
				array_push($array, $row['id']);
			}

			return $array;

		}
	}
?>