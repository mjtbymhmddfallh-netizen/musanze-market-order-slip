<?php
require_once BASE_PATH . '/app/models/Supplier.php';

class SupplierController {

    // List all suppliers
    public function index() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: /musanze-market/public/index.php?page=login");
            exit();
        }
        $supplierModel = new Supplier();
        $suppliers = $supplierModel->getAll();
        require_once BASE_PATH . '/app/views/suppliers/index.php';
    }

    // Show create form
    public function create() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: /musanze-market/public/index.php?page=login");
            exit();
        }
        require_once BASE_PATH . '/app/views/suppliers/create.php';
    }

    // Save new supplier
    public function store() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: /musanze-market/public/index.php?page=login");
            exit();
        }

        $name     = trim($_POST['name'] ?? '');
        $phone    = trim($_POST['phone'] ?? '');
        $location = trim($_POST['location'] ?? '');

        // Validation
        if (empty($name) || empty($phone) || empty($location)) {
            $_SESSION['error'] = "All fields are required.";
            header("Location: /musanze-market/public/index.php?page=suppliers&action=create");
            exit();
        }

        $supplierModel = new Supplier();
        if ($supplierModel->create($name, $phone, $location)) {
            $_SESSION['success'] = "Supplier added successfully.";
            header("Location: /musanze-market/public/index.php?page=suppliers");
        } else {
            $_SESSION['error'] = "Failed to add supplier. Phone may already exist.";
            header("Location: /musanze-market/public/index.php?page=suppliers&action=create");
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
        $supplierModel = new Supplier();
        $supplier = $supplierModel->getById($id);

        if (!$supplier) {
            $_SESSION['error'] = "Supplier not found.";
            header("Location: /musanze-market/public/index.php?page=suppliers");
            exit();
        }
        require_once BASE_PATH . '/app/views/suppliers/edit.php';
    }

    // Save updated supplier
    public function update() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: /musanze-market/public/index.php?page=login");
            exit();
        }

        $id       = intval($_POST['id'] ?? 0);
        $name     = trim($_POST['name'] ?? '');
        $phone    = trim($_POST['phone'] ?? '');
        $location = trim($_POST['location'] ?? '');

        if (empty($name) || empty($phone) || empty($location)) {
            $_SESSION['error'] = "All fields are required.";
            header("Location: /musanze-market/public/index.php?page=suppliers&action=edit&id=$id");
            exit();
        }

        $supplierModel = new Supplier();
        if ($supplierModel->update($id, $name, $phone, $location)) {
            $_SESSION['success'] = "Supplier updated successfully.";
            header("Location: /musanze-market/public/index.php?page=suppliers");
        } else {
            $_SESSION['error'] = "Failed to update supplier.";
            header("Location: /musanze-market/public/index.php?page=suppliers&action=edit&id=$id");
        }
        exit();
    }

    // Delete supplier
    public function delete() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: /musanze-market/public/index.php?page=login");
            exit();
        }
        $id = intval($_GET['id'] ?? 0);
        $supplierModel = new Supplier();
        $supplierModel->delete($id);
        $_SESSION['success'] = "Supplier deleted.";
        header("Location: /musanze-market/public/index.php?page=suppliers");
        exit();
    }
}