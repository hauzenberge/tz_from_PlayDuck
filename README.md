# Book Rating Web Application

A simple web application for book rating and review using Laravel, plain JavaScript, and Bootstrap.

## Features

- **Books List**: Displays a list of the 10 most recent books with options to search by title or author, refresh the list, and (optionally) sort by rating and title.
- **Book Details**: Shows detailed information about a book, including the average rating, and allows registered users to leave a rating and a comment. The page also includes a list of 5 related books that updates automatically.
- **Add a Book**: A form for registered users to add a new book to the collection with details like title, author, cover image, and publication date.

## Technology Stack

- **Backend**: Laravel 9.x
- **Frontend**: Plain JavaScript and Bootstrap
- **Database**: MySQL

## Installation

Follow these steps to set up the project on your local machine.

### 1. Clone the Repository

```bash
git clone git@github.com:hauzenberge/tz_from_PlayDuck.git
cd tz_from_PlayDuck
```

### 2. Install Dependencies

Make sure you have Composer and npm installed. Then run:

```bash
composer install
npm install
```

### 3. Set Up Environment File

Copy the example environment file and update the environment variables as needed:

```bash
cp .env.example .env
```

Edit the .env file to set up your database connection and other environment variables:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=book_rating_app
DB_USERNAME=root
DB_PASSWORD=
```


### 4. Generate Application Key
Generate a new application key:

```bash
php artisan key:generate
```


### 5. Run Migrations and Seeders
Run the database migrations and seed the database with initial data:

```bash
php artisan migrate --seed
```


### 6. Compile Assets
Compile the frontend assets:

```bash
npm run dev
```

### 7. Serve the Application
Start the Laravel development server:

```bash
php artisan serve
```

Visit http://localhost:8000 in your web browser to view the application.

### Usage and Testing

## Public Pages
- Books List: / - View the list of books, search by title or author, and refresh the list.
- Book Details: /book/{id} - View details of a specific book, leave a rating and comment if you are logged in.

## Authorized Users
- Add a Book: /books/create - A form for adding a new book to the collection (only available to logged-in users).
