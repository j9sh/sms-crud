<?php

    require_once "../connection.php";
    if( array_key_exists("submit", $_POST) )
    {
        $query = "INSERT INTO `users` VALUES('".$_POST['erp']."', '".$_POST['name']."', '".$_POST['year']."', '".$_POST['email']."', '".$_POST['password']."') ";
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

        <!-- JQuery File -->
        <script type="text/javascript" src="../jquery.min.js"></script>
        
        <title>Create</title>

        <style type="text/css">

            body {
                margin-top : 150px;
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

            input{
                margin: 5px;
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

        <div class="err-msg"></div>
        
        <div class="container">

            <h1>Student Registration Form</h1>
            <br/>
            
            <form method="post">
                <div>
                    <input class="form-control" name="erp" placeholder="ERP-ID" id="erp" required/>
                    <input class="form-control" name="name" placeholder="Name" id="name" required/>
                    <input class="form-control" type="email" name="email" placeholder="Email-Id" id="email" required/>
                    <input class="form-control" name="year" placeholder="Year" id="year" required/>
                    <input class="form-control" name="password" placeholder="Password" id="password" required/>
                </div>
                <div class="submit-btn">
                    <input type="submit" class="btn btn-success" name="submit" placeholder="Submit"/>
                    <a href="../home/home.php" class="btn btn-danger">Back</a>
                </div>
            
            </form>

        </div>

    </body>
</html>