# 🎓 Mini LMS – Laravel Learning Management System

A simple Laravel-based LMS where users can register, create courses, add YouTube lectures, and browse content with search and pagination.

---

## 🚀 Features

- ✅ User authentication (Laravel Breeze)
- 📚 Course creation & deletion
- 🎥 Add lectures with YouTube embed support
- 🔍 Search and pagination (3 courses/page, 1 lecture/page)
- 🔒 Authorization via policies

---

## ⚙️ Setup Instructions

```bash
git clone https://github.com/your-username/mini-lms.git
cd mini-lms

composer install
npm install && npm run dev

cp .env.example .env
touch database/database.sqlite
php artisan key:generate

php artisan migrate:fresh --seed
```

---

### 🔧 Update `.env`

```ini
DB_CONNECTION=sqlite
```

---

## 🙋‍♀️ Test User

- **Email:** `test@example.com`  
- **Password:** `password`

---

## 🌐 Access

- 🌐 **Laravel Herd:** [http://mini-lms.test](http://mini-lms.test)  
- 🧪 **Artisan serve:** [http://127.0.0.1:8000](http://127.0.0.1:8000)