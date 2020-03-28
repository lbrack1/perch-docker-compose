FROM php:7.4-fpm

RUN docker-php-ext-install pdo_mysql

# Install imagick
RUN apt-get update && apt-get install -y libmagickwand-dev --no-install-recommends && rm -rf /var/lib/apt/lists/*
RUN printf "\n" | pecl install imagick
RUN docker-php-ext-enable imagick

# Set up perch CMS
COPY setup_perch.sh /usr/local/bin/
RUN chmod 774 /usr/local/bin/setup_perch.sh

COPY config.php /var/www/perch/config/

RUN /usr/local/bin/setup_perch.sh
