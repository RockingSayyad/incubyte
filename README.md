# Incubyte Salary Management API

## 📌 Overview
This is a REST API built using Laravel to manage employees and calculate salaries based on country-specific rules. The project follows Test-Driven Development (TDD) principles and uses SQLite as the database.

---

## 🚀 Features

### 1. Employee CRUD
- Create, Read, Update, Delete employees
- Fields: full_name, job_title, country, salary

### 2. Salary Calculation
- India → 10% deduction
- United States → 12% deduction
- Others → No deduction

### 3. Salary Metrics
- Min, Max, Average salary by country
- Average salary by job title

---

## 🛠 Tech Stack
- Laravel
- SQLite
- PHPUnit (TDD)
- Postman (API testing)

---

## ⚙️ Setup Instructions

```bash
composer install
php artisan migrate
php artisan serve