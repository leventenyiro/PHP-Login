<?php

class User {

	private $conn;
	private $table_name = "user";

    public $id;
    public $username;
	public $email;
	public $password;

	// constructor
	public function __construct($db){
		$this->conn = $db;
    }
    
    /*private function generateNewHashedId($table) {
        $hashedId = bin2hex(openssl_random_pseudo_bytes(10));
        $sql = "SELECT COUNT(*) AS count FROM %s WHERE id = '%s'", $table, $hashedId);
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $this->generateNewHashedId($table)
        } else {
            return $hashedId;
        }
    }

    // create new user record
function create(){
    public function registration() {
        $sql = sprintf(`INSERT INTO user (id, username, email, password, email_verified, image) VALUES (
            "%s",
            "${req.body.username}",
            "${req.body.email}",
            "${password}",
            "0",
            "profile.png")
            ON DUPLICATE KEY UPDATE username = "${req.body.username}", email = "${req.body.email}"`, $this->generateNewHashedId($this->table_name), $_POST["username"], $_POST["email"], )
    }
}*/

}