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
		protected function fileUpload($file, $location = '', array $file_type = ['jpg','png','jpeg','gif'])
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


		/**
		 * get all data
		 */
		protected function all($table, $order_by)
		{
			//Data get
			$sql = "SELECT * FROM $table ORDER BY id $order_by ";
			$data = $this -> connection() -> query($sql);

			if ($data) {
				return $data;
			}
		}


		/**
		 * Delete studnet
		 */
		protected function delete($table, $id)
		{
			$sql = "DELETE FROM students WHERE id='$id'";
			$data = $this -> connection() -> query($sql);

			if ($data) {
				return true;
			}
		}


		/**
		 * sigle student data show
		 */

		protected function find($table, $id)
		{
			$sql = "SELECT * FROM students WHERE id='$id'";
			$data = $this -> connection() -> query($sql);

			if ($data) {
				return $data;
			}
		}












	}
	
	
	
	
	
	



