
# Laravel Product digital Management System

## Description

This is a Laravel-based product management system that allows users to manage products, catalogues, and orders. The application includes features for adding, editing, deleting, and viewing products and orders through an admin panel.

## Features

- User authentication
- Admin dashboard for managing products and orders
- CRUD operations for products and catalogues
- Order management
- Simple and intuitive user interface

## Requirements

- PHP >= 7.3
- Composer
- Laravel >= 8.x
- MySQL or any supported database

## Installation

Follow these steps to set up your local development environment:

1. **Clone the repository:**
   ```bash
   git clone https://github.com/nouredinekn/digital-store.git
   cd digital-store
   ```

2. **Install dependencies:**
   ```bash
   composer install
   ```

3. **Create a new `.env` file:**
   ```bash
   cp .env.example .env
   ```

4. **Generate an application key:**
   ```bash
   php artisan key:generate
   ```

5. **Configure your database settings:**
   Update the `.env` file with your database credentials:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_user
   DB_PASSWORD=your_database_password
   ```

6. **Run migrations:**
   ```bash
   php artisan migrate
   ```

7. **Start the development server:**
   ```bash
   php artisan serve
   ```
   You can now access the application at `http://localhost:8000`.

## Usage

- Navigate to the application in your web browser.
- Register or log in to access the admin panel.
- Use the admin dashboard to manage products, catalogues, and orders.

## API Endpoints

| Method | Endpoint                     | Description                               |
|--------|------------------------------|-------------------------------------------|
| GET    | `/home`                      | User's home page                         |
| GET    | `/admin`                     | Admin dashboard                          |
| POST   | `/admin_panel`               | Handle admin operations                  |
| POST   | `/addcatalogue`              | Add a new product catalogue              |
| POST   | `/addproduct`                | Add a new product                        |
| GET    | `/getcatalogue`              | Retrieve all catalogues                  |
| GET    | `/orders`                    | View all orders                          |
| DELETE | `/delete/{id}`               | Delete a product catalogue               |

## Contributing

Contributions are welcome! If you have suggestions for improvements, feel free to create an issue or submit a pull request.

1. Fork the repository
2. Create a new branch (`git checkout -b feature/YourFeature`)
3. Commit your changes (`git commit -m 'Add some feature'`)
4. Push to the branch (`git push origin feature/YourFeature`)
5. Open a pull request


## Acknowledgements

- [Laravel](https://laravel.com) - The PHP framework used
- [Bootstrap](https://getbootstrap.com) - For UI components

