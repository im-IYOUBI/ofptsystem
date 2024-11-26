# School Management System

A comprehensive web-based school management system designed to streamline educational institution operations. This system facilitates communication and management between administrators, teachers, students, and parents.

## Features

### Administrator Dashboard
- User management (teachers, students, parents)
- Class and subject management
- Role-based access control
- Course scheduling
- Administrative overview reports

### Teacher Features
- Attendance management
- Student profile access
- Course calendar management
- Class management
- Profile management

### Student Features
- Attendance records viewing
- Course schedule access
- Profile management
- Class information access

### Parent Features
- Child's attendance monitoring
- Academic progress tracking
- Profile management

## Technologies Used

- **Backend:**
  - Laravel
  - MySQL
  
- **Frontend:**
  - Vite.js
  - HTML/CSS
  - Bootstrap

## System Requirements

- PHP >= 8.0
- Node.js >= 16
- MySQL >= 5.7
- Composer

## Installation

1. Clone the repository
```bash
git clone [repository-url]
```

2. Install PHP dependencies
```bash
composer install
```

3. Install NPM packages
```bash
npm install
```

4. Configure environment variables
```bash
cp .env.example .env
php artisan key:generate
```

5. Set up the database
```bash
php artisan migrate
php artisan db:seed
```

6. Start the development server
```bash
php artisan serve
npm run dev
```

## Project Structure

- `/app` - Contains the core code of the application
- `/database` - Contains database migrations and seeders
- `/resources` - Contains views, raw assets, and localization files
- `/routes` - Contains all route definitions
- `/tests` - Contains test files
- `/public` - Contains publicly accessible files

## Testing

The application includes several types of tests:
- Functional tests
- Usability tests
- Performance tests
- Compatibility tests
- Security tests

Run tests using:
```bash
php artisan test
```

## Security

The system implements several security measures:
- Role-based access control
- Secure authentication
- Data encryption
- XSS protection
- CSRF protection

## Contributors

- Developers:
  - Amine IYOUBI
  - Noureddine IHICHR
- Project Supervisor:
  - SOUFIANE AIT TALEB

## Institution

Institut Spécialisé de Technologie Appliquée Guelmim
Academic Year: 2023/2024

## License

[MIT License](LICENSE)