<?php
    session_start();
    require_once "../connection.php";
    if($_SESSION['id'] == "")
    {
        header("Location: ../home/index.php");
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
        
        <title>Attedance</title>

        <style type="text/css">

            div {
                text-align: center;
            }

            img{
                width: 22px;
                margin: 0px 15px;
            }

            h2{
                text-align: center;
                font-family : Verdana;
                letter-spacing : 2px;
                text-transform: uppercase;
                font-weight: bolder;
                color:#113550;
            }
        
        </style>

    </head>

    <body>

        <?php include('../navbar.php'); ?>

        <div class="container" >
            
            <br/>
            <h2>Attendance Records</h2>
            <br/>

            <div>

            <?php

                $char = $_SESSION['id'];
                //print_r($_SESSION);

                if($char[0] == "A") //for admin
                {
                    $query = "SELECT * from attendance ";
                    $result = mysqli_query($link, $query);

                    if($result)
                    {
                        if(mysqli_num_rows($result) > 0)
                        {
                            echo "<table class='table table-bordered table-hover' style='border-color:black'>";
                                
                                echo "<thead class='table-dark'>";
                                    echo "<tr>";
                                        
                                        echo "<th>ERP-ID</th>";
                                        echo "<th>Course-ID</th>";
                                        echo "<th>Subject</th>";
                                        echo "<th>Type</th>";
                                        echo "<th>Attendance</th>";
                                    
                                    echo "</tr>";
                                echo "</thead>";

                                echo "<tbody>";
                                
                                while($row = mysqli_fetch_array($result))
                                {
                                    echo "<tr>";
                                    
                                        echo "<td>".$row['erp']."</td>";
                                        echo "<td>".$row['course_id']."</td>";
                                        echo "<td>".$row['subject']."</td>";
                                        echo "<td>".$row['subject_type']."</td>";
                                        echo "<td>".$row['attend_percentage']."%</td>";
                                        echo "
                                        <td>
                                            <a href='update_attendance.php?course_id=".$row['course_id']."&erp=".$row['erp']."' class='edit-btn'><img src='../img/edit.jpg'/></a>
                                            <a data-bs-toggle='modal' data-bs-target='#staticBackdrop' class='edit-btn' course-id=".$row['course_id']." erp-id=".$row['erp']."><img src='../img/delete.png'/></a>
                                        </td>";
                                        
                                    echo "</tr>";
                                }
                                echo "</tbody>";

                            echo "</table>";

                            echo "<a href='create_attendance.php' class='btn btn-primary'>Add entry</a>";
                        }
                        else
                        {
                            echo "<h2>Nothing to see here !</h2>";
                        }
                    }
                    else
                    {
                        echo "Error in executing query ...";
                    }
                }
                if($char[0] == 'S') //for the student
                {
                    $query = "SELECT * from attendance WHERE erp='".$_SESSION['id']."' ";
                    $result = mysqli_query($link, $query);

                    if($result)
                    {
                        if(mysqli_num_rows($result) > 0)
                        {
                            echo "<table class='table table-bordered table-hover' style='border-color:black'>";
                                
                                echo "<thead class='table-dark'>";
                                    echo "<tr>";
                                        
                                        echo "<th>ERP-ID</th>";
                                        echo "<th>Course-ID</th>";
                                        echo "<th>Subject</th>";
                                        echo "<th>Type</th>";
                                        echo "<th>Attendance</th>";
                                    
                                    echo "</tr>";
                                echo "</thead>";

                                echo "<tbody>";
                                
                                while($row = mysqli_fetch_array($result))
                                {
                                    echo "<tr>";
                                    
                                        echo "<td>".$row['erp']."</td>";
                                        echo "<td>".$row['course_id']."</td>";
                                        echo "<td>".$row['subject']."</td>";
                                        echo "<td>".$row['subject_type']."</td>";
                                        echo "<td>".$row['attend_percentage']."%</td>";
                                        
                                    echo "</tr>";
                                }
                                echo "</tbody>";

                            echo "</table>";

                        }
                        else
                        {
                            echo "<h2>Nothing to see here !</h2>";
                        }
                    }
                    else
                    {
                        echo "Error in executing query ...";
                    }
                }               
                
            ?>
            
            </div>

            <!-- Modal for deleting entry -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Delete Attendance Entry</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                    
                        <div class="modal-body ">
                            
                        </div>
                    
                        <form class="modal-footer" method="post">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-danger" id="confirm-del" name="delete">
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <script type="text/javascript">

            $(".edit-btn").click(function() {
                var erp_id = $(this).attr("erp-id");
                var course_id = $(this).attr("course-id");
                var msg = "<p>ERP-ID : "+erp_id+"</p><p>Course-ID : "+course_id+"</p>";
                $(".modal-body").html(msg);
                $("#confirm-del").click(function() {
                    var id=course_id;
                    $("#confirm-del").html('<a href="del_attendance.php?course_id=' + id + '">Delete</a>');
                });
            });

        </script>

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    </body>

</html>