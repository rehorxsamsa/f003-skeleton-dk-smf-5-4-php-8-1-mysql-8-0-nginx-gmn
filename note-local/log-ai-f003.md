log-ai-f003
251212

# f003-skeleton-smf-5-4-php-8-1-mysql-8-0-gmn

251212 Pa

# .gitignore
díky skeleton pro symfony 5.2 funguje. Napiš pro tento projekt ještě .gitignore

Skvělé, že skeleton šlape. Správný .gitignore je pro takový setup (Docker wrapper + aplikace v podadresáři) trochu specifický, protože musíš ignorovat věci jak na úrovni rootu (Docker overrides), tak uvnitř Symfony.

Jelikož máš strukturu root -> app, máš dvě možnosti:

Mít jeden velký .gitignore v rootu.

Mít .gitignore v rootu pro Docker věci a nechat Symfony (ve složce app), ať si používá svůj vlastní .gitignore, který tam vytvořil Composer (Symfony Flex).

Jako senior doporučuji variantu 2 (zachovat .gitignore uvnitř app), ale v rootu mít .gitignore pro infrastrukturu. Je to čistší, protože když se rozhodneš přesunout aplikaci jinam, nevezmeš s ní i docker pravidla.

Zde je obsah pro ROOT .gitignore (umísti ho vedle docker-compose.yml):

```
###> Docker & Infrastructure ###
# Lokální overridy docker-compose (často se používá pro lokální porty nebo dev nastavení)
docker-compose.override.yml

# Pokud bys někdy dumpoval DB do rootu nebo mapoval data na hosta
/db_data/
*.sql
*.sql.gz

# SSL certifikáty (pokud bys generoval lokální certy pro HTTPS)
docker/nginx/certs/
*.pem
*.key

# Logy infrastruktury (pokud je nemapuješ dovnitř kontejneru)
/logs/
###< Docker & Infrastructure ###

###> IDE & Editors ###
# PhpStorm
.idea/

# VS Code
.vscode/

# Sublime / Atom / Others
*.sublime-project
*.sublime-workspace
*.swp
###< IDE & Editors ###

###> OS System Files ###
.DS_Store
Thumbs.db
###< OS System Files ###

###> Symfony Project Root (Exceptions) ###
# Pokud bys chtěl ignorovat celou složku app kromě composer.json (což asi nechceš), 
# sem by přišly pravidla. 
# Ale protože app/ má vlastní .gitignore, zde to necháme čisté.
###< Symfony Project Root ###
```

A pro kontrolu: .gitignore uvnitř složky app/
Symfony (Flex) by ho tam mělo vytvořit automaticky, 
ale pro jistotu zkontroluj, zda v app/.gitignore máš následující 
(upraveno pro verzi 5.x):

```
###> symfony/framework-bundle ###
/.env.local
/.env.local.php
/.env.*.local
/config/secrets/prod/prod.decrypt.private.php
/public/bundles/
/var/
/vendor/
###< symfony/framework-bundle ###

###> symfony/phpunit-bridge ###
.phpunit.result.cache
/phpunit.xml
###< symfony/phpunit-bridge ###

###> doctrine/doctrine-bundle ###
# Pokud používáš SQLite (pro testy)
/var/data.db
/var/data.db-journal
###< doctrine/doctrine-bundle ###
```
Proč takto odděleně?
Pokud bys měl vše v jednom root .gitignore, musel bys psát cesty jako app/vendor/, app/var/. Když pak app složku vezmeš a nasadíš ji někde bez Dockeru (nebo v CI/CD pipeline, která kouká jen do app), pravidla by přestala platit nebo by cesty neseděly.

Mám ti k tomu přihodit i Xdebug konfiguraci, jak jsem zmiňoval? U Symfony 5.x na PHP 8.1 je to docela "game changer" pro pohodlné ladění.




251211 Čt
 
## zadáním prompt
Jsi senior PHP a frameworku symfony programátor.

Napiš skeleton v docker pro Symfony verze 5.x s databázi mysql.

-------
Ahoj, jako seniorní vývojář to naprosto chápu. 
Pro Symfony 5.x (a vlastně i novější 6/7) 
je klíčové mít čisté, oddělené prostředí, 
které reflektuje produkční setup (PHP-FPM + Nginx).

Zde je robustní, "vývojářsky přívětivý" skeleton postavený 
- na PHP 8.1 
(ideální sweet-spot pro Symfony 5.4 LTS) 
- a MySQL 8.0.

