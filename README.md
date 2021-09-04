# Laravel Canny

A minimal boilerplate for applications. It provides the following functionalities.

1. Registration / Login
2. Email verification of accounts
3. Forget / Reset Password
4. Get Logged in Users Details
5. Update users profile

The technologies used for this boilerplate are :

1. Laravel
2. MySql
3. Fortify
4. Sanctum
5. InertiaJs (For Admin Panel Only)

# How to use it ?

1. Clone package: `git clone https://github.com/pranabkalita/canny.git`
2. Install Laravel Dependencies: `composer install`
3. Copy `.env.example` to `.env`
4. Enter all the details in `.env` as per your project
5. Generate Key: `php artisan key:generate`
6. Migrate the database: `php artisan migrate`
7. Create super user: `php artisan canny:create superuser`
8. Run local server: `php artisan serve`
9. Optional (Create initial roles): `php artisan db:seed --class RoleSeeder`
