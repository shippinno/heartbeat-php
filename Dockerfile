FROM php:7.4-fpm-alpine

RUN curl -sS https://getcomposer.org/installer | \
    php -- --install-dir=/usr/bin/ --filename=composer

#RUN docker-php-source extract
#RUN pecl install xdebug
#RUN docker-php-ext-enable xdebug