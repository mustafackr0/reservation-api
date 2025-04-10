# Reservation API (Laravel 11)

A simple hotel and room reservation API built with Laravel 11 and Sanctum.  
Users can register, log in, view hotels and rooms, and create or cancel reservations securely.

---

## Features

- ✅ User registration & login (Sanctum token-based auth)
- ✅ List hotels and their rooms
- ✅ Create & cancel room reservations
- ✅ Room availability control
- ✅ Protected API routes

---

## Tech Stack

- Laravel 11
- Sanctum
- MySQL / SQLite
- RESTful API
- Postman (for testing)

---

## Installation

```bash
git clone https://github.com/mustafackr0/reservation-api.git
cd reservation-api
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
```

---

## Test User

You can use the seeded user to log in:

```json
{
  "email": "test@example.com",
  "password": "123456"
}
```

---

## API Endpoints
| Method | Endpoint | Description | Auth |
|--------|----------|-------------|------|
| POST   | /api/register     | Register new user         | ❌ |
| POST   | /api/login        | Login and get token       | ❌ |
| GET    | /api/hotels       | List all hotels           | ✅ |
| GET    | /api/hotels/{id}/rooms | List rooms of a hotel | ✅ |
| GET    | /api/rooms/{id}   | Get room detail           | ✅ |
| POST   | /api/reservations | Make a reservation        | ✅ |
| GET    | /api/reservations | List user reservations    | ✅ |
| DELETE | /api/reservations/{id} | Cancel a reservation | ✅ |
| POST   | /api/logout       | Logout & revoke token     | ✅ |
> ✅ = Requires Bearer Token
---

## Postman Collection
A full set of requests is available for testing:
    - postman/reservation-api.postman_collection.json
Import this file into Postman and set {{token}} after login.
---

## Seeded Sample Data
Running the seeder will create:
5 hotels
3 rooms per hotel (total: 15)
1 test user (see above)
---

## Contact
Made with by Mustafa (mustafacakar0@outlook.com)
Thanks for checking out this project!
---
