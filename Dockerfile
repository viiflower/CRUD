FROM php:8.3-apache

# Instalar extensiones de PostgreSQL
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Habilitar mod_rewrite de Apache
RUN a2enmod rewrite

# Copiar código de la aplicación
COPY src/ /var/www/html/

# Dar permisos adecuados
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80