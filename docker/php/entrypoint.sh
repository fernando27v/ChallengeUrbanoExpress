#!/bin/bash

if [ ! -d "vendor" ]; then
    composer install
fi

if [ ! -f ".env" ]; then
    echo "Creando archivo .env a partir del .env.example..."
    cp .env.example .env
    echo "Generando clave de aplicación..."
    php artisan key:generate
fi

echo "Esperando a la base de datos..."
sleep 10

echo "Ejecutando migraciones..."
php artisan migrate --force

echo "Iniciando PHP-FPM..."
exec php-fpm
