# 🐳 Docker + PHP 8.2 + MySQL + Nginx + Symfony 6.2 Boilerplate + PhpMyAdmin + Auth

## Description

It is composed by 4 containers:

- `nginx`, acting as the webserver.
- `php`, the PHP-FPM container with the 8.2 version of PHP.
- `db` which is the MySQL database container with a **MySQL 8.0** image.
- `phpmyadmin`

## Installation

1. Clone this repo.

2. If you are working with Docker Desktop for Mac, ensure **you have enabled `VirtioFS` for your sharing implementation**. `VirtioFS` brings improved I/O performance for operations on bind mounts. Enabling VirtioFS will automatically enable Virtualization framework.

3. Go inside folder `./docker` and run `docker compose up -d` to start containers.

4. You should work inside the `php` container. This project is configured to work with [Remote Container](https://marketplace.visualstudio.com/items?itemName=ms-vscode-remote.remote-containers) extension for Visual Studio Code, so you could run `Reopen in container` command after open the project.

5. Inside the `php` container, run `composer install` to install dependencies from `/var/www/symfony` folder.

6. Inside `php` container run: 
 
    `php bin/console symfony server:start`

    `php bin/console doctrine:migrations:migrate`

7. Go http://localhost/register for add user


9. Use the following value for the DATABASE_URL environment variable:

```
DATABASE_URL=mysql://app_user:helloworld@db:3306/app_db?serverVersion=8.0.33
```

You could change the name, user and password of the database in the `env` file at the root of the project.
