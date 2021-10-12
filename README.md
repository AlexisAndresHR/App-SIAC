<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

### Documentation
Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.


## Configure Docker-Laravel environment

With **Docker** previously installed on your system, follow next steps (**Linux**):

NOTE: The commands must be executed in the project dir

##### Step 1 —> Installing Laravel dependencies
- `docker run --rm -v $(pwd):/app composer install`
- `sudo chown -R $USER:$USER $(pwd)`

##### Step 2 —> Creating the Docker Compose file
- *nano $(pwd)/docker-compose.yml*
- After the file has been created, put the content located in [...]()

##### Step 3 —> Creating the Dockerfile
- *nano $(pwd)/Dockerfile*
- Write file like [this]() to build the Laravel app image. (Specify a PHP version >= 7.4.0)

##### Step 4 —> Configuring PHP
- *mkdir $(pwd)/php*
- *nano $(pwd)/php/local.ini*
- Put PHP settings in the file, like [...]()

##### Step 5 —> Configuring Nginx
- *mkdir -p $(pwd)/nginx/conf.d*
- *nano $(pwd)/nginx/conf.d/app.conf*
- Put Nginx settings in the file, like [...]()

##### Step 6 —> Configuring MySQL
- *mkdir $(pwd)/mysql*
- *nano $(pwd)/mysql/my.cnf*
- Put MySQL settings in the file, like [...]()

##### Step 7 —> Modifying environment settings and running the containers
- `cp .env.example .env`
- *nano .env*
- Set the DB parameters as in the docker-compose.yml file

- `docker-compose up -d`
- Image for service app was built because it did not already exist. To rebuild this image you must use `docker-compose build` or `docker-compose up --build`.

- *docker-compose exec siac-app php artisan key:generate*
- `docker-compose exec app php artisan key:generate`

- `docker-compose exec app php artisan config:cache`

...



### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[CMS Max](https://www.cmsmax.com/)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
