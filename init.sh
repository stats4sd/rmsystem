#Script to execute the initial RMS commands
#!/bin/sh
docker-compose up -d

#Install dependencies
docker-compose exec app composer install

#Generate app key
docker-compose exec app php artisan key:generate

#caching config files
docker-compose exec app php artisan config:cache

#Migrate tabeles to database
docker-compose exec app php artisan migrate

#Create a symbolic link to public folder storage
docker-compose exec app php artisan storage:link
