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
	}
	
	
	
	
	
	



