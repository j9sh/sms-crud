<?php

//THIS IS THE LOGIN PAGE CODE

    session_start(); 

    include('../connection.php');

    if( array_key_exists('logout', $_GET) )
    {
        //unset($_SESSION);
        $_SESSION['id'] = "";
    }

    if( array_key_exists('login', $_POST) ) //only if user submits the form
    {
        
        if( $_POST['isAdmin'] == 'no' ) // for the user
        {
            $password = "SELECT * from `users` WHERE email='".$_POST['inputEmail']."' ";
            $result = mysqli_query($link, $password);
            
            if( $result ) //if email id exists
            {
                $row = mysqli_fetch_array($result);
                
                if($row['password'] == $_POST['inputPassword'])
                {
                    $_SESSION['id'] = $row['erp']; //this session variable will be available in all the pages

                        //setting the cookie with default time 0 ie the cookie will be destroyed when browser closes
                    /*  setcookie("id", $row['erp']); 
                        print_r($_COOKIE['id']);
                    */
                        header("Location:home.php?erp=".$row['erp']);
                }
                else //if wrong password entered
                {
                    echo "<div class='alert alert-danger' role='alert'>
                            Wrong password entered. Please check your password again !
                        </div>";
                }
                
            }
            else //if error in executing query
            {
                echo "<div class='alert alert-danger' role='alert'>
                        Invalid Email-ID. Please Sign-Up first !
                    </div>";
            }
        } 

        if( $_POST['isAdmin'] == 'yes' ) // for the admin 
        {
            $password = "SELECT * from `admin` WHERE email='".$_POST['inputEmail']."' ";          
            $result = mysqli_query($link, $password);

            if( $result ) //if email id exists
            {
                $row = mysqli_fetch_array($result);
                
                if($row['password'] == $_POST['inputPassword'])
                {
                    $_SESSION['id'] = $row['admin_id']; //this session variable will be available in all the pages
                    
                        //setting the cookie with default time 0 ie the cookie will be destroyed when browser closes
                    /*  setcookie("id", $row['erp']); 
                        print_r($_COOKIE['id']);
                    */
                        header("Location:home.php?erp=r00t");
                }
                else //if wrong password entered
                {
                    echo "<div class='alert alert-danger' role='alert'>
                            Wrong password entered. Please check your password again !
                        </div>";
                }
                
            }
            else //if error in executing query
            {
                echo "<div class='alert alert-danger' role='alert'>
                        Invalid Email-ID. Please Sign-Up first !
                    </div>";
            }
        }      

    }
    
?>

<!doctype html>
<html lang="en">
    
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Google fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@1,500&display=swap" rel="stylesheet">
        
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

        <title>Login Page</title>

        <style type="text/css">

            body {
                font-family: 'Exo 2', sans-serif;
                background: url("../img/index-bg.jpg");
                background-size : cover;
            }

            form {
                margin: 0 auto;
                margin-top: 150px;
                color: white;
                width:600px;
                font-size: 20px;
                text-align :center;
                padding : 25px;
                opacity: 0.90;
                border-radius : 10px;
            }

            form input {
                margin: 0 20px;
            }

            .form-container {
                width: 650px;
                height: 370px;
                margin: 0 auto;
                background-color: black;
                border-radius: 10px;
                opacity: 0.775;
            }

            #checkbox {
                font-size: 15px;
            }
            #checkbox input {
                margin-left:100px;;
                padding : 0;
            }

        </style>

    </head>

    <body>

        <div class="container">

            <div class="form-container">
            
                <form method="post">
                    
                    <h1><i>Login to continue ...</i></h1>

                    <br/>

                    <div class="mb-3 row">
                        <label for="inputEmail" class="col-sm-2 col-form-label" >Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="inputEmail" placeholder="username@domain.com" required>
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="inputPassword" required>
                        </div>
                    </div>
                    
                    <div id="checkbox">
                        <div class="form-check">
                            Student
                            <input class="form-check-input" type="radio" name="isAdmin" id="flexRadioDefault1" checked value="no">
                        </div>
                        <div class="form-check">
                            Administrator
                            <input class="form-check-input" type="radio" name="isAdmin" id="flexRadioDefault2" value="yes">
                        </div>
                    </div>

                    <br/>

                    <input class="btn btn-primary" type="submit" name="login" value="Login">
                </form>
            </div>
            
        </div>

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

        <script>
            console.log(window.innerWidth);
            console.log(window.innerHeight);
        </script>
    </body>

</html>