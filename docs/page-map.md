# Page Map / Navigation Flow
```
[Public]
  └── /login  ←─────────────────────────────────────┐
                                                     │ (session expired / logout)
[Protected — requires login]                         │
  ├── /dashboard        (home after login)           │
  ├── /suppliers        (list all suppliers)         │
  │     ├── /suppliers/create   (add new)            │
  │     ├── /suppliers/edit?id= (edit)               │
  │     └── /suppliers/delete?id= (post action)      │
  ├── /orders           (list all orders)            │
  │     ├── /orders/create      (add new order)      │
  │     ├── /orders/edit?id=    (edit order)         │
  │     ├── /orders/delete?id=  (post action)        │
  │     └── /orders/receipt?id= (printable receipt)  │
  └── /logout ──────────────────────────────────────┘
```
```

---

## 📁 Suggested Folder for This Phase
```
docs/
├── problem-statement.md
├── stakeholders.md
├── user-stories.md
├── scope.md
└── page-map.md
```

---

## 📝 Commit Message Suggestions
```
git add docs/
git commit -m "Phase 1: Add planning docs (problem statement, stakeholders, user stories, scope, page map)"