# topup-app

----------

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/10.x/installation)

Alternative installation is possible without local dependencies relying on [Docker](#docker). 

Clone the repository

    git clone git@github.com:widiagie/Book-Api-Project.git

Switch to the repo folder

    cd Book-Api-Project

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone git@github.com:widiagie/Book-Api-Project.git
    cd Book-Api-Project
    composer install
    cp .env.example .env
    php artisan key:generate
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

## Database seeding

**Populate the database with seed data with relationships which includes users, articles, comments, tags, favorites and follows. This can help you to quickly start testing the api or couple a frontend and start using it with ready content.**

Open the DummyDataSeeder and set the property values as per your requirement

    database/seeders/DatabaseSeeder.php
    database/seeders/BooksSeeder.php
    database/seeders/CategorySeeder.php

Run the database seeder and you're done

    php artisan db:seed

***Note*** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command

    php artisan migrate:refresh


**Open the DummyDataSeeder and set the property values as per your requirement**

Please check the official Postman download and installation guide requirements before you start. [Official Documentation](https://www.postman.com/downloads/)

Create Collections and add request below url at postman 

Login and Register

    http://localhost:8000/api/register
    
    http://localhost:8000/api/login

    http://localhost:8000/api/logout

Book

    GET :

    http://localhost:8000/api/books
    http://localhost:8000/api/books/{id}
    
    POST:

    Add :
    http://localhost:8000/api/add-books

    Update:
    http://localhost:8000/api/update-books/{id}

    DELETE:

    http://localhost:8000/api/delete-books/{id}

Book Rental

    GET :

    http://localhost:8000/api/book-rental
    http://localhost:8000/api/book-rental/{id}
    
    POST:

    Add :
    http://localhost:8000/api/add-book-rental

    Update:
    http://localhost:8000/api/update-book-rental/{id}

    DELETE:
    
    http://localhost:8000/api/delete-book-rental/{id}


Book Category

    GET :

    http://localhost:8000/api/book-category
    
    POST:

    Add :
    http://localhost:8000/api/add-book-category

    Update:
    http://localhost:8000/api/update-book-category/{id}

    DELETE:

    http://localhost:8000/api/delete-book-category/{id}

Pre Test

    http://localhost:8000/api/pretest



