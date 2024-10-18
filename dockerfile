FROM php:8.3-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    git \
    && docker-php-ext-install zip pdo pdo_mysql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /var/www

# Copy composer files
COPY composer.json composer.lock ./

# Install PHP dependencies (only once if dependencies are unchanged)
RUN composer install --no-dev --optimize-autoloader

# Copy the rest of the application
COPY . .

# Expose port 9000
EXPOSE 9000

CMD ["php-fpm"]
