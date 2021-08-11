# Ticket Managment

A simple ticket managment system build with Laravel, Inertiajs and Vuejs


## Installation guide

Clone the repository

```sh
git clone https://github.com/pkaratzhs/ticket-managment-system.git tms
cd tms
```

Install PHP dependencies:

```sh
composer install
```

Install NPM dependencies:

```sh
npm install
```

Copy example enviroment file to a new .env file:

```sh
cp .env.example .env
```

Add application key:

```sh
php artisan key:generate
```

Create your database and change the .env variable accordingly

Run database migrations:

```sh
php artisan migrate
```

Seed the database:

```sh
php artisan db:seed
```

Create a storage sym link so you can access images from the public folder:

```sh
php artisan storage:link
```

Run the artisan serve command to spin up a dev server:

```sh
php artisan serve
```

Build up the frontend

```sh
npm run dev
```

You can login as an admin with:

- **Username:** admin@example.com
- **Password:** password

You can also login as a user with: 
- **Username:** user@example.com
- **Password:** password

Theres also an email sending feature but you have to setup mailhog or a similar service