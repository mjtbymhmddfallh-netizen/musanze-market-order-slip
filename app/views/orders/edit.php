<?php require_once BASE_PATH . '/app/views/partials/header.php'; ?>

<div class="form-box">
    <h2>Edit Order #<?= $order['id'] ?></h2>

    <form action="/musanze-market/public/index.php?page=orders&action=update" method="POST">

        <input type="hidden" name="id" value="<?= $order['id'] ?>">

        <div class="form-group">
            <label for="supplier_id">Supplier</label>
            <select id="supplier_id" name="supplier_id" required>
                <?php foreach ($suppliers as $s): ?>
                    <option value="<?= $s['id'] ?>"
                        <?= $s['id'] == $order['supplier_id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($s['name']) ?> — <?= htmlspecialchars($s['location']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="quantity">Quantity (kg)</label>
            <input type="number" id="quantity" name="quantity"
                   value="<?= $order['quantity'] ?>" min="1" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="unit_price">Unit Price (RWF/kg)</label>
            <input type="number" id="unit_price" name="unit_price"
                   value="<?= $order['unit_price'] ?>" min="1" step="0.01" required>
        </div>

        <!-- Live total -->
        <div class="form-group">
            <label>Estimated Total</label>
            <div id="total_display" style="font-size:24px; font-weight:bold; color:#2e7d32;">
                <?= number_format($order['total'], 0) ?> RWF
            </div>
        </div>

        <div class="form-group">
            <label for="pickup_location">Pickup Location</label>
            <input type="text" id="pickup_location" name="pickup_location"
                   value="<?= htmlspecialchars($order['pickup_location']) ?>" required>
        </div>

        <div class="form-group">
            <label for="notes">Notes (optional)</label>
            <textarea id="notes" name="notes" rows="3"><?= htmlspecialchars($order['notes']) ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary btn-block">
            Update Order
        </button>

        <a href="/musanze-market/public/index.php?page=orders"
           style="display:block; text-align:center; margin-top:12px;">Cancel</a>
    </form>
</div>

<?php require_once BASE_PATH . '/app/views/partials/footer.php'; ?>