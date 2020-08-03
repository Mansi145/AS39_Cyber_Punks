# GEM SERVICES

This is the main interaction portal of GEM Services

# Getting Started

### Server Requirements
-   PHP >= 5.6.4
-   OpenSSL PHP Extension
-   PDO PHP Extension
-   Mbstring PHP Extension
-   Tokenizer PHP Extension
-   XML PHP Extension

### Installing

Clone this repo or download it on your local system.

Open composer and run this given command.

```shell
composer install
```

Rename the file `.env.example` to `.env`.

```shell
cp .env.example .env
```

Generate the Application key

```php
php artisan key:generate
```

Set DB credentials

Migrate the database.

```php
php artisan migrate
```

Seed the database

```php
php artisan db:seed
```

### Local Development Server

To run this project on localhost

```php
php artisan serve
```

This project will by default run on this server:

```
http://localhost:8000/
```

For more details
```php
php artisan serve --help
```

