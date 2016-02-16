<?php

   function db_connect() {
     $host = "localhost";
     $user = "root";
     $password = "";
     $db = "rent_a_car_db"; 

     global $connection;
     $connection = 
        mysql_connect($host, $user, $password) or
        die(mysql_error());
     mysql_select_db($db) or die(mysql_error());

     mysql_query("SET NAMES UTF8") or die(mysql_error());
   }

   function db_disconnect() {
      global $connection;
      mysql_close($connection);
   }
?>
