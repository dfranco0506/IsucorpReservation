# IsucorpReservation

1- Create a mySql database

2- edit app/Config/Database file with created database credentials

3- edit app/Libraries/Doctrine file with created database credentials

4- Make a composer install

5- To generate database schema
   php app/doctrine orm:schema-tool:create

6-To fill database tables with mock data
  php spark db:seed AllSeeder
  
7-Run command php -S localhost:8080
