FROM php:7

COPY composer.lock composer.json /var/www/
RUN apt-get update -y && apt-get install -y openssl zip unzip git default-mysql-client
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo_mysql mbstring
WORKDIR /var/www
COPY . /var/www


CMD php artisan key:generate
CMD php artisan serve --host=0.0.0.0 --port=9000
EXPOSE 9000
