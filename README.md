# SkyLink Solutions Web Platform

Welcome to the **SkyLink Solutions** web platform codebase. This project has been modernized from a static raw PHP application into a scalable, enterprise-grade **Laravel** application. 

SkyLink Solutions is a digital technology company specializing in software development, ICT infrastructure (Networking), security, and surveillance. This web platform serves as the primary digital footprint, showcasing services, capturing client inquiries, and serving as a launchpad for products like PillPointOne and AfyaDigito.

## Tech Stack

- **Framework:** Laravel 11.x
- **Language:** PHP 8.x
- **Database:** MySQL
- **Frontend Engine:** Blade Templating (`resources/views/`)
- **Styling & Assets:** Vanilla CSS & JS (`public/css`, `public/js`)

## Project Structure

The project conforms to the standard Laravel architecture with specific adaptations for the SkyLink static-to-dynamic migration:

* `public/` - Contains all publicly accessible assets (`css/`, `images/`, `fonts/`, `js/`).
* `resources/views/layouts/` - Contains the master layout template (`app.blade.php`), unifying `header` and `footer` components.
* `resources/views/pages/` - Contains all core website views (e.g., `index.blade.php`, `about.blade.php`, `contact.blade.php`).
* `routes/web.php` - Defines the application's clean URL structure mapping directly to the view files.

## Local Development Setup

To run this project locally, ensure you have PHP, Composer, and MySQL installed on your system.

**1. Clone or Download the Repository**
Make sure your terminal is configured in the project root directory (`skylinksolutions`).

**2. Install Dependencies**
```bash
composer install
```

**3. Environment Configuration**
If `.env` does not exist, copy the example file:
```bash
cp .env.example .env
```
Ensure your database settings in the `.env` file match your local MySQL server setup. The application defaults to using a database named `office`.
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=office
DB_USERNAME=root
DB_PASSWORD=
```

**4. Generate Application Key**
```bash
php artisan key:generate
```

**5. Start the Application**
Spin up the local Laravel development server:
```bash
php artisan serve
```
The application will now be accessible at `http://127.0.0.1:8000`.

## Contact & Support

**SkyLink Solutions**
- **Address:** Posta Building, Morogoro, Tanzania
- **Phone:** +255 (0) 762 725 725
- **Email:** info@skylinksolutions.co.tz

© 2025 SkyLink Solutions | All rights reserved.
