## installation

This project is build with laraval 9 which requires php 8.0+ to work.
To install and run this project, run the following commands:

```bash
composer install
cp .env.example .env
```

Create a database and fill in the required fields in the `.env` file. Afther doing that run de following commands to
fill the database and create a test admin user:

```bash
php artisan migrate --seed
```

This command will create the database and fill it with the admin user which has `admin@test.nl` as email
and `EverywhereIMisAwesome!` as password.

run the test server:
```bash
php artisan serve
```

log in to the admin dasboard by going to [127.0.0.1:8000/admin](127.0.0.1:8000/admin)
