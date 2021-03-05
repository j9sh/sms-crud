<?php

    //mysqli_connect($mysql_hostname, $mysql_username, $mysql_password, $mysql_dbname);
    //DEFAULT username : root and password : n/a for PhpMyadmin
    $link = mysqli_connect("localhost", "root", "", "sms");

    if(mysqli_connect_error())
    {
        die("Error connecting to the database!");
    }
/*
    else
    {
        echo "Connected Successfully!";
    }
*/ 
?>