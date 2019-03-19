<?php
	class Producer {

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
			$producerQuery = mysqli_query($this->con, "SELECT producerName FROM producers WHERE id='$this->id'");
			$producer = mysqli_fetch_array($producerQuery);
			return $producer['producerName'];
		}
		
		public function getSongIds() {

			$query = mysqli_query($this->con, "SELECT id FROM songs WHERE producer='$this->id' ORDER BY plays ASC");

			$array = array();

			while($row = mysqli_fetch_array($query)) {
				array_push($array, $row['id']);
			}

			return $array;

		}
	}
?>