# ERP system

This project is a web-based application built using the Laravel framework. The application is designed to manage two main modules: Purchasing and Warehouse. The system has two types of access roles: Manager and Staff.

## Requirements:

-   Laravel `11.x`
-   Spatie role permission package `^6.4`

## Project Setup

Git clone -

```console
git clone https://github.com/rchvingt/erp-project.git
```

Access project folder

```console
cd erp-project
```

Install Laravel Dependencies

```console
composer install
```

Create MySQL database called - `erp-project`

Create `.env` file by copying `.env.example` file

Generate Artisan Key (If needed)

```console
php artisan key:generate
```

Migrate Database with seeder

```console
php artisan migrate --seed
```

Run Project

```php
php artisan serve
```

If you have any problem to seeder, Please import the .sql file directly -
Then the project running on your available address, http://localhost:8000

## How It Works

1. **Login using Super Admin credentials**:
    - Username: `superadmin`
    - Password: `12345678`
2. **Create a Role** and assign permissions to the Role.
3. **Create an Admin** and assign multiple Roles to the Admin.
4. **Test the setup** by logging in with the newly created credentials.
5. If you do not have sufficient permissions to perform any task, a warning message will appear.

## Project Status

-   The **Role and Permission** module has been completed.
-   The **Master Material and Supplier** features have been completed.
-   The **Purchasing Module** is still in progress.
-   The **Warehouse Module** has not been started.

## ERD

The initial design of the project was based on the following ERP diagram: [Initial ERP Diagram](https://dbdiagram.io/d/ERP_V1-66db9dc9eef7e08f0ef5d4ec).

However, there have been changes, and the updated design can be found here: [Updated ERP Diagram](https://dbdiagram.io/d/ERP_V1_rev-66e299276dde7f4149dec162).
