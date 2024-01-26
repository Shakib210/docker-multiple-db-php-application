# Use an official PHP runtime as a parent image
FROM php:7.4-apache

# Set the working directory to /var/www/html
WORKDIR /var/www/html

# Copy the current directory contents into the container at /var/www/html
COPY . /var/www/html

# Install any dependencies your PHP application might need
RUN apt-get update && apt-get upgrade -y && apt-get install -y libzip-dev
RUN docker-php-ext-install zip mysqli pdo_mysql

# Enable the Apache rewrite module
RUN a2enmod rewrite

# Expose port 80 to the outside world
EXPOSE 80

# Start Apache when the container launches
CMD ["apache2-foreground"]
