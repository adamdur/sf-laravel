# Laravel Application Setup

This guide outlines the steps to get the Laravel application up and running on your local machine using Laravel Sail, Docker's full PHP development environment.

## Prerequisites

- Docker Desktop
- Git

## Setup Instructions

### 1. Clone the Repository

First, clone the repository to your local machine:

```bash
git clone https://github.com/adamdur/sf-laravel.git
cd sf-laravel
```

### 2. Environment Setup

Copy the example environment file and modify it as needed, specially the SF_* stuff:

```bash
cp .env.example .env
```

### 3. Install Dependencies

Use Composer to install the project dependencies. With Laravel Sail, you can run Composer commands within the Docker container without having Composer installed on your local machine:

```bash
composer install
```

### 4. Generate Application Key

Generate a new application key. This command also runs within the Docker container:

```bash
./vendor/bin/sail artisan key:generate
```

### 5. Start the Application

Start the application using Laravel Sail:

```bash
./vendor/bin/sail up
```

Your application should now be accessible at http://localhost.

### Stopping the Application

To stop the application and all associated Docker containers, use:

```bash
./vendor/bin/sail down
```
