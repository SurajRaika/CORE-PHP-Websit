FROM php:8-fpm

# Install dependencies
RUN apt-get update && \
    apt-get install -y wget git zip unzip


RUN pecl install xdebug \
    && docker-php-ext-enable xdebug



RUN pecl install mongodb && docker-php-ext-enable mongodb
RUN curl -s https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

RUN composer install