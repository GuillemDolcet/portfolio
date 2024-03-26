# Guillem Dolcet Portfolio

I developed a personal portfolio app using PHP/Laravel for robust server-side logic and seamless data handling. For the front end, JavaScript and jQuery were chosen to ensure interactivity and dynamic user experiences. Additionally, the backend incorporates Stimulus, a JavaScript framework, enhancing HTML with interactive behaviors efficiently. This tech stack guarantees a smooth, responsive, and user-friendly application, merging functionality with modern web practices.

![External Image](https://imgur.com/39z3L9F.png)

You can access backend via google (you need to configure the .env) or email and password

Default user:

Email: demo@demo.com

Password: demo

![External Image](https://imgur.com/phRDS00.png)

![External Image](https://imgur.com/zQU98jy.png)

## Requirements

- PHP >= 8.1

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)

Alternative installation is possible without local dependencies relying on [Docker](#docker). 

Clone the repository

    git clone git@github.com:GuillemDolcet/portfolio.git

Switch to the repo folder

    cd portfolio

Install all the dependencies using composer

    composer install

Install node module using npm

    npm install

Build node module dependencies using npm

    npm run build

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

## Database seeding

**Populate the database with seed data with relationships which includes users, articles, comments, tags, favorites and follows. This can help you to quickly start testing the api or couple a frontend and start using it with ready content.**

Run the database seeder and you're done

    php artisan db:seed

***Note*** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command

    php artisan migrate:refresh

----------

## Environment variables

- `.env` - Environment variables can be set in this file

***Note*** : You can quickly set the database information and other variables in this file and have the application fully working.

----------
