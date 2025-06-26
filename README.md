# Laravel Task Manager App 📝

This is a simple Task Management web application built using **Laravel 11** and **Laravel Breeze**. It allows users to register, log in, create tasks, and track their status from **To Do**, **In Progress**, to **Done**.

---

## ✨ Features

- 🔐 User Registration & Login (Laravel Breeze)
- 📝 Create new tasks
- 📊 Tasks grouped by status: **To Do**, **In Progress**, **Done**
- 🔄 Update task status via dropdown
- ⚡ Built with Blade + TailwindCSS UI

---

## 🛠️ Tech Stack

- **Backend**: Laravel 11 (PHP Framework)
- **Frontend**: Blade + TailwindCSS
- **Auth**: Laravel Breeze
- **Database**: SQLite (for easy local setup)

---

## 🚀 Getting Started

### Clone & Install

```bash
git clone https://github.com/Tanmaikiran/task-manager-laravel.git
cd task-manager-laravel
composer install
npm install
npm run build
cp .env.example .env
php artisan migrate
php artisan serve
