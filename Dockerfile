# Dockerfile
FROM php:8.2-apache

# Install dependencies
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# Enable Apache mod_rewrite if needed
RUN a2enmod rewrite

# Copy your code
COPY . /var/www/html/

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
