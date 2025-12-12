# log-cli-f003


# 251212

921
q@ltd23:~/projects/f003-skeleton-dk-smf-5-4-php-8-1-mysql-8-0-nginx-gmn$ docker-compose up -d --build
WARN[0000] /home/q/projects/f003-skeleton-dk-smf-5-4-php-8-1-mysql-8-0-nginx-gmn/docker-compose.yml: the attribute `version` is obsolete, it will be ignored, please remove it to avoid potential confusion
[+] Building 1.6s (13/13) FINISHED
 => [internal] load local bake definitions                                                                         0.0s
 => => reading from stdin 691B                                                                                     0.0s
 => [internal] load build definition from Dockerfile                                                               0.0s
 => => transferring dockerfile: 781B                                                                               0.0s
 => [internal] load metadata for docker.io/library/composer:2                                                      0.7s
 => [internal] load metadata for docker.io/library/php:8.1-fpm-alpine                                              0.7s
 => [internal] load .dockerignore                                                                                  0.0s
 => => transferring context: 2B                                                                                    0.0s
 => [stage-0 1/5] FROM docker.io/library/php:8.1-fpm-alpine@sha256:16e30a08fa5ffca9238bd6b5e02abd6a2931f3e449e8b7  0.1s
 => => resolve docker.io/library/php:8.1-fpm-alpine@sha256:16e30a08fa5ffca9238bd6b5e02abd6a2931f3e449e8b71994dce2  0.0s
 => FROM docker.io/library/composer:2@sha256:8b4d59fde3bd505c5fef70c9f8d5c05e92af811fed037dad12869b373925ed31      0.1s
 => => resolve docker.io/library/composer:2@sha256:8b4d59fde3bd505c5fef70c9f8d5c05e92af811fed037dad12869b373925ed  0.1s
 => CACHED [stage-0 2/5] RUN apk add --no-cache     git     zip     unzip     libzip-dev     icu-dev     onigurum  0.0s
 => CACHED [stage-0 3/5] RUN docker-php-ext-install     pdo_mysql     intl     zip     opcache                     0.0s
 => CACHED [stage-0 4/5] COPY --from=composer:2 /usr/bin/composer /usr/bin/composer                                0.0s
 => CACHED [stage-0 5/5] WORKDIR /var/www/symfony                                                                  0.0s
 => exporting to image                                                                                             0.2s
 => => exporting layers                                                                                            0.0s
 => => exporting manifest sha256:5469f90f12df93b5e904b0637c5e9d61b71bb0d9f110d264aeada2e72e8e9b76                  0.0s
 => => exporting config sha256:0d0b60436f92d830834736b794e464806b1c45f9dd0825eb26d8edaebbf35f7f                    0.0s
 => => exporting attestation manifest sha256:2cd115e2205df6dd440b2513d19dcf4db0009525b17a30d8508d2e63333b9934      0.0s
 => => exporting manifest list sha256:085e35289c6317253f95c58f91f49ad23d22a9c9ea18848c2fc9196a457cec46             0.0s
 => => naming to docker.io/library/f003-skeleton-dk-smf-5-4-php-8-1-mysql-8-0-nginx-gmn-php:latest                 0.0s
 => => unpacking to docker.io/library/f003-skeleton-dk-smf-5-4-php-8-1-mysql-8-0-nginx-gmn-php:latest              0.0s
 => resolving provenance for metadata file                                                                         0.0s
[+] Running 4/4
 ✔ f003-skeleton-dk-smf-5-4-php-8-1-mysql-8-0-nginx-gmn-php  Built                                                 0.0s
 ✔ Container symfony_db-f003                                 Started                                               1.0s
 ✔ Container symfony_php-f003                                Started                                               1.2s
 ✔ Container symfony_nginx-f003                              Started 

 925
 q@ltd23:~/projects/f003-skeleton-dk-smf-5-4-php-8-1-mysql-8-0-nginx-gmn$ docker-compose exec php composer create-project symfony/website-skeleton:"5.4.*" .
WARN[0000] /home/q/projects/f003-skeleton-dk-smf-5-4-php-8-1-mysql-8-0-nginx-gmn/docker-compose.yml: the attribute `version` is obsolete, it will be ignored, please remove it to avoid potential confusion
Creating a "symfony/website-skeleton:5.4.*" project at "./"
Installing symfony/website-skeleton (v5.4.99)
  - Downloading symfony/website-skeleton (v5.4.99)
  - Installing symfony/website-skeleton (v5.4.99): Extracting archive
Created project in /var/www/symfony/.
Loading composer repositories with package information
Updating dependencies
Lock file operations: 1 install, 0 updates, 0 removals
  - Locking symfony/flex (v2.10.0)
Writing lock file
Installing dependencies from lock file (including require-dev)
Package operations: 1 install, 0 updates, 0 removals
  - Downloading symfony/flex (v2.10.0)
  - Installing symfony/flex (v2.10.0): Extracting archive
