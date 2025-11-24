# Laravel Task List App 📝

A simple Task Management application built with **Laravel 10**, **Blade**, and **Tailwind CSS**.

You can create, edit, delete, and mark tasks as completed. The UI is responsive and includes flash messages for feedback.

## Features

* Create, read, update, and delete tasks
* Mark tasks as completed or not completed
* Responsive UI with Tailwind CSS
* Flash messages using Alpine.js
* Pagination for task lists
* Basic server-side validation

## Tech Stack

* **Backend:** PHP 8.x, Laravel 10
* **Frontend:** Blade, Tailwind CSS, Alpine.js
* **Database:** MySQL (or SQLite)

## Installation

1.  **Clone the repo**
    ```bash
    git clone [https://github.com/SpicyHisoka/laravel-task-list.git](https://github.com/SpicyHisoka/laravel-task-list.git)
    cd laravel-task-list
    ```

2.  **Install dependencies**
    ```bash
    composer install
    npm install
    ```

3.  **Environment setup**
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```
    Edit the `.env` file to configure your database connection details.

4.  **Run migrations**
    ```bash
    php artisan migrate
    ```

5.  **Build assets & serve**
    ```bash
    npm run build
    php artisan serve
    ```

Visit [http://127.0.0.1:8000](http://127.0.0.1:8000) to see the app.