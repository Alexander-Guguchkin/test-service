FROM composer:latest-alpine

WORKDIR /var/www/laravel

ENTRYPOINT ["composer", "--ignore-platform-reqs"]