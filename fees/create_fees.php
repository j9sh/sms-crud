<?php

    require_once "../connection.php";
    if( array_key_exists("submit", $_POST) )
    {
        //print_r($_POST);
        $query = "INSERT INTO `fees` VALUES('".$_POST['erp']."', '".$_POST['transaction-id']."', '".$_POST['amt']."') ";
        $result = mysqli_query($link, $query);

        if($result)
        {
            echo '<div class="alert alert-success" role="alert">Entry has been added successfully !</div>';
        }
        else
        {
            echo '<div required class="alert alert-danger" role="alert">The user does not exist yet.</div>';
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

        <title>Add Fees</title>

        <style type="text/css">

            .container {
                margin-top : 150px;
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

            body {
                background : url('../img/other-bg.jpg');
                background-size : cover;
            }

        </style>

    </head>
    
    <body>
        
        <div class="container">

            <h1>Add Fees</h1>
            <br/>
            
            <form method="post">
                <div>
                    <input class="form-control" name="erp" placeholder="ERP-ID" required/>
                    <input class="form-control" name="transaction-id" placeholder="Transaction-ID" required/>
                    <input class="form-control" name="amt" placeholder="Amount" required/>
                </div>
                <div class="submit-btn">
                    <input type="submit" class="btn btn-success" name="submit" placeholder="Submit"/>
                    <a href="fees.php" class="btn btn-danger">Back</a>
                </div>
            
            </form>

        </div>

    </body>
</html>