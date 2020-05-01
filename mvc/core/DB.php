<?php
/**
 * 
 */
class DB 
{
	public $conn;
	protected $servername = "localhost";
	protected $username = "root";
	protected $password = "";
	protected $dbname = "bookshop";
	function __construct()
	{
	
	// Create connection
	$this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

	
	// Check connection
	if ($this->conn->connect_error) {
		die("Connection failed: " . $this->conn->connect_error);
	}
	}
}
?>