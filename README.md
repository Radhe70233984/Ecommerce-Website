# Ecommerce Website in Laravel

A fully functional ecommerce website built with Laravel 12, featuring product management, shopping cart, order processing, and more.

## Features

- **Product Management**: Create, read, update, and delete products
- **Category Management**: Organize products into categories
- **Shopping Cart**: Add products to cart, update quantities, and remove items
- **Order Processing**: Complete checkout with shipping address and payment method selection
- **Order History**: View past orders and their details
- **User Authentication**: Secure login and registration (requires Laravel Breeze setup)
- **Responsive Design**: Bootstrap 5 for mobile-friendly interface
- **Image Upload**: Support for product images
- **Stock Management**: Track product inventory

## Requirements

- PHP 8.1 or higher
- Composer
- SQLite/MySQL/PostgreSQL
- Node.js & NPM (for frontend assets)

## Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/Radhe70233984/Ecommerce-Website.git
   cd Ecommerce-Website
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node dependencies**
   ```bash
   npm install
   ```

4. **Configure environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configure database**
   
   Edit `.env` file and set your database credentials. For SQLite (default):
   ```
   DB_CONNECTION=sqlite
   ```
   
   For MySQL:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=ecommerce
   DB_USERNAME=root
   DB_PASSWORD=
   ```

6. **Run migrations**
   ```bash
   php artisan migrate
   ```

7. **Seed the database (optional)**
   ```bash
   php artisan db:seed
   ```
   This creates sample categories, products, and a test user:
   - Email: test@example.com
   - Password: password

8. **Create storage link**
   ```bash
   php artisan storage:link
   ```

9. **Build frontend assets**
   ```bash
   npm run build
   ```

10. **Start the development server**
    ```bash
    php artisan serve
    ```
    
    Visit `http://localhost:8000` in your browser.

## Usage

### For Users
- Browse products on the home page
- View product details
- Add products to cart (requires authentication)
- Proceed to checkout
- View order history

### For Administrators
- Manage products at `/products`
- Manage categories at `/categories`
- Create new products and categories
- Upload product images
- Update stock levels

## Authentication Setup

This project requires Laravel Breeze for full authentication functionality. To install:

```bash
composer require laravel/breeze --dev
php artisan breeze:install blade
npm install && npm run build
php artisan migrate
```

**Note:** Without installing Breeze, authentication features (login/register) will not be available. However, you can still browse products and categories. Cart and order features require authentication to function properly.

## Database Schema

### Categories
- id, name, description, slug, timestamps

### Products
- id, category_id, name, slug, description, price, stock, image, is_active, timestamps

### Carts
- id, user_id, product_id, quantity, timestamps

### Orders
- id, user_id, total_amount, status, payment_method, shipping_address, timestamps

### Order Items
- id, order_id, product_id, quantity, price, timestamps

## Technologies Used

- **Backend**: Laravel 12
- **Frontend**: Bootstrap 5, Bootstrap Icons
- **Database**: SQLite (default), MySQL, PostgreSQL
- **Image Storage**: Laravel Storage

## Project Structure

```
├── app
│   ├── Http/Controllers
│   │   ├── CartController.php
│   │   ├── CategoryController.php
│   │   ├── HomeController.php
│   │   ├── OrderController.php
│   │   └── ProductController.php
│   └── Models
│       ├── Cart.php
│       ├── Category.php
│       ├── Order.php
│       ├── OrderItem.php
│       └── Product.php
├── database
│   ├── migrations
│   └── seeders
├── resources
│   └── views
│       ├── cart
│       ├── categories
│       ├── layouts
│       ├── orders
│       └── products
└── routes
    └── web.php
```

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

This project is open-source and available under the [MIT License](LICENSE).

## Support

For issues and questions, please open an issue on GitHub.
