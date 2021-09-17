## Landing Page Laravel

Laravel backend for landing page project

### Installation

####  Clone the repository

``` bash
git clone https://github.com/Elda3004/laravel-landing.git
# go into app's directory
$ cd laravel-landing
```
Copy .env.example into .env and set your database connection

``` bash
# serve with hot reload at localhost:8085
sudo compose-docker up -d
# enter into docker cmd
sudo docker-compose exec web-app bash
# install app's dependencies
$ composer install
# config laravel cache
$ php artisan key:generate
$ php artisan config:cache
```
