<?php require_once BASE_PATH . '/app/views/partials/header.php'; ?>

<div class="page-header">
    <h2>👨‍🌾 Suppliers</h2>
    <a href="/musanze-market/public/index.php?page=suppliers&action=create" 
       class="btn btn-primary">+ Add Supplier</a>
</div>

<div class="table-box">
    <?php if (empty($suppliers)): ?>
        <p style="padding:20px; color:#757575;">No suppliers yet.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Location</th>
                    <th>Date Added</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($suppliers as $s): ?>
                <tr>
                    <td><?= $s['id'] ?></td>
                    <td><?= htmlspecialchars($s['name']) ?></td>
                    <td><?= htmlspecialchars($s['phone']) ?></td>
                    <td><?= htmlspecialchars($s['location']) ?></td>
                    <td><?= date('d/m/Y', strtotime($s['created_at'])) ?></td>
                    <td>
                        <a href="/musanze-market/public/index.php?page=suppliers&action=edit&id=<?= $s['id'] ?>"
                           class="btn btn-sm btn-warning">Edit</a>
                        <a href="/musanze-market/public/index.php?page=suppliers&action=delete&id=<?= $s['id'] ?>"
                           class="btn btn-sm btn-danger"
                           onclick="return confirm('Delete this supplier?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<?php require_once BASE_PATH . '/app/views/partials/footer.php'; ?>