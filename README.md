# Urbano Express Challenge

Aplicación Laravel dockerizada con autoconfiguración.

## Requisitos Previos
- Tener instalado [Docker Desktop](https://www.docker.com/products/docker-desktop/) (Windows/Mac) o Docker Engine + Compose (Linux).

## Instalación Rápida

1.  **Levantar Aplicación**:
    ```bash
    docker-compose up -d --build
    ```
    *La primera vez tardará un poco instalando dependencias automáticamente.*

2.  **Verificar**:
    - Frontend: [http://localhost:8080/](http://localhost:8080/)
    - Documentación API: [http://localhost:8080/docs/api](http://localhost:8080/docs/api)



## Notas
- El entorno usa PHP 8.4 y MySQL 8.
- La instalación de dependencias (`composer install`) y migraciones se ejecutan automáticamente al iniciar el contenedor si es necesario.
