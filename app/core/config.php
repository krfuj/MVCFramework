<?php

function show($stuff)
{
      echo "<prev>";
      print_r($stuff);
      echo "</prev>";
}
 if($_SERVER['SERVER_NAME'] == 'LOCALHOST')
 {
      /* Defining the database name, host, user and password. */
      define('DBNAME', 'my_db');
      define('DBHOST', 'localhost');
      define('DBUSER', 'root');
      define('DBPASS', '');

      define("ROOT", "http://localhost/MVC-Framework/public");
 }else{

       /* Defining the database name, host, user and password. */
       define('DBNAME', 'my_db');
       define('DBHOST', 'localhost');
       define('DBUSER', 'root');
       define('DBPASS', '');

      define("ROOT", "https://www.yourdomain.com");
 }

