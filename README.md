# Learner Progress Dashboard - Coding Challenge

## Getting Started

1. Run `composer install`
2. Configure your `.env` file from the example
3. Generate the App Key: `php artisan key:generate`
4. Run migrations and seeders: `php artisan migrate --seed`
5. Start the development server: `php artisan serve`


## Features that I have built

1. Filter learners by course or progress percentage
2. Sort learners by progress (ascending/descending)
3. Clean UI with dropdown filters and responsive table
4. Global error handling with logs in storage/logs/laravel.log
5. Service layer for filtering logic (avoids fat controllers)

## Project Structure

1. app/Models → Core models (Course, Learner, Enrollment)
2. app/Services → Business logic (e.g., ProgressFilterService)
3. app/Http/Controllers → Controllers orchestrating requests
4. resources/views → Blade templates for UI
5. database/migrations → Schema definitions
6. database/seeders → Sample data

## Error Handling & Logging

1. All errors are logged automatically to storage/logs/laravel.log.
2. Global exception handling is defined in app/Exceptions/Handler.php.
3. Use Log::error() for custom error messages.

## Design Patterns & Architecture 
This project demonstrates several design patterns: - 
**MVC**: Core Laravel structure separates models, views, and controllers. - 
**Service Layer**: Business logic (filters, sorting) is encapsulated in services to avoid fat controllers. - 
**Repository/Query Builder**: Eloquent ORM provides a clean, chainable query interface. - **Dependency Injection**: Services are injected into controllers for loose coupling and testability. - 
**Strategy Pattern**: Sorting logic (ascending/descending) is applied dynamically. 