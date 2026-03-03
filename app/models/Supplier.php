<?php
class Supplier {

    private $conn;

    public function __construct() {
        $this->conn = getDB();
    }

    // Get all suppliers
    public function getAll() {
        $result = $this->conn->query("SELECT * FROM suppliers ORDER BY created_at DESC");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Get one supplier by id
    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM suppliers WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Create new supplier
    public function create($name, $phone, $location) {
        $stmt = $this->conn->prepare(
            "INSERT INTO suppliers (name, phone, location) VALUES (?, ?, ?)"
        );
        $stmt->bind_param("sss", $name, $phone, $location);
        return $stmt->execute();
    }

    // Update supplier
    public function update($id, $name, $phone, $location) {
        $stmt = $this->conn->prepare(
            "UPDATE suppliers SET name=?, phone=?, location=? WHERE id=?"
        );
        $stmt->bind_param("sssi", $name, $phone, $location, $id);
        return $stmt->execute();
    }

    // Delete supplier
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM suppliers WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}