How to Setup a Laravel Project You Cloned from Github.com
1. Clone GitHub repo for this project locally
2.Install Composer Dependencies
composer install
3.Install NPM Dependencies

npm install

4. Create a copy of your .env file
.env files are not generally committed to source control for security reasons. But there is a .env.example which is a template of the .env file that the project expects us to have. So we will make a copy of the .env.example file and create a .env file that we can start to fill out to do things like database configuration in the next few steps.

cp .env.example .env
This will create a copy of the .env.example file in your project and name the copy simply .env.

5. Generate an app encryption key

php artisan key:generate

6.Create an empty database for our application

7. In the .env file, add database information to allow Laravel to connect to the database

8.Migrate the database
php artisan migrate

