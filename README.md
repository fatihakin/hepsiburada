# About Challenge

This project was developed by Fatih AKIN for HepsiBurada


# Installation

## 1. Copy environment file
    
    cp .env.example .env

## 2. Install required packages with docker
    
    docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs

## 3. Stand up project with docker
    
    ./vendor/bin/sail up

## 4. Run migration

    docker exec -it hepsiburada-laravel.test-1 php artisan migrate

# Testing

    docker exec -it hepsiburada-laravel.test-1 php artisan test
    
# Swagger Documentations

    http://localhost/api/documentation/v1
    http://localhost/api/documentation/v2
