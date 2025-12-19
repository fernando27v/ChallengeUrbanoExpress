#!/bin/bash

if [ ! -d "vendor" ]; then
    composer install
fi

# Esperar a que la base de datos esté lista
echo "Esperando a la base de datos..."
sleep 10

echo "Ejecutando migraciones..."
php artisan migrate --force

echo "Iniciando PHP-FPM..."
exec php-fpm
