<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Musanze Market</title>
    <link rel="stylesheet" href="/musanze-market/assets/css/style.css">
</head>
<body class="login-page">

    <div class="login-box">

        <h1>🥔 Musanze Market</h1>
        <p class="login-subtitle">Order Slip System</p>

        <!-- Flash error message -->
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-error">
                <?= $_SESSION['error']; unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <!-- Login Form -->
        <form action="/musanze-market/public/index.php?page=login" method="POST">

            <div class="form-group">
                <label for="username">Username</label>
                <input
                    type="text"
                    id="username"
                    name="username"
                    placeholder="Enter username"
                    required
                >
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Enter password"
                    required
                >
            </div>

            <button type="submit" class="btn btn-primary btn-block">
                Login
            </button>

        </form>

    </div>

</body>
</html>