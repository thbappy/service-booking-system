# 🛠️ Laravel Service Booking API

This is a simple Laravel 11-based API project for a **Service Booking System** using **Laravel Sanctum** for authentication.

## 📦 Features

- User Registration & Login (Sanctum)
- Admin/User Role Separation
- Manage Services (Admin)
- Book Services (Users)
- View Bookings (User & Admin)
- RESTful API Endpoints

---

## 🧪 Requirements

- PHP >= 8.2
- Laravel 11
- MySQL
- Composer

---

## ⚙️ Installation

```bash
git clone https://github.com/thbappy/booking-api.git
cd booking-api
composer install
cp .env.example .env
php artisan key:generate
```

Configure `.env` for your database:

```
DB_DATABASE=your_db
DB_USERNAME=root
DB_PASSWORD=
```

Then run:

```bash
php artisan migrate --seed
```

---

## ▶️ Run the Project

```bash
php artisan serve
```

---

## 🔑 Login Access (Admin & Customer)

### 👑 Admin User

```json
{
  "email": "admin@example.com",
  "password": "password"
}
```

**Can:**
- Manage services (Create, Update, Delete)
- View all bookings

### 🙋 Customer Users

1️⃣ **Customer 1**
```json
{
  "email": "tanbeer@example.com",
  "password": "123456"
}
```

**Can:**
- View services
- Book services
- View their own bookings

---

## 🔐 Authentication (Sanctum)

### 📥 Login

```
POST /api/login
```

**Body:**
```json
{
  "email": "admin@example.com",
  "password": "password"
}
```

**Response:**
```json
{
  "token": "your-token"
}
```

Use it in headers:
```
Authorization: Bearer your-token
```

---

## 🧾 API Routes

### Public
- `POST /api/register` - Register
- `POST /api/login` - Login

### Authenticated (User)
- `GET /api/services` - List available services
- `POST /api/bookings` - Book a service
- `GET /api/bookings` - View own bookings

### Admin (auth + admin middleware)
- `POST /api/services` - Create service
- `PUT /api/services/{id}` - Update service
- `DELETE /api/services/{id}` - Delete service
- `GET /api/admin/bookings` - View all bookings

---

## 🧪 Testing (Optional)

Use Postman or Thunder Client:
- Add token in headers: `Authorization: Bearer your-token`

---

