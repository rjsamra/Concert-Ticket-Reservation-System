<?php
    $host = "localhost";
    $user = "root";                    
    $pass = "";                                  
    $db = "db_concerts";                                  //Your database name you want to connect to
     $con = mysqli_connect($host, $user, $pass, $db)or die(mysql_error());
?>
