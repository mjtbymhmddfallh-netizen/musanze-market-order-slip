<?php require_once BASE_PATH . '/app/views/partials/header.php'; ?>

<div class="form-box">
    <h2>Edit Supplier</h2>

    <form action="/musanze-market/public/index.php?page=suppliers&action=update" method="POST">

        <input type="hidden" name="id" value="<?= $supplier['id'] ?>">

        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" 
                   value="<?= htmlspecialchars($supplier['name']) ?>" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" id="phone" name="phone" 
                   value="<?= htmlspecialchars($supplier['phone']) ?>" required>
        </div>

        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" id="location" name="location" 
                   value="<?= htmlspecialchars($supplier['location']) ?>" required>
        </div>

        <button type="submit" class="btn btn-primary btn-block">
            Update Supplier
        </button>

        <a href="/musanze-market/public/index.php?page=suppliers" 
           style="display:block; text-align:center; margin-top:12px;">Cancel</a>
    </form>
</div>

<?php require_once BASE_PATH . '/app/views/partials/footer.php'; ?>