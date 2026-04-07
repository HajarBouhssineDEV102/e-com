# Elevation - Premium E-Commerce Application

Elevation is a full-featured, production-ready premium eCommerce web application built precisely with a modern technological stack and an emphasis on clean architecture, beautiful UI, and robust systems.

## 🚀 Tech Stack

*   **Backend:** Laravel 12 (PHP)
*   **Frontend:** Blade Templates, Tailwind CSS (Vite compiled)
*   **Database:** MySQL
*   **Authentication:** Laravel Breeze
*   **Typography:** Google Fonts (Inter & Playfair Display)

---

## ✨ Features

### 🛒 Storefront (Frontend)
*   **Sleek Modern UI:** Vibrant design, subtle micro-animations, glassmorphism, and smooth scrolling capabilities.
*   **Product Discovery:** Shop by categories, browse new collections, or use the dynamic search filter functionality.
*   **Interactive Shopping Cart:** Automatically handles stock validation. Users can securely add, update quantities, or remove products.
*   **Checkout & Order Placement:** Capture shipping details dynamically and place pending orders that deduct from store inventory natively.
*   **Customer Profiles:** Dedicated dashboard for shoppers to view their entire Order history and account details.

### 🔐 Admin Control Panel
*   **Secure Access Tracking:** Custom `is_admin` backend middleware guards all analytical routes. 
*   **Dashboard Analytics:** Clean overview of total store sales, active users, orders, and products.
*   **Category Management:** Full CRUD mechanisms for sorting and managing product arrays.
*   **Product Management:** Add new dynamic products, assign stock thresholds, and upload image files correctly synced via storage links.
*   **Order Fulfillment:** Check individual transaction details, customer addresses, and toggle statuses (Pending -> Paid -> Shipped -> Delivered).
*   **User Management:** Demote or promote standard website users to Admin roles safely.

---

## 🛠️ System Architecture (MVC)
This project carefully respects the standard Model-View-Controller framework patterns:
1. **Migrations & Models**: Fully relational models (`Category`, `Product`, `Order`, `OrderItem`, `Cart`, `CartItem`) synced meticulously with database keys (`cascade` deletion triggers).
2. **Controllers**: Advanced modular separation featuring individual components handling distinct business logic (`CartController`, `OrderController`, `AdminProductController`, etc).
3. **Views**: Extensive responsive layouts built purely with Tailwind CSS, utilizing partial extensions (`layouts.store`, `layouts.admin`).

---

## ⚙️ Installation & Local Setup

If you are cloning this repository for the first time, follow the steps below:

### 1. Prerequisites 
- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL Server

### 2. Initialization
Clone the repository, then navigate to your environment and install the underlying dependencies:
```bash
composer install
npm install
```

### 3. Environment Variables
Copy `.env.example` to establish your base variables:
```bash
cp .env.example .env
```
Ensure your `DB` credentials match your local MySQL setup (often using `root` and a blank/default password).
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ecommerce
DB_USERNAME=root
DB_PASSWORD=root
```

### 4. Application Keys & Storage
Generate your unique encrypter key and create the public storage link to allow image uploads:
```bash
php artisan key:generate
php artisan storage:link
```

### 5. Migrations & Seeding
Spin up the data tables and fill the application out-of-the-box with dummy items.
```bash
php artisan migrate:fresh --seed
```

### 6. Run the Servers
Lastly, boot up both the backend PHP server and the frontend Vite compiler concurrently:
```bash
php artisan serve
```
In a secondary terminal:
```bash
npm run dev
```

---

## 🧪 Default Test Credentials
The `DatabaseSeeder` inserts full store templates alongside specific users to immediately test the framework:

**Administrator Account:**
*   **Email:** `admin@example.com`
*   **Password:** `password`

**Standard Customer Account:**
*   **Email:** `customer@example.com`
*   **Password:** `password`

---

*Crafted with passion. © Elevation Store.*
