<<<<<<< HEAD
FROM php:8.2-apache

# Install PDO MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Allow .htaccess overrides
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Copy app files
COPY . /var/www/html/

# Fix permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

EXPOSE 80
=======
# Use PHP 8.1 with Apache pre-installed
FROM php:8.1-apache

# Install required system tools and PHP extensions
RUN apt-get update && apt-get install -y zip unzip git \
    && docker-php-ext-install mysqli pdo pdo_mysql \
    && a2enmod rewrite

# Install Composer (PHP package manager)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory inside container
WORKDIR /var/www/html

# Copy project files into the container
COPY . /var/www/html

# Install PHP dependencies from composer.json
RUN composer install --no-dev --optimize-autoloader

# Fix permissions so Apache can read/write
RUN chown -R www-data:www-data /var/www/html

# Expose Apache default port
EXPOSE 80
>>>>>>> b86df56 (Initial commit)
