FROM php:7.1-apache

# Install PHP extensions
RUN apt-get update && apt-get install -y \
      libicu-dev \
      libpq-dev \
      libmcrypt-dev \
      mysql-client \
      ruby-full \
      zlib1g-dev \
    && rm -r /var/lib/apt/lists/* \
    && docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd \
    && docker-php-ext-install \
      intl \
      mbstring \
      mcrypt \
      mysqli \
      pcntl \
      pdo_mysql \
      zip \
      opcache

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer
RUN mkdir -p /var/www/.composer/cache && chmod 777 /var/www/.composer/cache

RUN echo "export PATH=$PATH\":$HOME/bin\"" >> /root/.bashrc

# Put apache config
COPY build/apache-vhost.conf /etc/apache2/sites-available/custom-vhost.conf
RUN a2dissite 000-default.conf && a2ensite custom-vhost.conf && a2enmod rewrite && a2enmod headers

# Change uid and gid of apache to docker user uid/gid
RUN usermod -u 1000 www-data && groupmod -g 1000 www-data

WORKDIR /var/www/html
