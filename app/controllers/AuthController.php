<?php
require_once BASE_PATH . '/app/models/User.php';

class AuthController {

    // Show login page
    public function index() {
        // If already logged in, go to dashboard
        if (isset($_SESSION['user_id'])) {
            header("Location: /musanze-market/public/index.php?page=dashboard");
            exit();
        }
        require_once BASE_PATH . '/app/views/auth/login.php';
    }

    // Handle login form submission
    public function login() {
        $username = trim($_POST['username'] ?? '');
        $password = trim($_POST['password'] ?? '');

        // Server-side validation
        if (empty($username) || empty($password)) {
            $_SESSION['error'] = "Please fill in all fields.";
            header("Location: /musanze-market/public/index.php?page=login");
            exit();
        }

        // Find user in DB
        $userModel = new User();
        $user = $userModel->findByUsername($username);

        // Check password
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id']  = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: /musanze-market/public/index.php?page=dashboard");
            exit();
        } else {
            $_SESSION['error'] = "Wrong username or password.";
            header("Location: /musanze-market/public/index.php?page=login");
            exit();
        }
    }

    // Logout
    public function logout() {
        session_destroy();
        header("Location: /musanze-market/public/index.php?page=login");
        exit();
    }
}