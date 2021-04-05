# IsucorpReservation

1- Create a mySql database

2- edit the default in app/Config/Database file with created database credentials
    public $default = [
    		'DSN'      => '',
    		'hostname' => '',
    		'username' => '',
    		'password' => '',
    		'database' => '',
    		'DBDriver' => 'MySQLi',
    		'DBPrefix' => '',
    		'pConnect' => false,
    		'DBDebug'  => (ENVIRONMENT !== 'production'),
    		'charset'  => 'utf8',
    		'DBCollat' => 'utf8_general_ci',
    		'swapPre'  => '',
    		'encrypt'  => false,
    		'compress' => false,
    		'strictOn' => false,
    		'failover' => [],
    		'port'     => 3306,
    	];
3- edit $connection_options in app/Libraries/Doctrine file with created database credentials
   $connection_options = array(
               'driver'        => 'pdo_mysql',
               'user'          => 'isucorp',
               'password'      => '123456',
               'host'          => 'localhost',
               'dbname'        => 'db_isucorp_reserva',
               'charset'       => 'utf8',
               'driverOptions' => array(
                   'charset'   => 'utf8',
               ),
           );

4- Make a composer install

5- create .env file, copy the current env. uncomment and set CI_ENVIRONMENT section from production to development

6- To generate database schema
   php app/doctrine orm:schema-tool:create

7- Give permission to writable folder, if directory is missed, create it an then give permissions, I used all permissions
   sudo chmod 777 -R writable/cache
   
8- To fill database tables with mock data
   php spark db:seed AllSeeder
  
9-Run command php -S localhost:8080 (cd /public)
