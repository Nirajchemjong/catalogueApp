# Stage 1: Build Assets
FROM node:18-alpine AS node-builder
WORKDIR /app
COPY package.json package-lock.json ./
RUN npm install
COPY . .
RUN npm run build

# Stage 2: Build PHP Image
FROM php:8.2-fpm

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl

RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer from the official image
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy essential Laravel files for Composer and configuration
COPY composer.json composer.lock ./
COPY artisan ./
COPY bootstrap/ bootstrap/
COPY routes/ routes/
COPY app/ app/

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Copy the rest of the application code and built assets
COPY . .
COPY --from=node-builder /app/public/build public/build

RUN chown -R www-data:www-data /var/www

# Expose port 8080 (Cloud Run default, if not overridden by runtime env)
EXPOSE 8080

# Start Laravel's built-in server using the PORT environment variable (defaulting to 8080)
CMD ["/bin/sh", "-c", "php artisan serve --host=0.0.0.0 --port=${PORT:-8080}"]