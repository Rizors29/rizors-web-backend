FROM webdevops/php-nginx:8.2

# Set working directory
WORKDIR /app

# Copy project
COPY . .

# Install composer
RUN composer install --no-dev --optimize-autoloader

# Laravel permissions
RUN chown -R application:application /app/storage /app/bootstrap/cache

# Laravel optimize
RUN php artisan config:cache && php artisan route:cache

# Expose port 80 (default for nginx)
EXPOSE 80

# Start Nginx + PHP-FPM automatically (handled by webdevops base image)
