FROM php:8.2-apache

# mysqli + PDO
RUN docker-php-ext-install mysqli pdo pdo_mysql

# DocumentRoot standaard laten: /var/www/html
CMD ["apache2-foreground"]
