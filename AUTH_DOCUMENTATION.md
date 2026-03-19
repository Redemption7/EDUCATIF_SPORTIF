# Authentication System Documentation

## Overview
Complete secure authentication system for NK EDUCATIF SPORTIF admin panel.

## Features Implemented

### 1. Login System
- **Route:** `GET /login`
- **File:** `resources/views/auth/login.blade.php`
- Beautiful, minimalist design matching dashboard theme
- Email/Password authentication
- "Remember me" checkbox for session persistence
- Real-time error messages
- Demo credentials displayed on form

### 2. Logout System
- **Route:** `POST /logout`
- Secure session invalidation
- CSRF token protection
- Automatic redirect to home page
- User greeting in dashboard navbar

### 3. Authentication Routes
```
GET  /login              → Show login form
POST /login              → Handle login submission
POST /logout             → Handle logout
```

### 4. Protected Routes
All admin routes are protected with `auth` middleware:
```
GET    /admin/dashboard
GET    /admin/registrations
POST   /admin/approve/{id}
POST   /admin/reject/{id}
GET    /admin/export-csv
```

Unauthenticated users are redirected to `/login`

## Login Credentials

**Email:** nkes.academy@nkes-sports.org
**Password:** password123

## Security Features

- ✅ CSRF protection on all forms
- ✅ Password hashing with Laravel's Authenticatable
- ✅ Session management and persistence
- ✅ Token regeneration on logout
- ✅ Middleware-based route protection
- ✅ Remember token support

## UI Integration

### Home Page
- **Logged Out:** Shows "Admin Login" button (green)
- **Logged In:** Shows "Dashboard" button (orange)

### Admin Dashboard
- Displays user greeting: "Welcome, [Username]"
- Beautiful logout button with clean styling
- User info in navbar

## Design
- Modern, minimalist interface inspired by SaaS platforms (Stripe, GitHub)
- Matches dashboard color scheme (Green #1D5944, Orange #FF7A59)
- Responsive design for mobile devices
- Professional typography (Poppins + Playfair Display)
- Subtle shadows and borders

## File Structure
```
app/
  ├── Http/Controllers/Auth/
  │   └── AuthController.php
  
resources/
  └── views/auth/
      └── login.blade.php
      
routes/
  └── web.php (updated with auth routes)
```

## Testing

1. Visit http://localhost:8080/login
2. Enter demo credentials
3. Click "Login"
4. You'll be redirected to /admin/dashboard
5. Try the "Logout" button
6. You'll be redirected to home page

## Error Handling

- Invalid email/password: Displays error message
- Missing fields: Shows validation errors
- Session expired: Redirects to login
- CSRF token missing: Prevents submission

## Notes

- Admin user is seeded in UserSeeder with password "password123"
- All passwords are hashed using Laravel's password hashing
- Sessions are configured to expire after inactivity
- Remember token functionality is enabled
