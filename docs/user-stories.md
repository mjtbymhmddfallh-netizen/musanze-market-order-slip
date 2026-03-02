# User Stories

## US-01 — Login
As an aggregator,
I want to log in with my username and password,
So that only I can access the order system.

Acceptance criteria:
- Login form with username + password
- Wrong credentials show an error message
- Successful login redirects to dashboard
- Logged-out users cannot access protected pages

---

## US-02 — Register a Supplier
As an aggregator,
I want to add a new supplier with their name and phone number,
So that I can link orders to the correct farmer.

Acceptance criteria:
- Form with name, phone, location fields
- Duplicate phone number shows an error
- Saved supplier appears in the supplier list

---

## US-03 — Create an Order
As an aggregator,
I want to create an order by selecting a supplier, entering quantity and unit price,
So that the system calculates the total automatically.

Acceptance criteria:
- Dropdown of registered suppliers
- Quantity and unit price fields (numbers only)
- Total is shown live via JavaScript
- Server recalculates and stores the correct total
- Pickup location is required

---

## US-04 — View and Print a Receipt
As an aggregator,
I want to open a receipt page for any order,
So that I can print it and give it to the supplier.

Acceptance criteria:
- Receipt shows supplier name, quantity, price, total, date, pickup location
- Page has a Print button that opens the browser print dialog
- Receipt is clean (no nav bar when printed)

---

## US-05 — View Dashboard
As an aggregator,
I want to see today's total orders and total value on a dashboard,
So that I know my daily activity at a glance.

Acceptance criteria:
- Dashboard shows: number of orders today, total value today
- Shows a table of the 5 most recent orders
- Visible immediately after login

---

## US-06 — Edit or Delete an Order
As an aggregator,
I want to correct a wrong order or remove a duplicate,
So that my records stay accurate.

Acceptance criteria:
- Edit button opens a pre-filled form
- Changes are saved and total is recalculated by the server
- Delete asks for confirmation before removing the record