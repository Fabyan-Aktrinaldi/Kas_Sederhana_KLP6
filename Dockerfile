FROM php:8.2-apache

# Install extension MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable Apache rewrite (opsional tapi aman)
RUN a2enmod rewrite