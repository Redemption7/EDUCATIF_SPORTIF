# NK EDUCATIF SPORTIF - Sports Registration System

A modern, elegant sports registration platform built with Laravel 11 and Vue.js. Features a beautiful student registration form, powerful admin dashboard, and secure authentication system.

![Laravel](https://img.shields.io/badge/Laravel-11-FF2D20?logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?logo=php&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green)

## Features

### 🎓 Student Registration
- Beautiful modal registration form integrated into main website
- Real-time form validation
- Support for multiple sports and age groups
- Capture athletic details (position, jersey number, etc.)
- Success notification upon registration
- Email and phone contact information

### 📊 Admin Dashboard
- Stunning minimalist design matching modern SaaS platforms
- Real-time registration statistics (Total, Pending, Approved, Rejected)
- Responsive data table with sorting and filtering
- Student details modal with organized information cards
- Status management (approve/reject with notes)
- CSV export functionality

### 🔐 Authentication System
- Secure login/logout with session management
- CSRF protection on all forms
- Password hashing with Laravel's Authenticatable
- Remember me functionality
- Middleware-based route protection

### 🎨 Modern UI/UX
- Professional design system inspired by Stripe and GitHub
- Brand colors: Green (#1D5944), Orange (#FF7A59)
- Typography: Poppins (body) + Playfair Display (headings)
- Fully responsive (mobile, tablet, desktop)
- Smooth animations and transitions
- Accessible form controls

## Tech Stack

- **Framework**: Laravel 11
- **Database**: MySQL
- **Frontend**: Blade templating + Vanilla JavaScript
- **Styling**: CSS3 with modern features (Grid, Flexbox, Gradients)
- **Fonts**: Google Fonts (Poppins, Playfair Display)

## Project Structure

```
EDUCATIF_SPORTIF/
├── app/
│   ├── Http/Controllers/
│   │   ├── Auth/AuthController.php          # Authentication logic
│   │   ├── AdminController.php              # Admin dashboard & operations
│   │   ├── RegistrationController.php       # Registration form handling
│   │   └── PageController.php               # Main website
│   ├── Models/
│   │   ├── User.php                         # User model with registrations
│   │   └── SportsRegistration.php           # Registration model
│   └── Providers/
│       └── AppServiceProvider.php
├── database/
│   ├── migrations/
│   │   └── create_sports_registrations_table.php
│   ├── factories/
│   │   └── UserFactory.php
│   └── seeders/
│       └── UserSeeder.php                   # Demo users
├── resources/
│   ├── views/
│   │   ├── auth/
│   │   │   └── login.blade.php              # Beautiful login page
│   │   ├── admin/
│   │   │   ├── dashboard.blade.php          # Main admin dashboard
│   │   │   └── registrations.blade.php      # Registrations list
│   │   ├── registration/
│   │   │   └── form.blade.php               # Registration form
│   │   ├── home.blade.php                   # Main website
│   │   └── welcome.blade.php
│   └── css/
│       └── app.css
├── routes/
│   └── web.php                              # All application routes
├── config/
│   ├── auth.php                             # Authentication config
│   ├── database.php                         # Database config
│   └── ...
└── tests/

```

## Installation

### Prerequisites
- PHP 8.2 or higher
- Composer
- MySQL
- Node.js (optional, for assets)

### Setup Steps

1. **Clone the repository**
```bash
git clone https://github.com/Redemption7/EDUCATIF_SPORTIF.git
cd EDUCATIF_SPORTIF
```

2. **Install dependencies**
```bash
composer install
npm install
```

3. **Environment configuration**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Configure database**
Edit `.env` and set your database credentials:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=educatif_sportif
DB_USERNAME=root
DB_PASSWORD=
```

5. **Run migrations**
```bash
php artisan migrate
```

6. **Seed demo data**
```bash
php artisan db:seed
```

7. **Start the development server**
```bash
php artisan serve
```

Visit `http://localhost:8000` in your browser.

## Default Login Credentials

| Field | Value |
|-------|-------|
| Email | admin@nkeducatif.com |
| Password | password123 |

## Usage

### For Students
1. Visit the homepage
2. Click on "Register for Sports" button
3. Fill in the registration form
4. Submit to receive a success confirmation
5. Check the "View My Registrations" page (future feature)

### For Admins
1. Click "Admin Login" in the navbar
2. Log in with credentials above
3. View dashboard with statistics
4. Review pending registrations
5. Approve or reject registrations
6. Add notes to registrations
7. Export data as CSV

## API Routes

### Authentication
- `GET /login` - Show login form
- `POST /login` - Handle login
- `POST /logout` - Handle logout

### Registration
- `POST /register/store` - Submit registration form
- `GET /register/sports` - Show registration form
- `GET /register/my-registrations` - View user's registrations

### Admin (Protected by auth middleware)
- `GET /admin/dashboard` - Main dashboard
- `GET /admin/registrations` - List all registrations
- `POST /admin/approve/{id}` - Approve registration
- `POST /admin/reject/{id}` - Reject registration
- `GET /admin/export-csv` - Export registrations as CSV

## Database Schema

### users table
- id, name, email, email_verified_at, password, remember_token, created_at, updated_at

### sports_registrations table
- id, user_id (nullable), full_name, email, sport_name, age_group, gender, position, jersey_number, phone, notes, status (enum: pending, approved, rejected), registered_at, approved_at, approved_by, created_at, updated_at

## Features in Detail

### Admin Dashboard
- **Statistics Cards**: Display counts for total, pending, approved, and rejected registrations
- **Filters**: Filter registrations by status, sport, or gender
- **Table View**: Display all registrations with inline approve/reject buttons
- **Details Modal**: Beautiful modal showing complete registration information
- **CSV Export**: Download registration data for reporting

### Student Details Modal
- **Organized Sections**: Personal info, Sport info, Registration status, Notes
- **Card-based Layout**: 2-column grid for easy scanning
- **Visual Hierarchy**: Clear labels and values with gradient highlights
- **Status Badges**: Color-coded status indicators
- **Responsive**: Works seamlessly on all devices

### Login Page
- Minimalist design matching dashboard
- Email/Password authentication
- Remember me checkbox
- Demo credentials displayed for reference
- Error message handling
- Responsive mobile design

## Security Features

- ✅ CSRF protection on all forms
- ✅ Password hashing with bcrypt
- ✅ Session management with timeout
- ✅ SQL injection protection (Eloquent ORM)
- ✅ XSS protection
- ✅ Middleware-based route protection
- ✅ Token regeneration on logout

## Performance

- Optimized database queries with eager loading
- Minified CSS and JavaScript
- Pagination on data tables (15 items per page)
- Efficient caching strategies
- Responsive images and lazy loading

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers

## Contributing

Contributions are welcome! Please fork the repository and submit pull requests.

## License

This project is open-sourced software licensed under the [MIT license](LICENSE).

## Support

For issues, questions, or suggestions, please create an issue on the GitHub repository.

## Authors

- **Redemption7** - Initial development and design

## Acknowledgments

- Laravel team for the amazing framework
- Tailwind CSS for styling utilities
- Google Fonts for typography

---

**Version**: 1.0.0  
**Last Updated**: February 20, 2026  
**Status**: Production Ready ✅

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
