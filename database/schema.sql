-- =============================================
-- Musanze Market Order Slip - Database Schema
-- =============================================

CREATE DATABASE IF NOT EXISTS musanze_market;
USE musanze_market;

-- ---------------------------------------------
-- Table: users (admin login)
-- ---------------------------------------------
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Default admin account
-- Username: admin | Password: admin123
INSERT INTO users (username, password) VALUES (
    'admin',
    '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
);

-- ---------------------------------------------
-- Table: suppliers (farmers)
-- ---------------------------------------------
CREATE TABLE IF NOT EXISTS suppliers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL UNIQUE,
    location VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ---------------------------------------------
-- Table: orders
-- ---------------------------------------------
CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    supplier_id INT NOT NULL,
    quantity DECIMAL(10,2) NOT NULL,
    unit_price DECIMAL(10,2) NOT NULL,
    total DECIMAL(10,2) NOT NULL,
    pickup_location VARCHAR(100) NOT NULL,
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (supplier_id) REFERENCES suppliers(id) ON DELETE CASCADE
);
```

احفظ الملف بـ `Ctrl + S`

---

## الآن أنشئ قاعدة البيانات في XAMPP

**الخطوة 1** — افتح المتصفح واذهب إلى:
```
http://localhost/phpmyadmin
```

**الخطوة 2** — اضغط على **Import** من القائمة العلوية

**الخطوة 3** — اضغط **Choose File** واختر:
```
C:\xampp\htdocs\musanze-market\database\schema.sql
```

**الخطوة 4** — اضغط **Import** في الأسفل

---

## تحقق من النتيجة ✅

يجب أن ترى في الجانب الأيسر:
```
musanze_market
├── users       ✅
├── suppliers   ✅
└── orders      ✅