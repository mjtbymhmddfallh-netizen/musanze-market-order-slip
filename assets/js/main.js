// =========================================
// Live Total Calculator
// =========================================
function calcTotal() {
    var qty   = parseFloat(document.getElementById('quantity')?.value) || 0;
    var price = parseFloat(document.getElementById('unit_price')?.value) || 0;
    var total = qty * price;

    var display = document.getElementById('total_display');
    if (display) {
        display.textContent = total.toLocaleString() + ' RWF';
    }
}

// Attach calculator to quantity and unit_price fields
document.addEventListener('DOMContentLoaded', function () {

    var qtyInput   = document.getElementById('quantity');
    var priceInput = document.getElementById('unit_price');

    if (qtyInput)   qtyInput.addEventListener('input', calcTotal);
    if (priceInput) priceInput.addEventListener('input', calcTotal);

    // Run once on load (for edit page)
    calcTotal();

    // =========================================
    // Mobile Nav Toggle
    // =========================================
    var toggle = document.getElementById('navToggle');
    var links  = document.getElementById('navLinks');

    if (toggle && links) {
        toggle.addEventListener('click', function () {
            links.classList.toggle('open');
        });
    }

    // =========================================
    // Client-side form validation
    // =========================================
    var forms = document.querySelectorAll('form');
    forms.forEach(function (form) {
        form.addEventListener('submit', function (e) {

            var qty   = form.querySelector('#quantity');
            var price = form.querySelector('#unit_price');

            if (qty && parseFloat(qty.value) <= 0) {
                alert('Quantity must be greater than 0.');
                e.preventDefault();
                return;
            }

            if (price && parseFloat(price.value) <= 0) {
                alert('Unit price must be greater than 0.');
                e.preventDefault();
                return;
            }
        });
    });

});