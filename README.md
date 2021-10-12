<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About SIAC

...


## Configure Docker-Laravel environment

With **Docker** previously installed on your system, follow next steps (**Linux**):

##### Step 0 —> Configure a user with sudo privileges
 - `adduser alexisandres` (only in case of new user)
 - `usermod -aG sudo alexisandres`


NOTE: The commands must be executed in the project dir

##### Step 1 —> Installing Laravel dependencies
- `docker run --rm -v $(pwd):/app composer install`
- `sudo chown -R $USER:$USER $(pwd)`


##### Step 2 —> Modifying environment settings and running the containers
- `cp .env.example .env`
- Edit the *.env* file with the DB parameters as in the *docker-compose.yml* file


##### Step 3 —> Running/building the containers
- `docker-compose up -d`
- To rebuild this image you must use `docker-compose build` or `docker-compose up --build`.

- *docker-compose exec siac-app php artisan key:generate*
- `docker-compose exec app php artisan key:generate`
- `docker-compose exec app php artisan config:cache`


#### Step 4 —> Executing migrations (database tables)
- `docker-compose exec app php artisan migrate`


...

