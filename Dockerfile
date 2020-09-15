FROM php:7.0-fpm-alpine3.7

ENV DB_ADDR="127.0.0.1"
ENV DB_PORT="3306"
ENV DB_NAME="alphareign"
ENV DB_USER="root"
ENV DB_PASS="123456"

ENV ELASTIC_HOST='127.0.0.1'
ENV ELASTIC_PORT='9200'
ENV ELASTIC_USER='elastic'
ENV ELASTIC_PASS='elastic'

ENV INVITE_ONLY=0
ENV REQUEST_LOGIN=1

EXPOSE 80

WORKDIR /srv/www
COPY . .
RUN chmod 666 ./counts.txt
COPY ./php/www.conf /usr/local/etc/php-fpm.d/www.conf

RUN apk add nginx
RUN docker-php-ext-install mysqli pdo pdo_mysql
COPY ./nginx.conf /etc/nginx/conf.d/default.conf

RUN curl -sS https://getcomposer.org/installer | php
RUN mv ./composer.phar /usr/bin/composer
RUN composer install

ENTRYPOINT [ "./scripts/start.sh" ]