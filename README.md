Git Repository URL
https://github.com/sejalsebastian/excel_data_import.git


Setup Instructions
    Prerequisites
        Composer version 2.6.6 (2023-12-08)
        XAMPP Control Panel V3.3.0
        PHP 8.1

Database Configuration
    Option 1: Create Database and Migrate the Tables
        Run the following command to migrate and seed the database: "php artisan migrate"
    Option 2: Import SQL File
        Import the excel_data_import SQL file.

Running the Project
    php artisan serve

Application URLs
    Root URL: Access the application at http://127.0.0.1:8000/.
    Product URL: Access the product page at http://127.0.0.1:8000/product.

Product Management
    Products can be created by importing a CSV file or by manually adding a single product. Additionally, products can be edited, deleted, and have their status changed.