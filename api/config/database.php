<?php
// used to get mysql database connection
class Database{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "restapi";
    public $conn = NULL;

	public function __construct(){
		$this->conn = new mysqli($this->host, $this->user, $this->password, $this->database);
		if ($this->conn->connect_error) {
			die ("Connection failed: " . $this->conn->connect_error);
		}
		$this->conn->query("SET NAMES 'UTF8';");
	}
}
?>