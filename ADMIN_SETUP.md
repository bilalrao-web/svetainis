# Admin Panel Setup Guide

## Overview
A comprehensive admin panel has been created to manage all aspects of your website including:
- Site Settings (logo, site name, contact info, etc.)
- Services (create, edit, delete services)
- Menu Items (header and footer navigation)
- Pages (custom content pages)

## Installation Steps

### 1. Run Migrations
```bash
php artisan migrate
```

### 2. Seed Initial Data
```bash
php artisan db:seed
```

This will create:
- Default admin user (email: `admin@uplance.com`, password: `password`)
- Default settings
- Default menu items

### 3. Access Admin Panel
Navigate to: `http://your-domain.com/admin/login`

**Default Credentials:**
- Email: `admin@uplance.com`
- Password: `password`

**⚠️ IMPORTANT: Change the default password immediately after first login!**

## Admin Panel Features

### Dashboard
- Overview statistics
- Quick access to all sections

### Settings
Manage:
- Site Name
- Site Title
- Logo (upload image)
- Footer Text
- Contact Email
- Contact Phone

### Services
- Create new services
- Edit existing services
- Delete services
- Manage service content (title, description, intro, note, closing, etc.)
- Set service status (active/inactive)

### Menus
- Manage header navigation
- Manage footer navigation
- Set menu item order
- Use Laravel routes or custom URLs

### Pages
- Create custom pages
- Edit page content
- Manage SEO meta tags
- Set page status

## File Structure

```
app/
├── Http/
│   ├── Controllers/
│   │   └── Admin/
│   │       ├── AuthController.php
│   │       ├── DashboardController.php
│   │       ├── SettingsController.php
│   │       ├── ServiceController.php
│   │       ├── MenuController.php
│   │       └── PageController.php
│   └── Middleware/
│       └── AdminMiddleware.php
├── Models/
│   ├── Setting.php
│   ├── Service.php
│   ├── MenuItem.php
│   └── Page.php
resources/
└── views/
    └── admin/
        ├── layouts/
        │   └── app.blade.php
        ├── auth/
        │   └── login.blade.php
        ├── dashboard.blade.php
        ├── settings/
        ├── services/
        ├── menus/
        └── pages/
database/
└── migrations/
    ├── create_settings_table.php
    ├── create_services_table.php
    ├── create_menu_items_table.php
    └── create_pages_table.php
```

## Routes

All admin routes are prefixed with `/admin` and protected by authentication middleware:

- `/admin/login` - Login page
- `/admin/dashboard` - Dashboard
- `/admin/settings` - Site settings
- `/admin/services` - Services management
- `/admin/menus` - Menu items management
- `/admin/pages` - Pages management

## Security Notes

1. **Change Default Password**: Immediately change the default admin password
2. **Environment Variables**: Consider adding admin email/password to `.env` for production
3. **Middleware Protection**: All admin routes are protected by `AdminMiddleware`
4. **CSRF Protection**: All forms include CSRF tokens

## Updating Frontend to Use Dynamic Content

The header component has been updated to use dynamic menu items from the database. To fully integrate:

1. Services can be loaded from database instead of hardcoded arrays
2. Settings (logo, site name) are already integrated in Header component
3. Footer can be updated similarly to use dynamic menu items

## Troubleshooting

### Can't Login
- Verify user exists: `php artisan tinker` then `User::where('email', 'admin@uplance.com')->first()`
- Reset password: Update user password in database or create new admin user

### Images Not Showing
- Run: `php artisan storage:link` to create symbolic link for storage
- Check file permissions on `storage/app/public`

### Menu Items Not Showing
- Verify menu items exist in database
- Check menu items are marked as active
- Verify location is set correctly (header/footer)

## Support

For issues or questions, check:
1. Laravel logs: `storage/logs/laravel.log`
2. Browser console for JavaScript errors
3. Network tab for failed requests



