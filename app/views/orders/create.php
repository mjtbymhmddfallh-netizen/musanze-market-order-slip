<?php require_once BASE_PATH . '/app/views/partials/header.php'; ?>

<div class="form-box">
    <h2>Create New Order</h2>

    <form action="/musanze-market/public/index.php?page=orders&action=store" method="POST">

        <div class="form-group">
            <label for="supplier_id">Supplier</label>
            <select id="supplier_id" name="supplier_id" required>
                <option value="">-- Select Supplier --</option>
                <?php foreach ($suppliers as $s): ?>
                    <option value="<?= $s['id'] ?>">
                        <?= htmlspecialchars($s['name']) ?> — <?= htmlspecialchars($s['location']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="quantity">Quantity (kg)</label>
            <input type="number" id="quantity" name="quantity"
                   placeholder="e.g. 100" min="1" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="unit_price">Unit Price (RWF/kg)</label>
            <input type="number" id="unit_price" name="unit_price"
                   placeholder="e.g. 150" min="1" step="0.01" required>
        </div>

        <!-- Live total calculated by JS -->
        <div class="form-group">
            <label>Estimated Total</label>
            <div id="total_display" style="font-size:24px; font-weight:bold; color:#2e7d32;">
                0 RWF
            </div>
        </div>

        <div class="form-group">
            <label for="pickup_location">Pickup Location</label>
            <input type="text" id="pickup_location" name="pickup_location"
                   placeholder="e.g. Musanze Main Market" required>
        </div>

        <div class="form-group">
            <label for="notes">Notes (optional)</label>
            <textarea id="notes" name="notes" rows="3"
                      placeholder="Any extra info..."></textarea>
        </div>

        <button type="submit" class="btn btn-primary btn-block">
            Save Order
        </button>

        <a href="/musanze-market/public/index.php?page=orders"
           style="display:block; text-align:center; margin-top:12px;">Cancel</a>
    </form>
</div>

<?php require_once BASE_PATH . '/app/views/partials/footer.php'; ?>