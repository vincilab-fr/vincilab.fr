FROM php:8.2-apache

COPY . /var/www/html

RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g' \
    /etc/apache2/sites-enabled/000-default.conf \
    && a2enmod rewrite

EXPOSE 80
