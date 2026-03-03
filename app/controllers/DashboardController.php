<?php
require_once BASE_PATH . '/app/models/Order.php';

class DashboardController {

    public function index() {
        // Protect this page
        if (!isset($_SESSION['user_id'])) {
            header("Location: /musanze-market/public/index.php?page=login");
            exit();
        }

        // Get stats from model
        $orderModel = new Order();
        $stats      = $orderModel->getTodayStats();
        $recent     = $orderModel->getRecent();

        // Load view
        require_once BASE_PATH . '/app/views/dashboard/index.php';
    }
}