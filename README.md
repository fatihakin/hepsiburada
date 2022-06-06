# About Case Study

This project was developed by Fatih AKIN for HepsiBurada


# Installation

## 1. Copy environment file
    
    cp .env.example .env

## 2. Install required packages by using docker
    
    docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs

## 3. Stand up project with docker
    
    ./vendor/bin/sail up
or
    
    ./vendor/bin/sail up -d

## 4. Run migration

    docker exec -it <app-container-name> php artisan migrate
like

    docker exec -it hepsiburada-laravel.test-1 php artisan migrate

# Testing
Note: I have changed test database from testing to hepsiburada. But normally it should be different. 

    docker exec -it<app-container-name> php artisan test
like

    docker exec -it hepsiburada-laravel.test-1 php artisan test
    
# Swagger Documentations
Links

    http://localhost/api/documentation/v1
    http://localhost/api/documentation/v2

Jsons

    http://localhost/api/v1/docs/api-docs-v1.json
    http://localhost/api/v1/docs/api-docs-v2.json
# Notes
You can see database ER diagram which name is "hepsiburada-er-diagram.png", in root directory 
