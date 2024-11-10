# Рабочий образ
FROM php:7.4-fpm

WORKDIR /var/www/

# Устанавливаем зависимости
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    unzip \
    git \
    libpq-dev \
    nano \
    libzip-dev \
    curl

RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && apt-get install -y nodejs;

RUN npm install -gy webpack webpack-cli;

# Чистим кеш APT
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Устанавливаем расширения PHP

#Необходимо сконфигурировать расширение pgsql перед установкой, поскольку в конейнере нет Postgres, конфигурируется с фейковым юзером
RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql1
RUN docker-php-ext-install pdo pdo_pgsql pgsql zip exif pcntl sockets

COPY --from=composer:2.3 /usr/bin/composer /usr/bin/composer

# Добавлям пользователя для приложения
RUN groupadd -g 1000 www && useradd -u 1000 -ms /bin/bash/ -g www www

ENTRYPOINT []
