# Blog App

This is a simple blog application built with Laravel. It includes a commenting system and uses caching to improve performance.

## Features

- Create, read, update, and delete blog posts
- Comment on blog posts
- User authentication
- Caching for improved performance

## Requirements

- PHP >= 8.0
- Composer
- Docker (optional, but recommended for development)

## Installation

### Using Docker (Recommended)

1. Clone the repository:
    ```bash
    git clone https://github.com/TerezaManukyan/blog_app
    cd blog-app
    ```

2. Copy `.env.example` to `.env` and configure your environment variables:
    ```bash
    cp .env.example .env
    ```

3. Start the Docker containers:
    ```bash
    docker-compose up -d
    ```

4. Install PHP dependencies:
    ```bash
    docker-compose exec php-fpm composer install
    ```

5. Generate an application key:
    ```bash
    docker-compose exec php-fpm php artisan key:generate
    ```
6. Run migrations:
    ```bash
    docker-compose exec php-fpm php artisan migrate
    ```

## Usage

### Creating Blog Posts

- Navigate to the `/posts` page.
- Click on "Create Post".
- Fill in the form and submit.

### Commenting on Posts

- Navigate to a specific post.
- Scroll down to the comments section.
- Fill in the comment form and submit.
