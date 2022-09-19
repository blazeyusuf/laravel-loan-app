<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Loan Demo Application Setup

1. CD into the application root directory with your command prompt/terminal/git bash.

2. Run `cp .env.example .env`.

3. Inside `.env` file, setup database, `port number`, mail and other configurations.

4. Run `composer install`.

5. Run `php artisan key:generate` command.

6. Run `php artisan migrate:fresh --seed` command.

7. Run `php artisan serve` command.

8. Define your routes in `web.php`.

9. To run a single migration `php artisan migrate --path=/database/migrations/my_migration.php`.

10. To run single seeder `php artisan db:seed --class=UserSeeder`.
    
11. To run test first, comment out your current database configuration in the env file and add `DB_CONNECTION=sqlite`.

12. Run tests with `php artisan test`.

```
    PASS  Tests\Unit\ExampleTest
  ✓ that true is true

   PASS  Tests\Feature\LoanTest
  ✓ loan amount is required
  ✓ loan duration is required
  ✓ loan type is required
  ✓ only an authenticated user can request for a loan
  ✓ an authenticated user can request for a loan
  ✓ loan id exists
  ✓ only an authenticated user can update a loan request
  ✓ can delete loan record

  Tests:  9 passed
  Time:   0.97s
```

## Login credentials

### Administrator Dashboard

Email: `admin@admin.com`
Password: `password123`

### Client Dashboard

Email: `demo@gmail.com`
Password: `password123`
