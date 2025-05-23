<h1>Task Manager</h1>

---

Task Manager App helps people to store and organise their tasks.

#

### Table of Contents

-   [Prerequisites](#prerequisites)
-   [Tech Stack](#tech-stack)
-   [Frontend Dependencies](#frontend-dependencies)
-   [Getting Started](#getting-started)
-   [Migrations](#migration)
-   [Seeding](#seeding)
-   [Registering User](#registering-user)
-   [Development](#development)
-   [Project Structure](#project-structure)

#

### Prerequisites

-   <img src="readme/assets/php.svg" width="35" style="position: relative; top: 4px" /> \*PHP@8.3.21 and up
-   <img src="readme/assets/mysql.png" width="35" style="position: relative; top: 4px" /> MYSQL@8 and up
-   <img src="readme/assets/npm.png" width="35" style="position: relative; top: 4px" /> npm@9.2 and up
-   <img src="readme/assets/composer.png" width="35" style="position: relative; top: 6px" /> composer@2.8.8 and up

#

### Tech Stack

-   <img src="readme/assets/laravel.png" height="18" style="position: relative; top: 4px" /> [Laravel@12.x](https://laravel.com/docs/12.x) - back-end framework
-   <img src="readme/assets/mysql.png" height="18" style="position: relative; top: 4px" /> [MySQL@8](https://www.mysql.com/) - relational database

#

### Frontend Dependencies

-   This project uses [Flatpickr](https://flatpickr.js.org/) for date picking functionality.

#

### Getting Started

1\. First of all you need to clone repository from github:

```sh
git clone https://github.com/RedberryInternship/task-manager-akaki-goginava.git
```

2\. Next step requires you to run _composer install_ in order to install all the dependencies.

```sh
composer install
```

3\. After you have installed all the PHP dependencies, it's time to install all the JS dependencies:

```sh
npm install
```

and also:

```sh
npm run dev
```

4\. Now we need to set our env file. Go to the root of your project and execute this command.

```sh
cp .env.example .env
```

And now you should provide **.env** file all the necessary environment variables:

#

**MYSQL:**

> DB_CONNECTION=mysql

> DB_HOST=127.0.0.1

> DB_PORT=3306

> DB_DATABASE=**\***

> DB_USERNAME=**\***

> DB_PASSWORD=**\***

after setting up **.env** file, execute:

```sh
php artisan config:cache
```

in order to cache environment variables.

##### Now, you should be good to go!

#

### Migration

to migrate database execute:

```sh
php artisan migrate
```

#

### Seeding

to seed database execute:

```sh
php artisan db:seed
```

#

### Registering User

to register a new user execute:

```sh
php artisan app:register-user
```

#

### Development

You can run Laravel's built-in development server by executing:

```sh
  php artisan serve
```

Run Vite for frontend assets

```sh
  npm run dev
```

#

### Project Structure

```bash
├─── app
│   ├─── Console
│   ├─── Http
│   ├─── Models
│   ├─── Policies
│   ├─── Providers
├─── bootstrap
├─── config
├─── database
├─── public
├─── resources
├─── routes
├─── storage
├─── tests
- .editorconfig
- .env
- .php-cs-fixer.php
- artisan
- composer.json
- composer.lock
- package-lock.json
- package.json
- phpunit.xml
- vite.config.js
```

Project structure is standard for a Laravel project.

[Database Design Diagram](readme/assets/database-diagram.png)