Použijeme 
- Alpine Linux pro malé obrazy 
- a oddělíme konfiguraci webserveru a PHP.


## 1. Adresářová struktura
Nejdříve si připrav tuto strukturu složek. 
Udržujeme docker konfiguraci mimo kořen aplikace, 
- aby se to nemíchalo se zdrojovými kódy.
```
my-project/
├── docker/
│   ├── nginx/
│   │   └── default.conf
│   └── php/
│       └── Dockerfile
├── docker-compose.yml
└── app/   <-- Sem přijde samotné Symfony
```

## 2. Soubor docker-compose.yml
Tento soubor definuje služby. 
Všimni si definice `DATABASE_URL` 
– to nám ušetří práci s `.env` souborem v Symfony.

### docker-compose.yml
```
version: '3.8'

services:
  # --- PHP-FPM Service ---
  php:
    build:
      context: ./docker/php
    container_name: symfony_php
    volumes:
      - ./app:/var/www/symfony:cached
    depends_on:
      - database

  # --- Nginx Web Server ---
  nginx:
    image: nginx:alpine
    container_name: symfony_nginx
    ports:
      - "8080:80"
    volumes:
      - ./app:/var/www/symfony:ro
      - ./docker/nginx/default.conf:/etc/nginx/conf.d/default.conf:ro
    depends_on:
      - php

  # --- MySQL Database ---
  database:
    image: mysql:8.0
    container_name: symfony_db
    environment:
      MYSQL_ROOT_PASSWORD: root
      MYSQL_DATABASE: symfony_db
      MYSQL_USER: app_user
      MYSQL_PASSWORD: app_password
    ports:
      - "33060:3306" # Expose on a diff port to avoid conflict with local MySQL
    volumes:
      - db_data:/var/lib/mysql

volumes:
  db_data:
```

## 3. Konfigurace Nginx (docker/nginx/default.conf)
Standardní, optimalizovaný config pro Symfony. 
Důležité je správné nastavení `fastcgi_pass` na název služby `php`.


### docker/nginx/default.conf
```
server {
    listen 80;
    server_name localhost;
    root /var/www/symfony/public;

    location / {
        try_files $uri /index.php$is_args$args;
    }

    location ~ ^/index\.php(/|$) {
        fastcgi_pass php:9000;
        fastcgi_split_path_info ^(.+\.php)(/.*)$;
        include fastcgi_params;

        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        fastcgi_param DOCUMENT_ROOT $realpath_root;
        
        # Zvyseni bufferu pro vetsi Symfony debug hlavicky
        fastcgi_buffer_size 128k;
        fastcgi_buffers 4 256k;
        fastcgi_busy_buffers_size 256k;

        internal;
    }

    location ~ \.php$ {
        return 404;
    }

    error_log /var/log/nginx/project_error.log;
    access_log /var/log/nginx/project_access.log;
}
```

## 4. Dockerfile pro PHP (docker/php/Dockerfile)
Jako seniorní dev nechceš jen základ. 
Zde instalujeme důležité extenze 
- (Intl, PDO MySQL, Zip, Opcache) 

a hlavně *Composer*. 
Používáme *multi-stage build* pro získání Composeru, 
- což je čistší řešení.

### docker/php/Dockerfile
```
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
```

## 5. Jak to spustit a nainstalovat Symfony
Nyní máme infrastrukturu. Musíme do ní dostat kód.

### 1. Spusť kontejnery:
```
docker-compose up -d --build
```

### 2. Nainstaluj Symfony Skeleton 
(pokud je složka app prázdná): 
Vstoupíme do kontejneru a vytvoříme projekt.
```
docker-compose exec php composer create-project symfony/skeleton:"5.4.*" .
# Nebo pro plnou web aplikaci:
# docker-compose exec php composer create-project symfony/website-skeleton:"5.4.*" .
```

### 3. Připojení k databázi: 
Protože jsme v docker-compose.yml definovali služby, 
v `.env` souboru uvnitř Symfony 
- (nebo lépe v `env.local`) 
bys měl použít tento connection string:

Fragment kódu
```
DATABASE_URL="mysql://app_user:app_password@database:3306/symfony_db?serverVersion=8.0&charset=utf8mb4"
```
Poznámka: 
Hostname je database (název služby), nikoliv localhost.


