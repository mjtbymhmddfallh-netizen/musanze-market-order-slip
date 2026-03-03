<?php require_once BASE_PATH . '/app/views/partials/header.php'; ?>

<div class="form-box">
    <h2>Add New Supplier</h2>

    <form action="/musanze-market/public/index.php?page=suppliers&action=store" method="POST">

        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" 
                   placeholder="e.g. Jean Baptiste" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" id="phone" name="phone" 
                   placeholder="e.g. 0788123456" required>
        </div>

        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" id="location" name="location" 
                   placeholder="e.g. Musanze, Cyuve" required>
        </div>

        <button type="submit" class="btn btn-primary btn-block">
            Save Supplier
        </button>

        <a href="/musanze-market/public/index.php?page=suppliers" 
           style="display:block; text-align:center; margin-top:12px;">Cancel</a>
    </form>
</div>

<?php require_once BASE_PATH . '/app/views/partials/footer.php'; ?>