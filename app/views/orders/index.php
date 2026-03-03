<?php require_once BASE_PATH . '/app/views/partials/header.php'; ?>

<div class="page-header">
    <h2>📦 Orders</h2>
    <a href="/musanze-market/public/index.php?page=orders&action=create"
       class="btn btn-primary">+ New Order</a>
</div>

<div class="table-box">
    <?php if (empty($orders)): ?>
        <p style="padding:20px; color:#757575;">No orders yet.</p>
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
                <?php foreach ($orders as $o): ?>
                <tr>
                    <td><?= $o['id'] ?></td>
                    <td><?= htmlspecialchars($o['supplier_name']) ?></td>
                    <td><?= $o['quantity'] ?></td>
                    <td><?= number_format($o['unit_price'], 0) ?> RWF</td>
                    <td><?= number_format($o['total'], 0) ?> RWF</td>
                    <td><?= htmlspecialchars($o['pickup_location']) ?></td>
                    <td><?= date('d/m/Y', strtotime($o['created_at'])) ?></td>
                    <td>
                        <a href="/musanze-market/public/index.php?page=orders&action=receipt&id=<?= $o['id'] ?>"
                           class="btn btn-sm btn-primary">Receipt</a>
                        <a href="/musanze-market/public/index.php?page=orders&action=edit&id=<?= $o['id'] ?>"
                           class="btn btn-sm btn-warning">Edit</a>
                        <a href="/musanze-market/public/index.php?page=orders&action=delete&id=<?= $o['id'] ?>"
                           class="btn btn-sm btn-danger"
                           onclick="return confirm('Delete this order?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<?php require_once BASE_PATH . '/app/views/partials/footer.php'; ?>