FROM node:8.12.0-alpine as node

MAINTAINER Aali <ahmedali555@live.fr>

WORKDIR /app

COPY ../blog/package.json /app/

RUN npm install

COPY ../blog/ /app/

RUN npm run build --prod --aot

FROM php:7.1-apache

MAINTAINER Aali <ahmedali555@live.fr>
RUN apt update
RUN apt-get install -y vim git unzip libxml2-dev libldb-dev libldap2-dev libcurl3-dev zlib1g-dev libpng-dev
RUN docker-php-ext-install pdo pdo_mysql xml ldap curl zip gd
RUN a2enmod rewrite

WORKDIR /
RUN git clone https://github.com/wolfcw/libfaketime.git
WORKDIR /libfaketime/src
RUN make install

COPY ../conf/apache-config.conf /etc/apache2/sites-enabled/000-default.conf
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY ../api/ /var/www/default
COPY --from=node /app/dist/angular /var/www/default/public

EXPOSE 80

COPY ../conf/upgrade.sh /opt/upgrade.sh
WORKDIR /var/www/default

