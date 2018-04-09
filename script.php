<?php

   $host        = "host=104.154.246.168";
   $port        = "port=5432";
   $dbname      = "dbname=smart_mobile_prod";
   $credentials = "user=javasoft password=javas0ft";

   $db = pg_connect( "$host $port $dbname $credentials" );
   if(!$db){
      //echo "Error : Unable to open database\n";
   } else {
      //echo "Opened database successfully\n";
   }





?>

