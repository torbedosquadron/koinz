1- cd to project root directory.
2- create a mysql database called 'books_recommendor'
3- add this credentials in '.env' file
DB_DATABASE=books_recommendor  
DB_USERNAME=root -> (change it to suitable one)
DB_PASSWORD=Mohamed@123 -> (change it to suitable one)

4- run this command 'php artisan migrate' to migrate database and create the required tables.
5 run this command 'php artisan db:seed' to seed the table with data.
6- run the project using this command 'php artisan serve'. to bootstarp the application.
7- test first and second end point
'http://127.0.0.1:8000/api/readPageInterval',
'http://127.0.0.1:8000/api/recommendedBooks'
