<?php
session_start();

// Base path
define('BASE_PATH', dirname(__DIR__));

// Autoload controllers and models
require_once BASE_PATH . '/config/database.php';
require_once BASE_PATH . '/app/controllers/AuthController.php';
require_once BASE_PATH . '/app/controllers/DashboardController.php';
require_once BASE_PATH . '/app/controllers/SupplierController.php';
require_once BASE_PATH . '/app/controllers/OrderController.php';

// Get the route from URL
// Example: ?page=dashboard or ?page=suppliers&action=create
$page   = isset($_GET['page'])   ? $_GET['page']   : 'login';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Simple router
switch ($page) {

   case 'login':
    $controller = new AuthController();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $controller->login();
    } else {
        $controller->index();
    }
    break;
    
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;

    case 'dashboard':
        $controller = new DashboardController();
        $controller->index();
        break;

    case 'suppliers':
        $controller = new SupplierController();
        switch ($action) {
            case 'create': $controller->create(); break;
            case 'store':  $controller->store();  break;
            case 'edit':   $controller->edit();   break;
            case 'update': $controller->update(); break;
            case 'delete': $controller->delete(); break;
            default:       $controller->index();  break;
        }
        break;

    case 'orders':
        $controller = new OrderController();
        switch ($action) {
            case 'create':  $controller->create();  break;
            case 'store':   $controller->store();   break;
            case 'edit':    $controller->edit();    break;
            case 'update':  $controller->update();  break;
            case 'delete':  $controller->delete();  break;
            case 'receipt': $controller->receipt(); break;
            default:        $controller->index();   break;
        }
        break;

    default:
        // Page not found
        http_response_code(404);
        echo "<h1>404 - Page Not Found</h1>";
        break;
}