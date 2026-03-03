<?php require_once BASE_PATH . '/app/views/partials/header.php'; ?>

<div class="page-header">
    <h2>📊 Dashboard</h2>
    <span>Welcome, <?= htmlspecialchars($_SESSION['username']) ?></span>
</div>

<!-- Today's Stats Cards -->
<div class="cards">
    <div class="card">
        <h3>Orders Today</h3>
        <div class="card-value">
            <?= $stats['total_orders'] ?>
        </div>
    </div>
    <div class="card">
        <h3>Total Value Today</h3>
        <div class="card-value">
            <?= number_format($stats['total_value'], 0) ?> RWF
        </div>
    </div>
</div>

<!-- Recent Orders Table -->
<div class="table-box">
    <h2>Recent Orders</h2>

    <?php if (empty($recent)): ?>
        <p style="padding:20px; color:#757575;">No orders yet. 
            <a href="/musanze-market/public/index.php?page=orders&action=create">Create one</a>
        </p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Supplier</th>
                    <th>Qty (kg)</th>
                    <th>Unit Price</th>
                    <th>Total</th>
                    <th>Pickup</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($recent as $order): ?>
                <tr>
                    <td><?= $order['id'] ?></td>
                    <td><?= htmlspecialchars($order['supplier_name']) ?></td>
                    <td><?= $order['quantity'] ?></td>
                    <td><?= number_format($order['unit_price'], 0) ?> RWF</td>
                    <td><?= number_format($order['total'], 0) ?> RWF</td>
                    <td><?= htmlspecialchars($order['pickup_location']) ?></td>
                    <td><?= date('d/m/Y', strtotime($order['created_at'])) ?></td>
                    <td>
                        <a href="/musanze-market/public/index.php?page=orders&action=receipt&id=<?= $order['id'] ?>"
                           class="btn btn-sm btn-primary">Receipt</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<?php require_once BASE_PATH . '/app/views/partials/footer.php'; ?>