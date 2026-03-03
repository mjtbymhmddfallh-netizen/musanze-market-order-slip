<?php
// Protect all pages that include this header
if (!isset($_SESSION['user_id'])) {
    header("Location: /musanze-market/public/index.php?page=login");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Musanze Market</title>
    <link rel="stylesheet" href="/musanze-market/assets/css/style.css">
</head>
<body>

<nav class="navbar">
    <div class="nav-brand">🥔 Musanze Market</div>

    <!-- Hamburger for mobile -->
    <button class="nav-toggle" id="navToggle">☰</button>

    <ul class="nav-links" id="navLinks">
        <li><a href="/musanze-market/public/index.php?page=dashboard">Dashboard</a></li>
        <li><a href="/musanze-market/public/index.php?page=suppliers">Suppliers</a></li>
        <li><a href="/musanze-market/public/index.php?page=orders">Orders</a></li>
        <li><a href="/musanze-market/public/index.php?page=logout">Logout</a></li>
    </ul>
</nav>

<!-- Flash messages -->
<?php if (isset($_SESSION['success'])): ?>
    <div class="alert alert-success">
        <?= $_SESSION['success']; unset($_SESSION['success']); ?>
    </div>
<?php endif; ?>

<?php if (isset($_SESSION['error'])): ?>
    <div class="alert alert-error">
        <?= $_SESSION['error']; unset($_SESSION['error']); ?>
    </div>
<?php endif; ?>

<div class="container">