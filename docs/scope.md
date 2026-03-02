# Scope

## In Scope (what we will build)
- Admin login / logout (single user account, seeded in DB)
- Supplier management: add, view, edit, delete
- Order management: add, view, edit, delete
- Auto-calculated total (JS preview + server verification)
- Receipt page (printable)
- Dashboard: orders today, value today, recent orders table
- Server-side validation on all forms
- Flash messages (success / error)
- Responsive layout (mobile + desktop)
- MySQL storage with prepared statements (no raw SQL)
- MVC folder structure
- Deployment on InfinityFree

## Out of Scope (what we will NOT build)
- Multiple admin accounts / user registration
- Role-based access control beyond basic login
- PDF export (only browser print)
- SMS or email notifications
- Advanced search or date filtering
- Payment integration

## Non-Functional Requirements
| NFR               | Requirement                                      |
|-------------------|--------------------------------------------------|
| Security          | Prepared statements, session protection, no XSS  |
| Usability         | Works on mobile screen (min 320px wide)          |
| Performance       | Page loads under 3 seconds on normal connection  |
| Maintainability   | MVC separation, commented code                   |
| Compatibility     | Works on InfinityFree (PHP 7.4+, MySQLi)         |