Generating optimized autoload files
1 package you are using is looking for funding.
Use the `composer fund` command to find out more!

Run composer recipes at any time to see the status of your Symfony recipes.

Loading composer repositories with package information
Restricting packages listed in "symfony/symfony" to "5.4.*"
Updating dependencies
Lock file operations: 134 installs, 0 updates, 0 removals
  - Locking doctrine/cache (2.2.0)
  - Locking doctrine/collections (2.4.0)
  - Locking doctrine/dbal (4.2.5)
  - Locking doctrine/deprecations (1.1.5)
  - Locking doctrine/doctrine-bundle (2.13.3)
  - Locking doctrine/doctrine-migrations-bundle (3.7.0)
  - Locking doctrine/event-manager (1.2.0)
  - Locking doctrine/inflector (2.1.0)
  - Locking doctrine/instantiator (2.0.0)
  - Locking doctrine/lexer (3.0.1)
  - Locking doctrine/migrations (3.9.5)
  - Locking doctrine/orm (3.5.8)
  - Locking doctrine/persistence (3.4.3)
  - Locking doctrine/sql-formatter (1.5.3)
  - Locking egulias/email-validator (4.0.4)
  - Locking monolog/monolog (2.10.0)
  - Locking myclabs/deep-copy (1.13.4)
  - Locking nikic/php-parser (v4.19.5)
  - Locking phar-io/manifest (2.0.4)
  - Locking phar-io/version (3.2.1)
  - Locking phpdocumentor/reflection-common (2.2.0)
  - Locking phpdocumentor/reflection-docblock (5.6.5)
  - Locking phpdocumentor/type-resolver (1.12.0)
  - Locking phpstan/phpdoc-parser (2.3.0)
  - Locking phpunit/php-code-coverage (9.2.32)
  - Locking phpunit/php-file-iterator (3.0.6)
  - Locking phpunit/php-invoker (3.1.1)
  - Locking phpunit/php-text-template (2.0.4)
  - Locking phpunit/php-timer (5.0.3)
  - Locking phpunit/phpunit (9.6.31)
  - Locking psr/cache (2.0.0)
  - Locking psr/container (1.1.2)
  - Locking psr/event-dispatcher (1.0.0)
  - Locking psr/link (1.1.1)
  - Locking psr/log (2.0.0)
  - Locking sebastian/cli-parser (1.0.2)
  - Locking sebastian/code-unit (1.0.8)
  - Locking sebastian/code-unit-reverse-lookup (2.0.3)
  - Locking sebastian/comparator (4.0.9)
  - Locking sebastian/complexity (2.0.3)
  - Locking sebastian/diff (4.0.6)
  - Locking sebastian/environment (5.1.5)
  - Locking sebastian/exporter (4.0.8)
  - Locking sebastian/global-state (5.0.8)
  - Locking sebastian/lines-of-code (1.0.4)
  - Locking sebastian/object-enumerator (4.0.4)
  - Locking sebastian/object-reflector (2.0.4)
  - Locking sebastian/recursion-context (4.0.6)
  - Locking sebastian/resource-operations (3.0.4)
  - Locking sebastian/type (3.2.1)
  - Locking sebastian/version (3.0.2)
  - Locking symfony/amqp-messenger (v5.4.45)
  - Locking symfony/asset (v5.4.45)
  - Locking symfony/browser-kit (v5.4.45)
  - Locking symfony/cache (v5.4.46)
  - Locking symfony/cache-contracts (v2.5.4)
  - Locking symfony/config (v5.4.46)
  - Locking symfony/console (v5.4.47)
  - Locking symfony/css-selector (v5.4.45)
  - Locking symfony/debug-bundle (v5.4.45)
  - Locking symfony/debug-pack (v1.1.0)
  - Locking symfony/dependency-injection (v5.4.48)
  - Locking symfony/deprecation-contracts (v3.6.0)
  - Locking symfony/doctrine-bridge (v5.4.48)
  - Locking symfony/doctrine-messenger (v5.4.45)
  - Locking symfony/dom-crawler (v5.4.48)
  - Locking symfony/dotenv (v5.4.48)
  - Locking symfony/error-handler (v5.4.46)
  - Locking symfony/event-dispatcher (v5.4.45)
  - Locking symfony/event-dispatcher-contracts (v3.6.0)
  - Locking symfony/expression-language (v5.4.45)
  - Locking symfony/filesystem (v5.4.45)
  - Locking symfony/finder (v5.4.45)
  - Locking symfony/form (v5.4.45)
  - Locking symfony/framework-bundle (v5.4.45)
  - Locking symfony/http-client (v5.4.49)
  - Locking symfony/http-client-contracts (v2.5.5)
  - Locking symfony/http-foundation (v5.4.50)
  - Locking symfony/http-kernel (v5.4.50)
  - Locking symfony/intl (v5.4.47)
  - Locking symfony/mailer (v5.4.45)
  - Locking symfony/maker-bundle (v1.50.0)
  - Locking symfony/messenger (v5.4.45)
  - Locking symfony/mime (v5.4.45)
  - Locking symfony/monolog-bridge (v5.4.45)
  - Locking symfony/monolog-bundle (v3.10.0)
  - Locking symfony/notifier (v5.4.45)
  - Locking symfony/options-resolver (v5.4.45)
  - Locking symfony/orm-pack (v2.5.0)
  - Locking symfony/password-hasher (v5.4.45)
  - Locking symfony/phpunit-bridge (v8.0.0)
  - Locking symfony/polyfill-intl-grapheme (v1.33.0)
  - Locking symfony/polyfill-intl-icu (v1.33.0)
  - Locking symfony/polyfill-intl-idn (v1.33.0)
  - Locking symfony/polyfill-intl-normalizer (v1.33.0)
  - Locking symfony/polyfill-mbstring (v1.33.0)
  - Locking symfony/polyfill-php73 (v1.33.0)
  - Locking symfony/polyfill-php80 (v1.33.0)
  - Locking symfony/polyfill-php81 (v1.33.0)
  - Locking symfony/polyfill-php84 (v1.33.0)
  - Locking symfony/process (v5.4.47)
  - Locking symfony/profiler-pack (v1.0.6)
  - Locking symfony/property-access (v5.4.45)
  - Locking symfony/property-info (v5.4.48)
  - Locking symfony/redis-messenger (v5.4.48)
  - Locking symfony/routing (v5.4.48)
  - Locking symfony/runtime (v5.4.46)
  - Locking symfony/security-bundle (v5.4.45)
  - Locking symfony/security-core (v5.4.48)
  - Locking symfony/security-csrf (v5.4.45)
  - Locking symfony/security-guard (v5.4.45)
  - Locking symfony/security-http (v5.4.47)
  - Locking symfony/serializer (v5.4.45)
  - Locking symfony/serializer-pack (v1.3.0)
  - Locking symfony/service-contracts (v2.5.4)
  - Locking symfony/stopwatch (v5.4.45)
  - Locking symfony/string (v5.4.47)
  - Locking symfony/test-pack (v1.1.0)
  - Locking symfony/translation (v5.4.45)
  - Locking symfony/translation-contracts (v2.5.4)
  - Locking symfony/twig-bridge (v5.4.48)
  - Locking symfony/twig-bundle (v5.4.45)
  - Locking symfony/twig-pack (v1.0.1)
  - Locking symfony/validator (v5.4.48)
  - Locking symfony/var-dumper (v5.4.48)
  - Locking symfony/var-exporter (v6.4.26)
  - Locking symfony/web-link (v5.4.45)
  - Locking symfony/web-profiler-bundle (v5.4.48)
  - Locking symfony/webapp-pack (v1.2.0)
  - Locking symfony/yaml (v5.4.45)
  - Locking theseer/tokenizer (1.3.1)
  - Locking twig/extra-bundle (v3.22.1)
  - Locking twig/twig (v3.22.1)
  - Locking webmozart/assert (1.12.1)
