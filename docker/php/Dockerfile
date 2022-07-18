# Offical Docker Image for PHP
# https://hub.docker.com/_/php
FROM php:8.1-fpm-alpine3.16

# Set Current Directory
WORKDIR /var/www/vhost/

# Install dependencies
RUN apk --no-cache --update add build-base bash git tzdata \
    libpq-dev libzip-dev busybox-suid mysql $PHPIZE_DEPS && \
    pecl install redis && \
    pecl install xdebug

RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql && \
    docker-php-ext-install bcmath pdo pgsql pdo_pgsql zip pdo_mysql && \
    docker-php-ext-enable redis xdebug

# Install Composer from Official Docker Image
# https://hub.docker.com/_/composer
COPY --from=composer:2.2 /usr/bin/composer /usr/bin/composer

