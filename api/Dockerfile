FROM php:7.2

MAINTAINER AAli<ahmedali555@live.fr>

RUN apt update
RUN apt-get install -y vim git unzip libxml2-dev libldb-dev libldap2-dev libcurl3-dev zlib1g-dev libpng-dev

workdir /
RUN git clone https://github.com/wolfcw/libfaketime.git
workdir /libfaketime/src
RUN make install

RUN rm /etc/localtime
RUN ln -s /usr/share/zoneinfo/Europe/Paris /etc/localtime
RUN "date"

RUN docker-php-ext-install pdo pdo_mysql xml ldap curl zip gd 

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN usermod -u 1000 www-data

EXPOSE 8000

workdir /var/www/default

ENTRYPOINT [ "php","bin/console"]

