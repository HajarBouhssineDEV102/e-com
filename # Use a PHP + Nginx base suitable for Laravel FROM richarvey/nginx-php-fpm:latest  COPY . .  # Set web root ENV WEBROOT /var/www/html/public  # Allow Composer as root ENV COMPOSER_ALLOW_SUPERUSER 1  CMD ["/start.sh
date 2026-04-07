# Use a PHP + Nginx base suitable for Laravel
FROM richarvey/nginx-php-fpm:latest

COPY . .

# Set web root
ENV WEBROOT /var/www/html/public

# Allow Composer as root
ENV COMPOSER_ALLOW_SUPERUSER 1

CMD ["/start.sh"]
