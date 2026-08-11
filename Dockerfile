FROM php:8.4-apache

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    unzip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql zip

# ===== FIX APACHE =====
RUN a2dismod mpm_event && a2enmod mpm_prefork
RUN a2enmod rewrite

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

# === INSTALLER LES DÉPENDANCES ===
RUN composer install --no-dev --optimize-autoloader

# === CRÉER LE FICHIER .env ===
RUN echo "APP_KEY=base64:R+DsZlbgJM0XEwJzEiwpaESa1EYTgxOSrgKWrvc/KDY=" > /var/www/html/.env && \
    echo "APP_ENV=production" >> /var/www/html/.env && \
    echo "APP_DEBUG=true" >> /var/www/html/.env && \
    echo "APP_URL=https://fondation-hice.onrender.com" >> /var/www/html/.env

# === ACTIVER L'AFFICHAGE DES ERREURS (FORCÉ) ===
RUN echo "display_errors = On" >> /usr/local/etc/php/conf.d/custom.ini && \
    echo "error_reporting = E_ALL" >> /usr/local/etc/php/conf.d/custom.ini && \
    echo "log_errors = On" >> /usr/local/etc/php/conf.d/custom.ini && \
    echo "display_startup_errors = On" >> /usr/local/etc/php/conf.d/custom.ini

# === PERMISSIONS ===
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache \
    && chmod -R 755 /var/www/html/public

# === CONFIGURATION APACHE ===
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

RUN sed -i '/<Directory \/var\/www\/html>/c\<Directory \/var\/www\/html/public>\n\tOptions Indexes FollowSymLinks\n\tAllowOverride All\n\tRequire all granted\n</Directory>' /etc/apache2/apache2.conf

EXPOSE 80

CMD ["apache2-foreground"]
