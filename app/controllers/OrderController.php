<?php
require_once BASE_PATH . '/app/models/Order.php';
require_once BASE_PATH . '/app/models/Supplier.php';

class OrderController {

    // List all orders
    public function index() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: /musanze-market/public/index.php?page=login");
            exit();
        }
        $orderModel = new Order();
        $orders = $orderModel->getAll();
        require_once BASE_PATH . '/app/views/orders/index.php';
    }

    // Show create form
    public function create() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: /musanze-market/public/index.php?page=login");
            exit();
        }
        $supplierModel = new Supplier();
        $suppliers = $supplierModel->getAll();
        require_once BASE_PATH . '/app/views/orders/create.php';
    }

    // Save new order
    public function store() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: /musanze-market/public/index.php?page=login");
            exit();
        }

        $supplier_id     = intval($_POST['supplier_id'] ?? 0);
        $quantity        = floatval($_POST['quantity'] ?? 0);
        $unit_price      = floatval($_POST['unit_price'] ?? 0);
        $pickup_location = trim($_POST['pickup_location'] ?? '');
        $notes           = trim($_POST['notes'] ?? '');

        // Validation
        if ($supplier_id <= 0 || $quantity <= 0 || $unit_price <= 0 || empty($pickup_location)) {
            $_SESSION['error'] = "All fields are required and must be valid numbers.";
            header("Location: /musanze-market/public/index.php?page=orders&action=create");
            exit();
        }

        $orderModel = new Order();
        if ($orderModel->create($supplier_id, $quantity, $unit_price, $pickup_location, $notes)) {
            $_SESSION['success'] = "Order created successfully.";
            header("Location: /musanze-market/public/index.php?page=orders");
        } else {
            $_SESSION['error'] = "Failed to create order.";
            header("Location: /musanze-market/public/index.php?page=orders&action=create");
        }
        exit();
    }

    // Show edit form
    public function edit() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: /musanze-market/public/index.php?page=login");
            exit();
        }
        $id = intval($_GET['id'] ?? 0);
        $orderModel    = new Order();
        $supplierModel = new Supplier();
        $order     = $orderModel->getById($id);
        $suppliers = $supplierModel->getAll();

        if (!$order) {
            $_SESSION['error'] = "Order not found.";
            header("Location: /musanze-market/public/index.php?page=orders");
            exit();
        }
        require_once BASE_PATH . '/app/views/orders/edit.php';
    }

    // Save updated order
    public function update() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: /musanze-market/public/index.php?page=login");
            exit();
        }

        $id              = intval($_POST['id'] ?? 0);
        $supplier_id     = intval($_POST['supplier_id'] ?? 0);
        $quantity        = floatval($_POST['quantity'] ?? 0);
        $unit_price      = floatval($_POST['unit_price'] ?? 0);
        $pickup_location = trim($_POST['pickup_location'] ?? '');
        $notes           = trim($_POST['notes'] ?? '');

        if ($supplier_id <= 0 || $quantity <= 0 || $unit_price <= 0 || empty($pickup_location)) {
            $_SESSION['error'] = "All fields are required and must be valid numbers.";
            header("Location: /musanze-market/public/index.php?page=orders&action=edit&id=$id");
            exit();
        }

        $orderModel = new Order();
        if ($orderModel->update($id, $supplier_id, $quantity, $unit_price, $pickup_location, $notes)) {
            $_SESSION['success'] = "Order updated successfully.";
            header("Location: /musanze-market/public/index.php?page=orders");
        } else {
            $_SESSION['error'] = "Failed to update order.";
            header("Location: /musanze-market/public/index.php?page=orders&action=edit&id=$id");
        }
        exit();
    }

    // Delete order
    public function delete() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: /musanze-market/public/index.php?page=login");
            exit();
        }
        $id = intval($_GET['id'] ?? 0);
        $orderModel = new Order();
        $orderModel->delete($id);
        $_SESSION['success'] = "Order deleted.";
        header("Location: /musanze-market/public/index.php?page=orders");
        exit();
    }

    // Show receipt
    public function receipt() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: /musanze-market/public/index.php?page=login");
            exit();
        }
        $id = intval($_GET['id'] ?? 0);
        $orderModel = new Order();
        $order = $orderModel->getById($id);

        if (!$order) {
            $_SESSION['error'] = "Order not found.";
            header("Location: /musanze-market/public/index.php?page=orders");
            exit();
        }
        require_once BASE_PATH . '/app/views/orders/receipt.php';
    }
}