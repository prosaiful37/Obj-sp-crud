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
		public function addNewStudent($name, $email, $cell, $img)
		{

			//Data send
			$data = $this -> insert('students', [

				'name'	=> $name,
				'email'	=> $email,
				'cell'	=> $cell,
				'photo'	=> $this -> fileUpload($img, 'media/img/student/'),

			]);


			//Data send msg
			if ($data) {
				return "<p class='alert alert-success'> Data stable ! <button class='close' data-dismiss='alert'>&times;</button></p>";
			}
		}




		/**
		 * get all data show
		 */

		public function AllStudent()
		{
			$data = $this -> all('students', 'DESC');

			if ($data) {
				return $data;
			}
		}


		/**
		 * Delete single student
		 */
		public function deleteStudent($id)
		{
			$data = $this -> delete('students', $id);

			if ($data) {
				return "<p class='alert alert-success'> Data Delete Successful ! <button class='close' data-dismiss='alert'>&times;</button></p>";
			}

		}

 		/**
 		 * single student show
 		 */

 		public function singleStudent($id)
 		{
 			$data = $this -> find('students' , $id);
 			return $data -> fetch_assoc();
 		}
 
 
 

		
	}
	
	
	
	
	
	



