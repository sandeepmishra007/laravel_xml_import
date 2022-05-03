# Laravel XML Import feature with CRUD Operation

<b>Technologies Description : </b><br>
Language: PHP (Version 8.0.13)<br>
Framework: Laravel (Version 8 )<br>
Database : MySQL (Version 8.0) <br>


# Installation (Via Composer) and Run the Project
composer create-project laravel/laravel:^8.0 laravel_xml_import

cd laravel_xml_import

<b>Start the Server : </b>
php artisan serve
<br>
Copy and Paste the Local Host URL on your browser:  http://127.0.0.1:8000/ 
<br>
<b>Stop the Server :</b>
Ctr+C

# Create Database and other configuration
Run the below Queries in your phpmyadmin or any other DBMS tool:<br>
CREATE DATABASE xml_import;
<br><br>
Change the database credentials as and add the database name in the .env file : <br>
DB_DATABASE=xml_import


# Create Migration Files
We have few pre-existing migrations files in the Migration folder:
1. 2014_10_12_000000_create_users_table.php
2. 2014_10_12_100000_create_password_resets_table.php
3. 2019_08_19_000000_create_failed_jobs_table.php

if migration folder is empty then you can run below command:
php artisan make:migration create_users_table

Please replace the <b>up()</b> function with below code into \database\migrations\create_users_table.php file: <br>
<i>
```
public function up()
{
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('lastName');
        $table->string('phone',15)->unique();
        $table->timestamps();
    });
}
```
</i>
Now, You can run the below Command and check your database:<br>
php artisan migrate

<br><br>
<b>Start the Server Again and refresh the Local host URL on your browser: </b><br>
php artisan serve
<br><br>
<b>Note :</b>
1. Please find the Sample XML File <b>contact.xml</b> (root folder)
