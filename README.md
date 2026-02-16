# 💻 PHP Tech Support Project

**Author:** Komal Sharma  
**Date:** February 6–15, 2026  
**Project Type:** Web Application (PHP, MySQL)

---

## 🌟 Overview

This **Tech Support Management System** is built using **PHP and MySQL**.  
It allows administrators to manage **products, technicians, customers, and incidents** efficiently.  
Follows **MVC architecture** and uses a **MySQL database**.

---

## 🛠 Features

### **Admin Panel**
- **Manage Products:** Add, delete, view  
- **Manage Technicians:** Create, update, delete  
- **Manage Customers:** Search by last name, update info  
- **Incident Management:** Create, assign, view incidents  

### **Technician Panel**
- Update assigned incidents  

### **Customer Panel**
- Register products (**Project 6‑4**)  
- View assigned incidents  

### **Authentication & Authorization**
- Secure login/logout  
- Role-based access: admin, technician, customer  
- Session management for protected routes  

---

## 📂 Project Structure

PHPAssignment4/
├── account/ # User-specific landing pages
├── auth/ # Login, signup, logout
├── assets/ # CSS, JS, images, demo videos
├── db/ # Database & SQL files
├── models/ # Database logic
├── views/ # All views
└── index.php # Landing page


---

## 📌 Projects Included

### **Project 6‑4: Register Product**
- Customer logs in and selects a product.  
- Registers the product with a confirmation message showing the product code.  
- Dropdown shows **all products**.

### **Project 6‑5: Create Incident**
- Admin selects a customer and creates an incident.  
- Product dropdown shows **only registered products for that customer**.  
- Confirmation message appears after successful creation.

---

## ⚙️ Installation & Setup

1. **Clone repo:**
```bash
git clone https://github.com/komalsharma251/PHPAssignment4.git
cd PHPAssignment4
Setup XAMPP/MAMP/LAMP:

Place project in htdocs

Start Apache & MySQL

Database Setup:

Import db/tech_support-6.sql

Update db/database.php:

$host = 'localhost';
$dbname = 'tech_support';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
$pdo = new PDO($dsn, $user, $pass, [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);
Set Base URL:

define('BASE_URL', 'http://localhost/WEBSITES/PHPAssignment4');
Access app:

http://localhost/WEBSITES/PHPAssignment4/auth/login.php
🔑 Admin Credentials
INSERT INTO users (email, password_hash, role, first_name, last_name)
VALUES ('admin@example.com', '$2y$10$yourhashedpassword', 'admin', 'Admin', 'User');
🎬 Demo Video
Included: assets/phpassignment4_execution_recording.mov

📝 Dependencies
PHP 8.x+

MySQL 5.x+

Optional: XAMPP/MAMP/LAMP

Bootstrap 5

📜 License
MIT License © Komal Sharma
