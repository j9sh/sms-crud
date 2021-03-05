<?php

    require_once "../connection.php";
    //print_r($_POST);
    
    $entry = "SELECT * from courses WHERE course_id='".$_GET['course_id']."' ";
    $row = mysqli_fetch_array(mysqli_query($link, $entry)); //getting the details of the selected student
    //print_r($row);
    
    if( array_key_exists("submit", $_POST) )
    {
        $query = "UPDATE courses SET subject='".$_POST['subject']."', sem='".$_POST['sem']."', year='".$_POST['year']."' WHERE course_id='".$_GET['course_id']."' ";
        $result = mysqli_query($link, $query);
        
        $entry = "SELECT * from courses WHERE course_id='".$_GET['course_id']."' ";
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

?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

        <title>Update</title>

        <style type="text/css">
            .container{
                width: 700px;
                text-align: center;
            }
            input{
                margin: 5px;
            }
            body {
                background : url('../img/other-bg.jpg');
                background-size : cover;
            }
            label{
                width: 200px;
                margin-left: 50px;
                font-weight: bold;
            }
            h1{
                text-align: center;
                font-family : Verdana;
                letter-spacing : 2px;
                text-transform: uppercase;
                font-weight: bolder;
                color:#45007A;
            }
        </style>

    </head>
    <body>
        <div class="container">
            
            <?php
                echo '<h1>
                        Update Record 
                    </h1>
                    <br/>';
            
                echo '<form method="post">';

                        echo '<div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label class="col-form-label">Course-ID</label>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" name="course_id" value="'.$row['course_id'].'" disabled/>
                            </div>
                        </div>';
                    
                        echo '<div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label class="col-form-label">Subject</label>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" name="subject" value="'.$row['subject'].'"/>
                            </div>
                        </div>';

                        echo '<div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label class="col-form-label">Semester</label>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" name="sem" value="'.$row['sem'].'"/>
                            </div>
                        </div>';

                        echo '<div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label class="col-form-label">Year</label>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" name="year" value="'.$row['year'].'"/>
                            </div>
                        </div>';
                    
                        echo '<div class="submit-btn">';
                        echo '<input type="submit" class="btn btn-success" name="submit" value="Update"/>';
                        echo '<a href="courses.php" class="btn btn-danger">Back</a>';
                    echo "</div>";
                    
                      
                echo '</form>';
            ?>

        </div>
    </body>
</html>
