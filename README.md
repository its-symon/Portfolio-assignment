# Laravel Portfolio Project

This is a Laravel-based portfolio project that uses PostgreSQL as its database.

---

## Requirements

Make sure the following are installed on your system:

- PHP >= 8.1
- Composer
- PostgreSQL

---

## Setup Instructions

### 1. Clone the repository

```bash
git clone https://github.com/its-symon/Portfolio-assignment.git
cd Portfolio-assignment
```

## 2. Install PHP dependencies
```
composer install
```

## 3. Create .env file(For this project, I am also uploading the .env file so that it becomes easier to run the app.)
```
cp .env.example .env
```

#### Update the following variables in .env to match the postgreSQL configuration:
```
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=laravel
DB_USERNAME=laraveluser
DB_PASSWORD=secret

SESSION_DRIVER=database
```
## 4. Generate application key
```
php artisan key:generate
```

## 5. Create PostgreSQL database
Login to psql and run:
```
CREATE DATABASE laravel;
CREATE USER laraveluser WITH PASSWORD 'secret';
GRANT ALL PRIVILEGES ON DATABASE laravel TO laraveluser;
```

## 6. Run the migrations
```
php artisan migrate
```

## 7. Serve the App
```
php artisan serve
```

## Demo

🎥 [Click here to view the demo](https://drive.google.com/file/d/1tTDizfw_BdES4JRtr__hDpQW60P-E8bK/view?usp=sharing)


## Author

👤 **Symon**

- Github: [@its-symon](https://github.com/its-symon)