Writing lock file
Installing dependencies from lock file (including require-dev)
Package operations: 134 installs, 0 updates, 0 removals
  - Downloading symfony/polyfill-php80 (v1.33.0)
  - Downloading symfony/runtime (v5.4.46)
  - Downloading doctrine/cache (2.2.0)
  - Downloading symfony/deprecation-contracts (v3.6.0)
  - Downloading symfony/routing (v5.4.48)
  - Downloading symfony/polyfill-php81 (v1.33.0)
  - Downloading symfony/polyfill-mbstring (v1.33.0)
  - Downloading symfony/polyfill-php73 (v1.33.0)
  - Downloading symfony/http-foundation (v5.4.50)
  - Downloading psr/event-dispatcher (1.0.0)
  - Downloading symfony/event-dispatcher-contracts (v3.6.0)
  - Downloading symfony/event-dispatcher (v5.4.45)
  - Downloading symfony/var-dumper (v5.4.48)
  - Downloading psr/log (2.0.0)
  - Downloading symfony/error-handler (v5.4.46)
  - Downloading symfony/http-kernel (v5.4.50)
  - Downloading symfony/finder (v5.4.45)
  - Downloading symfony/filesystem (v5.4.45)
  - Downloading psr/container (1.1.2)
  - Downloading symfony/service-contracts (v2.5.4)
  - Downloading symfony/dependency-injection (v5.4.48)
  - Downloading symfony/config (v5.4.46)
  - Downloading symfony/var-exporter (v6.4.26)
  - Downloading psr/cache (2.0.0)
  - Downloading symfony/cache-contracts (v2.5.4)
  - Downloading symfony/cache (v5.4.46)
  - Downloading symfony/framework-bundle (v5.4.45)
  - Downloading symfony/stopwatch (v5.4.45)
  - Downloading symfony/polyfill-intl-normalizer (v1.33.0)
  - Downloading symfony/polyfill-intl-grapheme (v1.33.0)
  - Downloading symfony/string (v5.4.47)
  - Downloading symfony/console (v5.4.47)
  - Downloading doctrine/deprecations (1.1.5)
  - Downloading doctrine/event-manager (1.2.0)
  - Downloading doctrine/dbal (4.2.5)
  - Downloading doctrine/migrations (3.9.5)
  - Downloading doctrine/persistence (3.4.3)
  - Downloading symfony/doctrine-bridge (v5.4.48)
  - Downloading doctrine/sql-formatter (1.5.3)
  - Downloading doctrine/doctrine-bundle (2.13.3)
  - Downloading doctrine/doctrine-migrations-bundle (3.7.0)
  - Downloading doctrine/lexer (3.0.1)
  - Downloading doctrine/instantiator (2.0.0)
  - Downloading doctrine/inflector (2.1.0)
  - Downloading symfony/polyfill-php84 (v1.33.0)
  - Downloading doctrine/collections (2.4.0)
  - Downloading doctrine/orm (3.5.8)
  - Downloading symfony/polyfill-intl-idn (v1.33.0)
  - Downloading egulias/email-validator (4.0.4)
  - Downloading webmozart/assert (1.12.1)
  - Downloading phpstan/phpdoc-parser (2.3.0)
  - Downloading phpdocumentor/reflection-common (2.2.0)
  - Downloading phpdocumentor/type-resolver (1.12.0)
  - Downloading phpdocumentor/reflection-docblock (5.6.5)
  - Downloading sebastian/version (3.0.2)
  - Downloading sebastian/type (3.2.1)
  - Downloading sebastian/resource-operations (3.0.4)
  - Downloading sebastian/recursion-context (4.0.6)
  - Downloading sebastian/object-reflector (2.0.4)
  - Downloading sebastian/object-enumerator (4.0.4)
  - Downloading sebastian/global-state (5.0.8)
  - Downloading sebastian/exporter (4.0.8)
  - Downloading sebastian/environment (5.1.5)
  - Downloading sebastian/diff (4.0.6)
  - Downloading sebastian/comparator (4.0.9)
  - Downloading sebastian/code-unit (1.0.8)
  - Downloading sebastian/cli-parser (1.0.2)
  - Downloading phpunit/php-timer (5.0.3)
  - Downloading phpunit/php-text-template (2.0.4)
  - Downloading phpunit/php-invoker (3.1.1)
  - Downloading phpunit/php-file-iterator (3.0.6)
  - Downloading theseer/tokenizer (1.3.1)
  - Downloading nikic/php-parser (v4.19.5)
  - Downloading sebastian/lines-of-code (1.0.4)
  - Downloading sebastian/complexity (2.0.3)
  - Downloading sebastian/code-unit-reverse-lookup (2.0.3)
  - Downloading phpunit/php-code-coverage (9.2.32)
  - Downloading phar-io/version (3.2.1)
  - Downloading phar-io/manifest (2.0.4)
  - Downloading myclabs/deep-copy (1.13.4)
  - Downloading phpunit/phpunit (9.6.31)
  - Downloading psr/link (1.1.1)
  - Downloading symfony/messenger (v5.4.45)
  - Downloading symfony/redis-messenger (v5.4.48)
  - Downloading symfony/doctrine-messenger (v5.4.45)
  - Downloading symfony/amqp-messenger (v5.4.45)
  - Downloading symfony/dom-crawler (v5.4.48)
  - Downloading symfony/browser-kit (v5.4.45)
  - Downloading symfony/css-selector (v5.4.45)
  - Downloading twig/twig (v3.22.1)
  - Downloading symfony/translation-contracts (v2.5.4)
  - Downloading symfony/twig-bridge (v5.4.48)
  - Downloading symfony/debug-bundle (v5.4.45)
  - Downloading symfony/dotenv (v5.4.48)
  - Downloading symfony/http-client-contracts (v2.5.5)
  - Downloading monolog/monolog (2.10.0)
  - Downloading symfony/monolog-bridge (v5.4.45)
  - Downloading symfony/options-resolver (v5.4.45)
  - Downloading symfony/password-hasher (v5.4.45)
  - Downloading symfony/phpunit-bridge (v8.0.0)
  - Downloading symfony/polyfill-intl-icu (v1.33.0)
  - Downloading symfony/property-info (v5.4.48)
  - Downloading symfony/security-core (v5.4.48)
  - Downloading symfony/security-csrf (v5.4.45)
  - Downloading symfony/property-access (v5.4.45)
  - Downloading symfony/security-http (v5.4.47)
  - Downloading symfony/security-guard (v5.4.45)
  - Downloading symfony/serializer (v5.4.45)
  - Downloading symfony/twig-bundle (v5.4.45)
  - Downloading symfony/web-profiler-bundle (v5.4.48)
  - Downloading symfony/web-link (v5.4.45)
  - Downloading symfony/validator (v5.4.48)
  - Downloading twig/extra-bundle (v3.22.1)
  - Downloading symfony/translation (v5.4.45)
  - Downloading symfony/security-bundle (v5.4.45)
  - Downloading symfony/process (v5.4.47)
  - Downloading symfony/notifier (v5.4.45)
  - Downloading symfony/monolog-bundle (v3.10.0)
  - Downloading symfony/mime (v5.4.45)
  - Downloading symfony/maker-bundle (v1.50.0)
  - Downloading symfony/mailer (v5.4.45)
  - Downloading symfony/intl (v5.4.47)
  - Downloading symfony/http-client (v5.4.49)
  - Downloading symfony/form (v5.4.45)
  - Downloading symfony/expression-language (v5.4.45)
  - Downloading symfony/asset (v5.4.45)
  - Downloading symfony/yaml (v5.4.45)
  - Installing symfony/polyfill-php80 (v1.33.0): Extracting archive
  - Installing symfony/runtime (v5.4.46): Extracting archive
  - Installing doctrine/cache (2.2.0): Extracting archive
  - Installing symfony/deprecation-contracts (v3.6.0): Extracting archive
  - Installing symfony/routing (v5.4.48): Extracting archive
  - Installing symfony/polyfill-php81 (v1.33.0): Extracting archive
  - Installing symfony/polyfill-mbstring (v1.33.0): Extracting archive
  - Installing symfony/polyfill-php73 (v1.33.0): Extracting archive
  - Installing symfony/http-foundation (v5.4.50): Extracting archive
  - Installing psr/event-dispatcher (1.0.0): Extracting archive
  - Installing symfony/event-dispatcher-contracts (v3.6.0): Extracting archive
  - Installing symfony/event-dispatcher (v5.4.45): Extracting archive
  - Installing symfony/var-dumper (v5.4.48): Extracting archive
  - Installing psr/log (2.0.0): Extracting archive
  - Installing symfony/error-handler (v5.4.46): Extracting archive
  - Installing symfony/http-kernel (v5.4.50): Extracting archive
  - Installing symfony/finder (v5.4.45): Extracting archive
  - Installing symfony/filesystem (v5.4.45): Extracting archive
  - Installing psr/container (1.1.2): Extracting archive
  - Installing symfony/service-contracts (v2.5.4): Extracting archive
  - Installing symfony/dependency-injection (v5.4.48): Extracting archive
  - Installing symfony/config (v5.4.46): Extracting archive
  - Installing symfony/var-exporter (v6.4.26): Extracting archive
  - Installing psr/cache (2.0.0): Extracting archive
  - Installing symfony/cache-contracts (v2.5.4): Extracting archive
  - Installing symfony/cache (v5.4.46): Extracting archive
  - Installing symfony/framework-bundle (v5.4.45): Extracting archive
  - Installing symfony/stopwatch (v5.4.45): Extracting archive
  - Installing symfony/polyfill-intl-normalizer (v1.33.0): Extracting archive
  - Installing symfony/polyfill-intl-grapheme (v1.33.0): Extracting archive
  - Installing symfony/string (v5.4.47): Extracting archive
  - Installing symfony/console (v5.4.47): Extracting archive
  - Installing doctrine/deprecations (1.1.5): Extracting archive
  - Installing doctrine/event-manager (1.2.0): Extracting archive
  - Installing doctrine/dbal (4.2.5): Extracting archive
  - Installing doctrine/migrations (3.9.5): Extracting archive
  - Installing doctrine/persistence (3.4.3): Extracting archive
  - Installing symfony/doctrine-bridge (v5.4.48): Extracting archive
  - Installing doctrine/sql-formatter (1.5.3): Extracting archive
  - Installing doctrine/doctrine-bundle (2.13.3): Extracting archive
  - Installing doctrine/doctrine-migrations-bundle (3.7.0): Extracting archive
  - Installing doctrine/lexer (3.0.1): Extracting archive
  - Installing doctrine/instantiator (2.0.0): Extracting archive
  - Installing doctrine/inflector (2.1.0): Extracting archive
  - Installing symfony/polyfill-php84 (v1.33.0): Extracting archive
  - Installing doctrine/collections (2.4.0): Extracting archive
  - Installing doctrine/orm (3.5.8): Extracting archive
  - Installing symfony/polyfill-intl-idn (v1.33.0): Extracting archive
  - Installing egulias/email-validator (4.0.4): Extracting archive
  - Installing webmozart/assert (1.12.1): Extracting archive
  - Installing phpstan/phpdoc-parser (2.3.0): Extracting archive
  - Installing phpdocumentor/reflection-common (2.2.0): Extracting archive
  - Installing phpdocumentor/type-resolver (1.12.0): Extracting archive
  - Installing phpdocumentor/reflection-docblock (5.6.5): Extracting archive
  - Installing sebastian/version (3.0.2): Extracting archive
  - Installing sebastian/type (3.2.1): Extracting archive
  - Installing sebastian/resource-operations (3.0.4): Extracting archive
  - Installing sebastian/recursion-context (4.0.6): Extracting archive
  - Installing sebastian/object-reflector (2.0.4): Extracting archive
  - Installing sebastian/object-enumerator (4.0.4): Extracting archive
  - Installing sebastian/global-state (5.0.8): Extracting archive
  - Installing sebastian/exporter (4.0.8): Extracting archive
  - Installing sebastian/environment (5.1.5): Extracting archive
  - Installing sebastian/diff (4.0.6): Extracting archive
  - Installing sebastian/comparator (4.0.9): Extracting archive
  - Installing sebastian/code-unit (1.0.8): Extracting archive
  - Installing sebastian/cli-parser (1.0.2): Extracting archive
  - Installing phpunit/php-timer (5.0.3): Extracting archive
  - Installing phpunit/php-text-template (2.0.4): Extracting archive
  - Installing phpunit/php-invoker (3.1.1): Extracting archive
  - Installing phpunit/php-file-iterator (3.0.6): Extracting archive
  - Installing theseer/tokenizer (1.3.1): Extracting archive
  - Installing nikic/php-parser (v4.19.5): Extracting archive
  - Installing sebastian/lines-of-code (1.0.4): Extracting archive
  - Installing sebastian/complexity (2.0.3): Extracting archive
  - Installing sebastian/code-unit-reverse-lookup (2.0.3): Extracting archive
  - Installing phpunit/php-code-coverage (9.2.32): Extracting archive
  - Installing phar-io/version (3.2.1): Extracting archive
  - Installing phar-io/manifest (2.0.4): Extracting archive
  - Installing myclabs/deep-copy (1.13.4): Extracting archive
  - Installing phpunit/phpunit (9.6.31): Extracting archive
  - Installing psr/link (1.1.1): Extracting archive
  - Installing symfony/messenger (v5.4.45): Extracting archive
  - Installing symfony/redis-messenger (v5.4.48): Extracting archive
  - Installing symfony/doctrine-messenger (v5.4.45): Extracting archive
  - Installing symfony/amqp-messenger (v5.4.45): Extracting archive
  - Installing symfony/dom-crawler (v5.4.48): Extracting archive
  - Installing symfony/browser-kit (v5.4.45): Extracting archive
  - Installing symfony/css-selector (v5.4.45): Extracting archive
  - Installing twig/twig (v3.22.1): Extracting archive
  - Installing symfony/translation-contracts (v2.5.4): Extracting archive
  - Installing symfony/twig-bridge (v5.4.48): Extracting archive
  - Installing symfony/debug-bundle (v5.4.45): Extracting archive
  - Installing symfony/dotenv (v5.4.48): Extracting archive
  - Installing symfony/http-client-contracts (v2.5.5): Extracting archive
  - Installing monolog/monolog (2.10.0): Extracting archive
  - Installing symfony/monolog-bridge (v5.4.45): Extracting archive
  - Installing symfony/options-resolver (v5.4.45): Extracting archive
  - Installing symfony/password-hasher (v5.4.45): Extracting archive
  - Installing symfony/phpunit-bridge (v8.0.0): Extracting archive
  - Installing symfony/polyfill-intl-icu (v1.33.0): Extracting archive
  - Installing symfony/property-info (v5.4.48): Extracting archive
  - Installing symfony/security-core (v5.4.48): Extracting archive
  - Installing symfony/security-csrf (v5.4.45): Extracting archive
  - Installing symfony/property-access (v5.4.45): Extracting archive
  - Installing symfony/security-http (v5.4.47): Extracting archive
  - Installing symfony/security-guard (v5.4.45): Extracting archive
  - Installing symfony/serializer (v5.4.45): Extracting archive
  - Installing symfony/twig-bundle (v5.4.45): Extracting archive
  - Installing symfony/web-profiler-bundle (v5.4.48): Extracting archive
  - Installing symfony/web-link (v5.4.45): Extracting archive
  - Installing symfony/validator (v5.4.48): Extracting archive
  - Installing twig/extra-bundle (v3.22.1): Extracting archive
  - Installing symfony/twig-pack (v1.0.1)
  - Installing symfony/translation (v5.4.45): Extracting archive
  - Installing symfony/test-pack (v1.1.0)
  - Installing symfony/serializer-pack (v1.3.0)
  - Installing symfony/security-bundle (v5.4.45): Extracting archive
  - Installing symfony/profiler-pack (v1.0.6)
  - Installing symfony/process (v5.4.47): Extracting archive
  - Installing symfony/orm-pack (v2.5.0)
  - Installing symfony/notifier (v5.4.45): Extracting archive
  - Installing symfony/monolog-bundle (v3.10.0): Extracting archive
  - Installing symfony/mime (v5.4.45): Extracting archive
  - Installing symfony/maker-bundle (v1.50.0): Extracting archive
  - Installing symfony/mailer (v5.4.45): Extracting archive
  - Installing symfony/intl (v5.4.47): Extracting archive
  - Installing symfony/http-client (v5.4.49): Extracting archive
  - Installing symfony/form (v5.4.45): Extracting archive
  - Installing symfony/expression-language (v5.4.45): Extracting archive
  - Installing symfony/debug-pack (v1.1.0)
  - Installing symfony/asset (v5.4.45): Extracting archive
  - Installing symfony/webapp-pack (v1.2.0)
  - Installing symfony/yaml (v5.4.45): Extracting archive
