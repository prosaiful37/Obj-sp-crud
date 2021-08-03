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
		 * File upload management 
		 */
		public function fileUpload($file, $location = '', array $file_type = ['jpg','png','jpeg','gif'])
		{
			//file info
			$file_name = $file['name'];
			$file_tmp = $file['tmp_name'];
			$file_size = $file['size'];

			//get file extension 
			$file_array = explode('.', $file_name);
			$file_extension = strtolower(end($file_array));

			//Unique file_name
			$unique_file_name = md5(time(). rand()) .'.'.$file_extension;

			//fileUpload
			move_uploaded_file($file_tmp, $location . $unique_file_name);

			return $unique_file_name; 

		}






		/**
		 * data inset by table
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
	
	
	
	
	
	



