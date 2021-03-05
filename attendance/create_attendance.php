<?php

    require_once "../connection.php";
    if( array_key_exists("submit", $_POST) )
    {
        $query = "INSERT INTO `attendance` VALUES('".$_POST['erp']."', '".$_POST['subj-id']."', '".$_POST['subject']."', '".$_POST['type']."', '".$_POST['attendance']."') ";
        $result = mysqli_query($link, $query);

        if($result)
        {
            echo '<div class="alert alert-success" role="alert">Entry has been added successfully !</div>';
        }
        else
        {
            echo '<div class="alert alert-danger" role="alert">There was some error in adding the entry!</div>';
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

        <title>Create</title>

        <style type="text/css">

            body {
                background : url('../img/other-bg.jpg');
                background-size : cover;
            }

            h1{
                text-align: center;
                font-family : Verdana;
                letter-spacing : 2px;
                text-transform: uppercase;
                font-weight: bolder;
                color:#45007A;
            }

            .container {
                margin-top : 150px;
            }

            input{
                margin: 5px;
                opacity : 0.75;
            }

            .submit-btn{
                text-align: center;
            }

            .container{
                width: 700px;
                alignment: center;
            }

            form{
                width: 500px;
                margin : 0 auto;
            }

        </style>

    </head>
    
    <body>
        
        <div class="container">

            <h1>Add attendance</h1>
            <br/>
            
            <form method="post">
                <div>
                    <input class="form-control" name="erp" placeholder="ERP-ID" required/>
                    <input class="form-control" name="subj-id" placeholder="Subject-Id" required/>
                    <input class="form-control" name="subject" placeholder="Subject-Name" required/>
                    <input class="form-control" name="type" placeholder="Subject-Type" required/>
                    <input class="form-control" name="attendance" placeholder="Attendance(%)" required/>
                </div>
                <br/>
                <div class="submit-btn">
                    <input type="submit" class="btn btn-success" name="submit" placeholder="Submit"/>
                    <a href="attendance.php" class="btn btn-danger">Back</a>
                </div>
            
            </form>

        </div>

    </body>
</html>