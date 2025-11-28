FROM php:8.4-apache

# Instalar extensiones de PostgreSQL
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pgsql pdo pdo_pgsql

# Copiar código de la aplicación
COPY src/ /var/www/html/

# Habilitar mod_rewrite de Apache
RUN a2enmod rewrite

# Permisos adecuados
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80