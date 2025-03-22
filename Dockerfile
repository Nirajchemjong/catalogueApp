# Stage 1: Build Assets
FROM node:18-alpine AS node-builder
WORKDIR /app
COPY package.json package-lock.json ./
RUN npm install
COPY . .
RUN npm run build

# Stage 2: Build PHP Image
FROM php:8.2-fpm
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
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
WORKDIR /var/www
COPY composer.json composer.lock ./
COPY artisan ./
COPY bootstrap/ bootstrap/
COPY routes/ routes/
COPY app/ app/
RUN composer install --no-dev --optimize-autoloader
COPY . .
# Copy built assets from Stage 1 into the public folder (adjust as needed)
COPY --from=node-builder /app/public/build public/build
RUN chown -R www-data:www-data /var/www
EXPOSE 8000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]