Package doctrine/cache is abandoned, you should avoid using it. No replacement was suggested.
Generating optimized autoload files
120 packages you are using are looking for funding.
Use the `composer fund` command to find out more!

Symfony operations: 22 recipes (d28a52febe3d6ab2b74f7be930577fb0)
  - Configuring symfony/flex (>=2.4): From github.com/symfony/recipes:main
  - Configuring symfony/webapp-pack (>=1.0): From github.com/symfony/recipes:main
  - Configuring symfony/framework-bundle (>=5.4): From github.com/symfony/recipes:main
  - Configuring symfony/routing (>=5.3): From github.com/symfony/recipes:main
  - Configuring symfony/console (>=5.3): From github.com/symfony/recipes:main
  - Configuring doctrine/deprecations (>=1.0): From github.com/symfony/recipes:main
  - Configuring doctrine/doctrine-bundle (>=2.4): From github.com/symfony/recipes:main
  -  WARNING  doctrine/doctrine-bundle (>=2.4): From github.com/symfony/recipes:main
    The recipe for this package contains some Docker configuration.

    This may create/update compose.yaml or update Dockerfile (if it exists).

    Do you want to include Docker configuration from recipes?
    [y] Yes
    [n] No
    [p] Yes permanently, never ask again for this project
    [x] No permanently, never ask again for this project
    (defaults to y): y
  - Configuring doctrine/doctrine-migrations-bundle (>=3.1): From github.com/symfony/recipes:main
  - Configuring phpunit/phpunit (>=9.6): From github.com/symfony/recipes:main
  - Configuring symfony/messenger (>=5.4): From github.com/symfony/recipes:main
  - Configuring symfony/debug-bundle (>=5.3): From github.com/symfony/recipes:main
  - Configuring symfony/phpunit-bridge (>=6.3): From github.com/symfony/recipes:main
  - Configuring symfony/twig-bundle (>=5.4): From github.com/symfony/recipes:main
  - Configuring symfony/web-profiler-bundle (>=5.3): From github.com/symfony/recipes:main
  - Configuring symfony/validator (>=5.3): From github.com/symfony/recipes:main
  - Configuring twig/extra-bundle (>=v3.22.1): From auto-generated recipe
  - Configuring symfony/translation (>=5.3): From github.com/symfony/recipes:main
  - Configuring symfony/security-bundle (>=5.3): From github.com/symfony/recipes:main
  - Configuring symfony/notifier (>=5.0): From github.com/symfony/recipes:main
  - Configuring symfony/monolog-bundle (>=3.7): From github.com/symfony/recipes:main
  - Configuring symfony/maker-bundle (>=1.0): From github.com/symfony/recipes:main
  - Configuring symfony/mailer (>=4.3): From github.com/symfony/recipes:main
  - Unpacked symfony/webapp-pack
  - Unpacked symfony/orm-pack
  - Unpacked symfony/serializer-pack
  - Unpacked symfony/twig-pack
  - Unpacked symfony/debug-pack
  - Unpacked symfony/profiler-pack
  - Unpacked symfony/test-pack
