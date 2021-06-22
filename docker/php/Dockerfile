FROM php:fpm-alpine

ARG TIMEZONE

RUN echo "date.timezone=${TIMEZONE}" | tee -a $PHP_INI_DIR/conf.d/date_timezone.ini

COPY . .

CMD [ "php-fpm" ]