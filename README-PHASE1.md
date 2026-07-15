# Bigenzi Laravel - Phase 1 Foundation

## Status Development

### Phase 1: Foundation (Laravel + Core Features)
- [x] Setup Laravel 12 project (bigenzi-laravel)
- [x] Database migration (9 migration files created & migrated)
- [x] Authentication system (Breeze)
- [x] Role-based middleware (admin, tutor, student, parent)
- [ ] User profile management
- [x] Basic article system (model + controller)

## Struktur File yang Sudah Dibuat

### Models (8 files)
- `User.php` - User model dengan role check methods
- `Article.php` - Article model dengan scope methods
- `PrivateTutor.php` - Private tutor profile
- `TutorFollow.php` - Student-tutor follow relationship
- `TutorApplication.php` - Tutor application system
- `Chat.php` - Chat conversation
- `Message.php` - Chat messages
- `SuspendLog.php` - User suspension logs
- `AuditLog.php` - Activity logging

### Migrations (9 files)
- `create_users_table.php`
- `create_articles_table.php`
- `create_private_tutors_table.php`
- `create_tutor_follows_table.php`
- `create_tutor_applications_table.php`
- `create_chats_table.php`
- `create_messages_table.php`
- `create_suspend_logs_table.php`
- `create_audit_logs_table.php`

### Middleware
- `RoleMiddleware.php` - Role-based access control

### Controllers
- `HomeController.php` - Public pages controller

### Routes
- `web.php` - Route definitions with role middleware

## Langkah Selanjutnya

1. Install Breeze untuk authentication:
   ```bash
   cd bigenzi-laravel
   php artisan breeze:install
   ```

2. Setup database:
   ```bash
   php artisan migrate
   ```

3. Install frontend dependencies:
   ```bash
   npm install
   npm run dev
   ```

4. Jalankan server:
   ```bash
   php artisan serve
   ```

## Catatan
- File migration di folder `database/migrations` (root project)
- File model di folder `bigenzi-laravel/app/Models`
- File controller di folder `bigenzi-laravel/app/Http/Controllers`
- File route di folder `bigenzi-laravel/routes`