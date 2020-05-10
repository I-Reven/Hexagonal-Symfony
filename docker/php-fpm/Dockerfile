FROM php:fpm-alpine
COPY wait-for-it.sh /usr/bin/wait-for-it
RUN chmod +x /usr/bin/wait-for-it
RUN apk --update --no-cache add git
RUN apk add --no-cache bash
RUN docker-php-ext-install pdo_mysql
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
WORKDIR /var/www
CMD composer install ; wait-for-it database:3306 -- bin/console doctrine:migrations:migrate && bin/console doctrine:fixtures:load  && bin/console adapter:register-tasks ; php-fpm
EXPOSE 9000