Executing script cache:clear
 [OK]
Executing script assets:install public [OK]

 What's next?


Some files have been created and/or updated to configure your new packages.
Please review, edit and commit them: these files are yours.

 symfony/framework-bundle  instructions:

  * Run your application:
    1. Go to the project directory
    2. Create your code repository with the git init command
    3. Download the Symfony CLI at https://symfony.com/download to install a development web server

  * Read the documentation at https://symfony.com/doc

 doctrine/doctrine-bundle  instructions:

  * Modify your DATABASE_URL config in .env

  * Configure the driver (postgresql) and
    server_version (16) in config/packages/doctrine.yaml

 symfony/messenger  instructions:

  * You're ready to use the Messenger component. You can define your own message buses
    or start using the default one right now by injecting the message_bus service
    or type-hinting Symfony\Component\Messenger\MessageBusInterface in your code.

  * To send messages to a transport and handle them asynchronously:

    1. Uncomment the MESSENGER_TRANSPORT_DSN env var in .env
       and framework.messenger.transports.async in config/packages/messenger.yaml;
    2. Route your message classes to the async transport in config/packages/messenger.yaml.

  * Read the documentation at https://symfony.com/doc/current/messenger.html

 symfony/phpunit-bridge  instructions:

  * Write test cases in the tests/ folder
  * Use MakerBundle's make:test command as a shortcut!
  * Run the tests with php bin/phpunit

 symfony/mailer  instructions:

  * You're ready to send emails.

  * If you want to send emails via a supported email provider, install
    the corresponding bridge.
    For instance, composer require mailgun-mailer for Mailgun.

  * If you want to send emails asynchronously:

    1. Install the messenger component by running composer require messenger;
    2. Add 'Symfony\Component\Mailer\Messenger\SendEmailMessage': amqp to the
       config/packages/messenger.yaml file under framework.messenger.routing
       and replace amqp with your transport name of choice.

  * Read the documentation at https://symfony.com/doc/master/mailer.html

