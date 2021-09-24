<?php 
	
	class report{
		private $report_id;
        private $names;
        private $date;
        private $place;
        private $barangay;
        private $description;
        private $type;
        private $time;
        private $status;
        private $lat;
		private $lng;
		private $conn;
		private $tableName = "reports";

		function setReport_id($report_id) { $this->report_id = $report_id; }
		function getReport_id() { return $this->report_id; }

        function setNames($names) { $this->names = $names; }
		function getNames() { return $this->names; }

		function setDate($date) { $this->date = $date; }
		function getDate() { return $this->date; }

        function setPlace($place) { $this->place = $place; }
		function getPlace() { return $this->place; }

        function setBarangay($barangay) { $this->barangay = $barangay; }
		function geBarangay() { return $this->barangay; }

        function setDescription($description) { $this->description = $description; }
		function getDescription() { return $this->description; }

		function setType($type) { $this->type = $type; }
		function getType() { return $this->type; }

		function setTime($time) { $this->time = $time; }
		function getTime() { return $this->time; }

        function setStatus($status) { $this->status = $status; }
		function getStatus() { return $this->status; }

		function setLat($lat) { $this->lat = $lat; }
		function getLat() { return $this->lat; }

		function setLng($lng) { $this->lng = $lng; }
		function getLng() { return $this->lng; }

		public function __construct() {
			require_once('DbConnect.php');
			$conn = new DbConnect;
			$this->conn = $conn->connect();
		}

		public function getAllReport() {
			$sql = "SELECT * FROM $this->tableName";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}

	}

?>