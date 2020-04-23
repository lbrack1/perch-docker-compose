FROM php:7.0.33-fpm

RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install mysqli

# Install imagick
RUN apt-get update && apt-get install -y libmagickwand-dev --no-install-recommends && rm -rf /var/lib/apt/lists/*
RUN printf "\n" | pecl install imagick
RUN docker-php-ext-enable imagick

# Install vim
RUN apt-get update && apt-get install -y vim

COPY setup_perch.sh /usr/local/bin/
RUN chmod 774 /usr/local/bin/setup_perch.sh

RUN /usr/local/bin/setup_perch.sh