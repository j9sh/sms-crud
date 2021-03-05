<?php
    session_start();
    require_once "../connection.php";
    //print_r($_GET);

    $char = $_SESSION['id'];

    if($char[0] == 'A')
    {
        $entry = "SELECT * from admin WHERE admin_id='".$_SESSION['id']."' ";
        $row = mysqli_fetch_array(mysqli_query($link, $entry)); //getting the details of the selected student
        //print_r($row);

        if( array_key_exists("submit", $_POST) )
        {
            $query = "UPDATE admin SET name='".$_POST['name']."', email='".$_POST['email']."', password='".$_POST['password']."' WHERE admin_id='".$_GET['erp_id']."' ";
            $result = mysqli_query($link, $query);
            
            $entry = "SELECT * from admin WHERE admin_id='".$_GET['erp_id']."' ";
            $row = mysqli_fetch_array(mysqli_query($link, $entry)); //getting the updated details of the selected student

            if($result)
            {
                echo "<div class='alert alert-success'>Entry has been updated successfully !</div>";
            }
            else
            {
                echo "There was an error in updating the record !";
            }
        }
    }

    if($char[0] == 'S')
    {
        $entry = "SELECT * from users WHERE erp='".$_GET['erp_id']."' ";
        $row = mysqli_fetch_array(mysqli_query($link, $entry)); //getting the details of the selected student
        //print_r($row);

        if( array_key_exists("submit", $_POST) )
        {
            $query = "UPDATE users SET name='".$_POST['name']."', email='".$_POST['email']."', password='".$_POST['password']."' WHERE erp='".$_GET['erp_id']."' ";
            $result = mysqli_query($link, $query);
            
            $entry = "SELECT * from users WHERE erp='".$_GET['erp_id']."' ";
            $row = mysqli_fetch_array(mysqli_query($link, $entry)); //getting the updated details of the selected student

            if($result)
            {
                echo "<div class='alert alert-success'>Entry has been updated successfully !</div>";
            }
            else
            {
                echo "There was an error in updating the record !";
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

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

        <title>My Profile</title>

        <style type="text/css">
            .container{
                width: 700px;
                text-align: center;
            }
            input{
                margin: 5px;
            }
            label{
                width: 200px;
                margin-left: 50px;
                font-weight: bold;
            }
        </style>

    </head>
    <body>
        <div class="container">
            
            <?php
                echo '<h1>
                        My Profile 
                    </h1>
                    <br/>';

                if($char[0] == 'S')
                {
                    echo '<form method="post">';

                        echo '<div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label class="col-form-label">ERP-ID</label>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" name="erp" value="'.$row['erp'].'" disabled/>
                            </div>
                        </div>';
                    
                        echo '<div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label class="col-form-label">Name</label>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" name="name" value="'.$row['name'].'"/>
                            </div>
                        </div>';

                        echo '<div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label class="col-form-label">Year</label>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" name="year" value="'.$row['year'].'" disabled/>
                            </div>
                        </div>';

                        echo '<div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label class="col-form-label">Email</label>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" name="email" value="'.$row['email'].'"/>
                            </div>
                        </div>';
                        
                        echo '<div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label class="col-form-label">Password</label>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" name="password" value="'.$row['password'].'"/>
                            </div>
                        </div>';
                    
                        echo '<div class="submit-btn">';
                        echo '<br/><input type="submit" class="btn btn-success" name="submit" value="Save Changes"/>';
                        echo '<a href="../home/home.php" class="btn btn-danger">Back</a>';
                        echo "</div>";                    
                      
                    echo '</form>';
                }

                if($char[0] == 'A')
                {
                    echo '<form method="post">';

                        echo '<div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label class="col-form-label">Admin-ID</label>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" name="admin_id" value="'.$row['admin_id'].'" disabled/>
                            </div>
                        </div>';
                    
                        echo '<div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label class="col-form-label">Name</label>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" name="name" value="'.$row['name'].'"/>
                            </div>
                        </div>';

                        echo '<div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label class="col-form-label">Email</label>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" name="email" value="'.$row['email'].'" />
                            </div>
                        </div>';

                        echo '<div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label class="col-form-label">Password</label>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" name="password" value="'.$row['password'].'"/>
                            </div>
                        </div>';
                        
                        echo '<div class="submit-btn">';
                        echo '<br/><input type="submit" class="btn btn-success" name="submit" value="Save Changes"/>';
                        echo '<a href="../home/home.php" class="btn btn-danger">Back</a>';
                        echo "</div>";                   
                      
                    echo '</form>';
                }
            
            ?>

        </div>
    </body>
</html>
