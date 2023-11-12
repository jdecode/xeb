FROM jdecode/devops:php8.2.11-n20x3

WORKDIR /var/www/html

COPY . /var/www/html

RUN composer install

CMD php artisan queue:listen --tries=3 --timeout=3600
