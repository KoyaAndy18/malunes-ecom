# Use the official PHP image as a base
FROM php:8.3.16-apache

# Install necessary extensions
RUN docker-php-ext-install pdo pdo_mysql

# Set the working directory
WORKDIR /var/www/html

# Copy the project files to the container
COPY . .

# Expose port 80 for the web server
EXPOSE 80

# Start Apache server
CMD ["apache2-foreground"]
