FROM jdecode/devops:php8.2.11-n20x3

WORKDIR /var/www/html

COPY . /var/www/html

RUN composer install

RUN npm install
RUN npm run build

CMD php artisan serve --host=0.0.0.0 --port=$PORT
