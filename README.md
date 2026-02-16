💻 PHP Tech Support Project

Author: Komal Sharma
Date: February 6–15, 2026
Project Type: Web Application (PHP, MySQL)

🌟 Overview

This Tech Support Management System is built using PHP and MySQL.
It allows administrators to efficiently manage products, technicians, customers, and incidents.
The project follows MVC principles and uses a MySQL database for persistent storage.

🛠 Features
Admin Panel

Manage Products: Add, delete, view

Manage Technicians: Create, update, delete

Manage Customers: Search by last name, update info

Incident Management: Create, assign, and view incidents

Technician Panel

Update assigned incidents

Customer Panel

Register products (Project 6‑4)

View assigned incidents

Authentication & Authorization

Secure login/logout

Role-based access: admin, technician, customer

Session management for protected routes

📂 Project Structure
PHPAssignment4/
├── account/                     # User-specific landing pages
├── auth/                        # Login, signup, logout, authentication checks
├── assets/                      # CSS, JS, images, demo video, screen recordings
├── db/                          # Database connection & SQL files
├── models/                      # Database interaction logic
│   ├── customer_db.php
│   └── technician_db.php
├── views/
│   ├── admin/                   # Admin dashboard & management pages
│   ├── technicians/             # Technician pages
│   ├── customers/               # Customer registration pages
│   ├── incidents/               # Incident pages
│   └── header.php / footer.php
├── index.php                     # Landing page (redirects to role-based dashboard)
└── README.md                     # Project documentation

📌 Projects Included
Project	Description	Notes
6‑4: Register Product	Allows a customer to log in and register a product.	Confirmation message includes the product code. Dropdown shows all products.
6‑5: Create Incident	Admin can select a customer and create a new incident.	Dropdown shows only products registered by that customer. Confirmation message after creation.
⚙️ Installation & Setup

Clone the repository:

git clone https://github.com/komalsharma251/PHPAssignment4.git
cd PHPAssignment4


Set up XAMPP (or any PHP/MySQL stack):

Place the project in your htdocs directory

Start Apache and MySQL

Database Setup:

Import db/tech_support-6.sql into MySQL

Update db/database.php with your credentials:

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


Access the application:

Open your browser at:

http://localhost/WEBSITES/PHPAssignment4/auth/login.php

🔑 Admin Credentials (Default for Demo)

Create via signup and assign role admin, or manually insert:

INSERT INTO users (email, password_hash, role, first_name, last_name)
VALUES ('admin@example.com', '$2y$10$yourhashedpassword', 'admin', 'Admin', 'User');

🎬 Demo Video / Screen Recording

Included in:

assets/phpassignment4_execution_recording.mov

📝 Dependencies

PHP 8.x or higher

MySQL 5.x or higher

Optional: XAMPP / MAMP / LAMP stack

Bootstrap 5 for responsive UI

📜 License

MIT License © Komal Sharma
