FROM php:8.2-apache

# Installeer mysqli + PDO
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Zet Apache DocumentRoot op public
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf

CMD ["apache2-foreground"]
