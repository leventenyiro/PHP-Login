<?php

class User {

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

    public function login() {
        $sql = sprintf('SELECT id, password, email FROM user WHERE username = "%s" OR email = "%s"', $_POST["usernameEmail"], $_POST["usernameEmail"]);
        $result = $this->conn->query($sql);
        $arr = array();
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $arr[] = $row;
        }
        
        return json_encode($arr);
    }
}