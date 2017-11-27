# Laravel/AdminLTE/Bootstrap 4 Boilerplate

![Laravel](https://img.shields.io/badge/Laravel-5.5.x-green.svg)
![Bootstrap 4.0.0-beta.2](https://img.shields.io/badge/Bootstrap-4.0.0--beta.2-blue.svg)

This package is to be served as a basis for a web application. 

## Features

* Backend theme [Admin LTE](https://github.com/jomarsilio/AdminLTE)
* Css framework [Bootstrap 4 beta 2](http://getbootstrap.com/)
* Additional icons by [Font Awesome](http://fontawesome.io/) and [Ionicons](http://ionicons.com/)
* Forms & Html helpers by [laravelcollective/html](https://github.com/laravelcollective/html) 
* Debugbar by [barryvdh/laravel-debugbar](https://github.com/barryvdh/laravel-debugbar)
* Curl by [ixudra/curl](https://github.com/ixudra/curl)
* Localized Portuguese Brazil

## Installation

### 1. In order to install Laravel/AdminLTE Boilerplate run :
```
git clone https://github.com/jomarsilio/AdminLTE.git
```

### 2. Copy .env file:
```sh
$ cp .env.example .env
```

### 3. Install Docker:
* [Docker](https://docs.docker.com/engine/installation/linux/ubuntulinux/) 
* [docker-compose](https://docs.docker.com/compose/install/)

### 4. Built docker container:
```sh
$ docker-compose build
$ docker-compose up -d
```

If necessary, you can access the containers via SSH:
```sh
$ docker-compose exec web bash
$ docker-compose exec db bash
```

### 5. Install the dependencies in the container and compile the assets:
```sh
$ docker-compose run web php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && php composer-setup.php && php -r "unlink('composer-setup.php');"
$ docker-compose run web php composer.phar install
$ docker-compose run web npm install
$ docker-compose run web ./node_modules/.bin/bower install --allow-root
$ docker-compose run web npm run dev
$ docker-compose run web chmod 0777 storage -R
$ docker-compose run web chmod 0777 bootstrap/cache -R
```

### 6. Run the command below to publish assets, views, lang files, ...

```
php artisan vendor:publish --provider="Barryvdh\Debugbar\ServiceProvider"
```