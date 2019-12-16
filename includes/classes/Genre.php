<?php
	class Genre {

		private $con;
		private $id;
		private $name;

		public function __construct($con, $id) {
			$this->con = $con;
			$this->id = $id;

			$query1 = mysqli_query($this->con, "CREATE OR REPLACE VIEW genre1 AS SELECT * FROM genres WHERE id='$this->id'");
			$query = mysqli_query($this->con, "SELECT * FROM genre1");
			$genre = mysqli_fetch_array($query);

			$this->name = $genre['name'];
		
			


		}
		public function getId() {
			return $this->id;
		}

		public function getName() {
			return $this->name;
		}

		
		public function getArtworkPath() {
			return $this->artworkPath;
		}

		public function getSongId() {

			$query = mysqli_query($this->con, "SELECT id FROM songs WHERE genre='$this->id'");

			$array = array();

			while($row = mysqli_fetch_array($query)) {
				array_push($array, $row['id']);
			}

			return $array;
		}
	}

?>