FROM php:8.1-fpm-alpine

# Instalace závislostí pro PHP rozšíření
RUN apk add --no-cache \
    git \
    zip \
    unzip \
    libzip-dev \
    icu-dev \
    oniguruma-dev

# Instalace PHP rozšíření
RUN docker-php-ext-install \
    pdo_mysql \
    intl \
    zip \
    opcache

# Získání Composeru z oficiálního image (Best Practice)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Nastavení pracovního adresáře
WORKDIR /var/www/symfony

# Oprávnění (Volitelné, ale doporučené pro Linux uživatele, aby neměli root soubory)
# ARG PUID=1000
# ARG PGID=1000
# RUN apk add --no-cache shadow && \
#     groupmod -o -g ${PGID} www-data && \
#     usermod -o -u ${PUID} -g www-data www-data

CMD ["php-fpm"]
