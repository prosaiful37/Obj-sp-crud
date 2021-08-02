<?php 

	namespace App\support;
	use mysqli;


	/**
	 * Database connection
	 */
	abstract class Database
	{

		/**
		 * server related property
		 */
		private $host = "localhost";
		private $user = "root";
		private $pass = "";
		private $db = "obj_crud";


		private $connection;

		/**
		 * Database connection setup
		 */
		private function connection()
		{
			return $this -> connection = new mysqli($this -> host, $this -> user, $this -> pass, $this -> db);
		}

		/**
		 * data inset
		 */

		protected function insert($table, array $data)
		{

			// echo "<pre>";
			// print_r($data);
			// echo "</pre>";

			//Make 	SQL coloum form data
			$array_keys = array_keys($data);
			$array_col = implode(',', $array_keys);

			//Make SQL values form data
			$array_val = array_values($data);

			foreach ($array_val as $value) {
				$form_value[] = "'".$value."'";
			}

			$array_values = implode(',', $form_value);



			//Data sent to table
			$sql = "INSERT INTO $table ($array_col) VALUES ($array_values)";
			$query = $this -> connection() -> query($sql);

			if ($query) {
				return true;
			}
		}
	}
	
	
	
	
	
	



