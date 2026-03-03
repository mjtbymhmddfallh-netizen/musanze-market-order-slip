<?php
class User {

    private $conn;

    public function __construct() {
        $this->conn = getDB();
    }

    // Find user by username
    public function findByUsername($username) {
        $stmt = $this->conn->prepare(
            "SELECT id, username, password FROM users WHERE username = ?"
        );
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}