No security vulnerability advisories found.

No security vulnerability advisories found.


943
q@ltd23:~/projects/f003-skeleton-dk-smf-5-4-php-8-1-mysql-8-0-nginx-gmn$ cd /home/q/projects/f003-skeleton-dk-smf-5-4-php-8-1-mysql-8-0-nginx-gmn/app
q@ltd23:~/projects/f003-skeleton-dk-smf-5-4-php-8-1-mysql-8-0-nginx-gmn/app$ ls -la
total 452
drwxr-xr-x 12 q    q      4096 Dec 12 09:27 .
drwxr-xr-x  7 q    q      4096 Dec 12 09:32 ..
-rw-r--r--  1 root root   1879 Dec 12 09:24 .env
-rw-r--r--  1 root root      0 Dec 12 09:22 .env.dev
-rw-r--r--  1 q    q       103 Dec 12 09:27 .env.local
-rw-r--r--  1 root root    215 Dec 12 09:24 .env.test
-rw-r--r--  1 root root    375 Dec 12 09:24 .gitignore
drwxr-xr-x  2 root root   4096 Dec 12 09:24 bin
-rw-r--r--  1 root root    331 Dec 12 09:24 compose.override.yaml
-rw-r--r--  1 root root    714 Dec 12 09:24 compose.yaml
-rw-r--r--  1 root root   2989 Dec 12 09:24 composer.json
-rw-r--r--  1 root root 372426 Dec 12 09:24 composer.lock
drwxr-xr-x  4 root root   4096 Dec 12 09:22 config
drwxr-xr-x  2 root root   4096 Dec 12 09:24 migrations
-rw-r--r--  1 root root   1195 Dec 12 09:24 phpunit.xml.dist
drwxr-xr-x  2 root root   4096 Dec 12 09:22 public
drwxr-xr-x  5 root root   4096 Dec 12 09:22 src
-rw-r--r--  1 root root   7684 Dec 12 09:24 symfony.lock
drwxr-xr-x  2 root root   4096 Dec 12 09:24 templates
drwxr-xr-x  2 root root   4096 Dec 12 09:24 tests
drwxr-xr-x  2 root root   4096 Dec 12 09:24 translations
drwxrwxrwx  4 root root   4096 Dec 12 09:24 var
drwxr-xr-x 19 root root   4096 Dec 12 09:22 vendor
q@ltd23:~/projects/f003-skeleton-dk-smf-5-4-php-8-1-mysql-8-0-nginx-gmn/app$ sudo chown -R q:q .
[sudo] password for q:
q@ltd23:~/projects/f003-skeleton-dk-smf-5-4-php-8-1-mysql-8-0-nginx-gmn/app$ find . -type d -exec chmod 755 {} \;
q@ltd23:~/projects/f003-skeleton-dk-smf-5-4-php-8-1-mysql-8-0-nginx-gmn/app$ find . -type f -exec chmod 644 {} \;
q@ltd23:~/projects/f003-skeleton-dk-smf-5-4-php-8-1-mysql-8-0-nginx-gmn/app$ sudo chown -R q:q /home/q/projects/f003-skeleton-dk-smf-5-4-php-8-1-mysql-8-0-nginx-gmn
q@ltd23:~/projects/f003-skeleton-dk-smf-5-4-php-8-1-mysql-8-0-nginx-gmn/app$ cd ..
q@ltd23:~/projects/f003-skeleton-dk-smf-5-4-php-8-1-mysql-8-0-nginx-gmn$ code .