FROM php:8.2-apache-bullseye
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
COPY --from=node:latest /usr/local/bin /usr/local/bin
COPY --from=node:latest /usr/local/lib /usr/local/lib

RUN apt update && apt install -y zip
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN a2enmod rewrite