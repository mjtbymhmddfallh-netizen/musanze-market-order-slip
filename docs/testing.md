# Testing Documentation

## Test Cases

| # | Feature | Test Case | Expected Result | Status |
|---|---------|-----------|-----------------|--------|
| 1 | Login | Enter correct username and password | Redirects to dashboard | ✅ Pass |
| 2 | Login | Enter wrong password | Shows error message | ✅ Pass |
| 3 | Login | Leave fields empty and submit | Shows error message | ✅ Pass |
| 4 | Suppliers | Add new supplier with all fields | Supplier appears in list | ✅ Pass |
| 5 | Suppliers | Add supplier with duplicate phone | Shows error message | ✅ Pass |
| 6 | Suppliers | Edit existing supplier | Updated info saved correctly | ✅ Pass |
| 7 | Suppliers | Delete a supplier | Supplier removed from list | ✅ Pass |
| 8 | Orders | Create order with qty=100, price=150 | Total shows 15,000 RWF | ✅ Pass |
| 9 | Orders | JS live calculator | Total updates while typing | ✅ Pass |
| 10 | Orders | Submit order with empty pickup location | Shows error message | ✅ Pass |
| 11 | Orders | Edit existing order | Updated values saved correctly | ✅ Pass |
| 12 | Orders | Delete an order | Order removed from list | ✅ Pass |
| 13 | Receipt | Open receipt for any order | Shows correct order details | ✅ Pass |
| 14 | Receipt | Click Print button | Browser print dialog opens | ✅ Pass |
| 15 | Dashboard | After creating orders | Today's count and value updated | ✅ Pass |
| 16 | Security | Access dashboard without login | Redirects to login page | ✅ Pass |
| 17 | Responsive | Open on mobile screen | Layout adjusts correctly | ✅ Pass |
| 18 | Navigation | Click hamburger menu on mobile | Nav links show/hide | ✅ Pass |