#!/bin/sh

function pend {
    while sleep 3600 && wait $!;do :;done
}

mkdir /run/nginx

nginx
php-fpm
# pend