#Script to execute the initial RMS commands

#!/bin/sh
docker-compose up -d

#Install dependencies
docker-compose exec app composer install

#Generate app key
docker-compose exec app php artisan key:generate

#caching config files
docker-compose exec app php artisan config:cache

#Migrate tables to database
docker-compose exec app php artisan migrate

#Seed the Admin table
docker-compose exec app php artisan db:seed

#Create a symbolic link to public folder storage
docker-compose exec app php artisan storage:link

#Assigning permissions to root user and web server
docker-compose exec app bash -c "chown -R root:www-data ."
docker-compose exec app bash -c "find . -type f -exec chmod 664 {} \;"
docker-compose exec app bash -c "find . -type d -exec chmod 755 {} \;"

#Give webserver rights to read and write in storage and cache
docker-compose exec app bash -c "chgrp -R www-data storage bootstrap/cache"
docker-compose exec app bash -c "chmod -R ug+rwx storage bootstrap/cache"