# Dockerfile
FROM php:8.2-apache

# Install dependencies for PostgreSQL PDO
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Copy your app files into the container
COPY . /var/www/html/

# (Optional) Set correct permissions, configure Apache, etc.

# Set permissions (optional)
RUN chown -R www-data:www-data /var/www/html/

# Expose the default Apache port
EXPOSE 80
