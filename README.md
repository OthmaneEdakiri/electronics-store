# 🖥️ Electronics Store

Electronics Store is a modern e-commerce web application developed to allow users to browse, purchase, and manage electronic products online in a simple, fast, and secure way.

The platform provides an intuitive shopping experience where customers can explore products, view detailed information, add items to their cart, and place orders efficiently.

An admin dashboard is also included to manage products, categories, orders, and users.

---

# 🚀 Features

## 👤 Customer Features

- User Authentication (Register / Login)
- Browse Products
- Product Details Page
- Search Products
- Shopping Cart
- Place Orders
- Order History
- Responsive Design

---

## 🛠️ Admin Features

- Dashboard
- Product Management (CRUD)
- Category Management
- Order Management
- User Management
- Stock Management

---

# 🧰 Technologies Used

## Backend
- Laravel

## Frontend
- Blade
- TailwindCSS

## Database
- MySQL

## Authentication
- Laravel Breeze

---

# 🏗️ Architecture

The project follows the MVC (Model-View-Controller) architecture:

- Models → Handle database logic
- Views → User interface using Blade
- Controllers → Business logic and request handling

---

# 🗄️ Database Structure

Main tables used in the project:

- users
- products
- categories
- cart_items
- orders
- order_items

---

# 🛒 Cart System

The cart system allows users to:

- Add products to cart
- Update quantities
- Remove items
- Calculate total price

---

# 🔐 Security

- Password Hashing
- CSRF Protection
- Form Validation
- Authentication Middleware

# ⚙️ Installation & Local Setup

Follow these steps to run the project on your local machine:

## 📥 1. Clone the repository
```bash
git clone https://github.com/OthmaneEdakiri/electronics-store.git
cd electronics-store
```

## 📦 2. Install dependencies
#### Backend (Laravel)
```bash
composer install
```
#### Frontend assets
```
npm install
npm run dev
```

## ⚙️ 3. Environment setup
```bash
cp .env.example .env
```

Then configure your database in ```.env```:
```env
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

## 🗄️ 5. Run migrations
```bash
php artisan migrate
```

## 🌱 6. Seed the database (Admin account)

Run the seeder to create default data including the admin user:
```bash
php artisan db:seed
```
### 👨‍💼 Admin Credentials
```
Email: admin@example.com
Password: 12345678
```

## 🚀 7. Start the development server
```bash
php artisan serve
```

Open in your browser:
```
http://127.0.0.1:8000
```
