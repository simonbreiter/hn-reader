FROM php:7.0.17-apache

RUN a2enmod headers

ADD web /var/www/html/
ADD .htaccess /var/www/html/

