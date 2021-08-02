<?php 

	namespace App\Controller;
	use App\support\Database;

	/**
	 * Database connection
	 */
	class Student extends Database
	{


		/**
		* add new student
		*/
		public function addNewStudent($name, $email, $cell )
		{
			$data = $this -> insert('students', [

				'name'	=> $name,
				'email'	=> $email,
				'cell'	=> $cell

			]);

			if ($data) {
				return $mess = "<p class='alert alert-success'> Data stable ! <button class='close' data-dismiss='alert'>&times;</button></p>";
			}
		}
		
	}
	
	
	
	
	
	



