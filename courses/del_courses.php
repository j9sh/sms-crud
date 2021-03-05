<?php

    require_once "../connection.php";
    //print_r($_GET);
    if( array_key_exists("course_id", $_GET) )
    {
        $query = "DELETE from `courses` WHERE course_id = '".$_GET['course_id']."' ";
        $result = mysqli_query($link, $query);

        if($result)
        {
            echo "<div class='alert alert-success' role='alert'>Entry deleted successfully !</div>";
        }
        else
        {
            echo '<div class="alert alert-danger" role="alert">There was some error in deleting the entry.</div>';
        }
    }

?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

        <title>Delete</title>
        <style type="text/css">
            .container {
                margin-top: 50px;
                text-align: center;
            }
            div {
                margin: 0 auto;
                margin-top : 200px;
                text-align: center;
                width: 500px;
            }
        </style>
    </head>

    <body>

        <div class="container">
            <a class="btn btn-primary" href="courses.php">Ok</a>
        </div>

    </body>
</html>
