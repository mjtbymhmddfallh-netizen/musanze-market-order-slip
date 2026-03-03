<?php
class Order {

    private $conn;

    public function __construct() {
        $this->conn = getDB();
    }

    // Get all orders with supplier name
    public function getAll() {
        $result = $this->conn->query(
            "SELECT orders.*, suppliers.name AS supplier_name
             FROM orders
             JOIN suppliers ON orders.supplier_id = suppliers.id
             ORDER BY orders.created_at DESC"
        );
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Get one order by id
    public function getById($id) {
        $stmt = $this->conn->prepare(
            "SELECT orders.*, suppliers.name AS supplier_name
             FROM orders
             JOIN suppliers ON orders.supplier_id = suppliers.id
             WHERE orders.id = ?"
        );
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Get today's stats for dashboard
    public function getTodayStats() {
        $stmt = $this->conn->prepare(
            "SELECT COUNT(*) AS total_orders, 
                    COALESCE(SUM(total), 0) AS total_value
             FROM orders
             WHERE DATE(created_at) = CURDATE()"
        );
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Get recent 5 orders
    public function getRecent() {
        $result = $this->conn->query(
            "SELECT orders.*, suppliers.name AS supplier_name
             FROM orders
             JOIN suppliers ON orders.supplier_id = suppliers.id
             ORDER BY orders.created_at DESC
             LIMIT 5"
        );
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Create new order
    public function create($supplier_id, $quantity, $unit_price, $pickup_location, $notes) {
        // Server recalculates total — never trust JS
        $total = $quantity * $unit_price;
        $stmt = $this->conn->prepare(
            "INSERT INTO orders (supplier_id, quantity, unit_price, total, pickup_location, notes)
             VALUES (?, ?, ?, ?, ?, ?)"
        );
        $stmt->bind_param("idddss", $supplier_id, $quantity, $unit_price, $total, $pickup_location, $notes);
        return $stmt->execute();
    }

    // Update order
    public function update($id, $supplier_id, $quantity, $unit_price, $pickup_location, $notes) {
        $total = $quantity * $unit_price;
        $stmt = $this->conn->prepare(
            "UPDATE orders SET supplier_id=?, quantity=?, unit_price=?, total=?, pickup_location=?, notes=?
             WHERE id=?"
        );
        $stmt->bind_param("idddssi", $supplier_id, $quantity, $unit_price, $total, $pickup_location, $notes, $id);
        return $stmt->execute();
    }

    // Delete order
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM orders WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}