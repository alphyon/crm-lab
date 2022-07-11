# Offical Docker Image for PHP
# https://hub.docker.com/_/php
FROM php:8.1-fpm-alpine3.16

# Set Current Directory
WORKDIR /var/www/vhost/

# Install dependencies
RUN apk --no-cache --update add build-base bash git tzdata \
        libzip-dev busybox-suid icu-dev libpng-dev jpeg-dev libxml2-dev




RUN docker-php-ext-configure intl
# PHP Extensions
RUN docker-php-ext-install \
    bcmath \
    exif \
    gd \
    mysqli \
    opcache \
    pdo_mysql \
    pcntl \
    xml \
    zip \
    intl

# Install Composer from Official Docker Image
# https://hub.docker.com/_/composer
COPY --from=composer:2.2 /usr/bin/composer /usr/bin/composer

