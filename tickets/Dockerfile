FROM php:8.3-cli

# Instalar extensões e dependências
RUN apt-get update && apt-get install -y \
    zip unzip curl git libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# PHP config
COPY .docker/php.ini /usr/local/etc/php/php.ini
