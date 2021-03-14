<?php

    // fill in your MYSQL details
    $link = mysqli_connect($mysql_hostname, $mysql_username, $mysql_password, $mysql_dbname);

    // incase of an error
    if(mysqli_connect_error())
    {
        die("Error connecting to the database!");
    }

?>