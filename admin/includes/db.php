<?php

    $db['db_host'] = "localhost";
    $db['db_user'] = "root";
    $db['db_password'] = "";
    $db['db_database'] = "barangay";

    foreach($db as $key => $value){
        define(strtoupper($key), $value);
    }

    $connection = mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

   if($connection){
      
   }else{
       die(mysqli_error($connection));
   }



?>