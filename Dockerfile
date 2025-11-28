FROM php:8.3-apache

# Instalar PostgreSQL correctamente
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql \
    && apt-get clean

# Habilitar mod_rewrite
RUN a2enmod rewrite

# Copiar código
COPY src/ /var/www/html/

# Permisos
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80