# 1. Laravel set up and database configuration

## Requirements

| Software           | Version   |
| ------------------ | --------- |
| PHP                | >= 7.1.0  |
| Composer           | >= 1.6.3  |
| MySQL              | >= 5.7.21 |

>This tutorial assumes that you are using Laravel 5.6.0 and that you have previous experience using Laravel and PHP.

First clone this repository in your computer
```sh
git clone http://github.com/JorgeQuevedoC/rolesandapis
```
Next, go to the app directory and install composer 
```sh
composer install
```
Now, create a database in your mysql server
```sh
mysql -u user -ppassword

create database compraventa;
```
Open your .env.examples and save it as .env
```sh
sudo nano .env.example
```
Create the app key running the next command:
```sh
php artisan key:generate
```
Open your recently created .env file, change the next values and save it
```
APP_NAME="YOUR APP NAME"

DB_DATABASE="YOUR DATABASE NAME"
DB_USERNAME="YOUR MYSQL USER"
DB_PASSWORD="YOUR MYSQL PASSWORD"
```
Let's run our server 
```sh
php artisan serve
```

Open your browser and go to 
```sh
127.0.0.1:8000
```

[Next step ->](crud-generator.md)