### 4. Ověření: 
Otevři prohlížeč na http://localhost:8080. 
Měl bys vidět uvítací stránku Symfony.


## Co jsem přidal "navíc" pro senioritu:

### Cached Volumes: 
V docker-compose u PHP služby používám: `cached volume`. 
Na macOS to dramaticky zrychluje odezvu filesystému.

### Buffer Size v Nginx: 
Symfony v DEV módu posílá obrovské HTTP hlavičky (DebugBar), 
což defaultní Nginx často shodí (502 Bad Gateway). 
Zvýšení bufferů tomu předejde.

### Separátní port pro DB: 
33060 na hostu, aby se to nebilo s tvou lokální instalací MySQL.


## Co to je Makefile

Makefile je přesně ten nástroj, který odděluje "klikání" docker příkazů od efektivní práce. 
Ušetří ti tisíce úhozů do klávesnice.

Tento Makefile vytvoř v kořenovém adresáři 
(vedle docker-compose.yml).

Makefile
Je navržen tak, aby automaticky detekoval, jestli běží kontejnery, 
a zjednodušil práci s konzolí Symfony i Composerem.


### Makefile
```
# Názvy služeb v docker-compose
DC = docker-compose
PHP_CONTAINER = php
DB_CONTAINER = database

.PHONY: help up down restart build logs bash console composer cc db-diff db-migrate tests

# --- Základní ovládání ---

help: ## Vypíše tento seznam příkazů
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'

up: ## Spustí kontejnery na pozadí
	$(DC) up -d

down: ## Zastaví a odstraní kontejnery
	$(DC) down

restart: down up ## Restartuje celou aplikaci

build: ## Sestaví kontejnery (force build)
	$(DC) build --no-cache

logs: ## Zobrazí logy (follow mode)
	$(DC) logs -f

# --- Vývojářské nástroje ---

bash: ## Připojí se do shellu PHP kontejneru (Alpine používá sh)
	$(DC) exec $(PHP_CONTAINER) sh

console: ## Spustí Symfony Console (použití: make console c="cache:clear")
ifdef c
	$(DC) exec $(PHP_CONTAINER) php bin/console $(c)
else
	@echo "Chyba: Musíš specifikovat příkaz. Příklad: make console c=cache:clear"
endif

composer: ## Spustí Composer (použití: make composer c="req symfony/orm-pack")
ifdef c
	$(DC) exec $(PHP_CONTAINER) composer $(c)
else
	@echo "Chyba: Musíš specifikovat příkaz. Příklad: make composer c='install'"
endif

# --- Časté zkratky ---

cc: ## Rychlé vymazání cache
	$(DC) exec $(PHP_CONTAINER) php bin/console cache:clear

db-diff: ## Vytvoří novou migraci na základě změn v entitách
	$(DC) exec $(PHP_CONTAINER) php bin/console make:migration

db-migrate: ## Provede migrace do databáze
	$(DC) exec $(PHP_CONTAINER) php bin/console doctrine:migrations:migrate --no-interaction

tests: ## Spustí PHPUnit testy
	$(DC) exec $(PHP_CONTAINER) php bin/phpunit
```

## Jak to používat jako senior
Díky tomuto souboru se tvůj workflow zjednoduší na tato krátká volání:

### 1. Start projektu:
```
make up
```

### 2. Instalace závislostí (pokud jsi právě stáhl repo):
```
make composer c=install
```
### 3. Symfony příkazy: 
Místo dlouhého docker-compose exec php php bin/console make:controller napíšeš jen:
```
make console c="make:controller"
```
Poznámka: Uvozovky jsou nutné, pokud příkaz obsahuje mezery nebo speciální znaky.

### 4. Databáze: Když upravíš entitu, jen zavoláš:
```
make db-diff
make db-migrate
```

### 5. Vstup do kontejneru: Když potřebuješ prozkoumat soubory uvnitř:
```
make bash
```
Tip pro pokročilé
Pokud používáš Linux (Ubuntu/Debian) 
a máš problémy s oprávněními 
(soubory vytvořené dockerem patří root), 
můžeš do sekce up přidat export UID. 
Ale v tomto Docker setupu jsme to nechali jednoduché. 
Pokud by tě to trápilo, stačí říct a upravíme Dockerfile pro mapping user ID.

Mám připravit i konfiguraci pro Xdebug 3, 
abys mohl krokovat kód přímo v IDE přes Docker?