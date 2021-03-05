<?php
    
    session_start(); //starting the session, now we can access the $_SESSION array
    
    require_once "../connection.php";

    if( $_SESSION['id'] == "" )
    {
        header("Location : index.php");
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
        
        <title>Dashboard</title>

        <style type='text/css'>

            body{
                text-align: center;
            }
            
            h1{
                text-align: center;
                font-family : Verdana;
                letter-spacing : 2px;
                text-transform: uppercase;
                font-weight: bolder;
                color:#113550;
            }

            a{
                text-decoration: none;
                color: white;
            }

            a:hover {
                color: blue;
            }

            img{
                width: 22px;
                margin: 0px 15px;
            }

            button {
                margin : 0 auto;
                
            }

        </style>

    </head>

    <body>

    <?php include('../navbar.php'); ?>

        <div class="container" >
            
            <br/>
            <h1><i>Student Management System</i></h1>
            <br/>

            <div>

                <?php
                    
                    $char = $_SESSION['id'];
                    if($char[0] == 'A') //for the admin part
                    {
                        $query = "SELECT * from users";
                        $result = mysqli_query($link, $query);

                        if($result)
                        {
                            if(mysqli_num_rows($result) > 0)
                            {
                                echo "<table class='table table-bordered table-hover' style='border-color:black'>";
                                    
                                    echo "<thead class='table-dark'>";
                                        echo "<tr>";
                                            
                                            echo "<th>ERP-ID</th>";
                                            echo "<th>Name</th>";
                                            echo "<th>Year</th>";
                                            echo "<th>Email-id</th>";
                                        
                                        echo "</tr>";
                                    echo "</thead>";

                                    echo "<tbody>";
                                    while( $row = mysqli_fetch_array($result) )
                                    {
                                        //print_r($row);
                                        echo "<tr>";
                                            
                                            echo "<td>".$row['erp']."</td>";
                                            echo "<td>".$row['name']."</td>"; 
                                            echo "<td>".$row['year']."</td>";
                                            echo "<td>".$row['email']."</td>";
                                            echo "
                                            <td>
                                                <a href='../users/update.php?erp_id=".$row['erp']."'><img src='../img/edit.jpg'/></a>
                                                <a data-bs-toggle='modal' data-bs-target='#staticBackdrop' class='edit-btn' erp-id=".$row['erp']." ><img src='../img/delete.png'/></a>
                                            </td>";
                                            
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";

                                echo "</table>";

                                echo "<a href='../users/create_user.php' class='btn btn-primary'>Add New</a>";                                

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
                    else if($char[0] == 'S') //for the user part
                    {
                        $query = "SELECT * from users WHERE erp='".$char."' ";
                        $result = mysqli_query($link, $query);

                        if($result)
                        {
                            if(mysqli_num_rows($result) > 0)
                            {
                                echo "<table class='table table-bordered table-hover' style='border-color:black'>";
                                    
                                    echo "<thead class='table-dark'>";
                                        echo "<tr>";
                                            
                                            echo "<th>ERP-ID</th>";
                                            echo "<th>Name</th>";
                                            echo "<th>Year</th>";
                                            echo "<th>Email-id</th>";
                                        
                                        echo "</tr>";
                                    echo "</thead>";

                                    echo "<tbody>";
                                    while( $row = mysqli_fetch_array($result) )
                                    {
                                        //print_r($row);
                                        echo "<tr>";
                                            
                                            echo "<td>".$row['erp']."</td>";
                                            echo "<td>".$row['name']."</td>"; 
                                            echo "<td>".$row['year']."</td>";
                                            echo "<td>".$row['email']."</td>";
                                                                                    
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

        </div>

        <!-- Modal for deleting entry -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Delete User Entry</h5>
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

            <script type="text/javascript">

                $(".edit-btn").click(function() {
                    var erp_id = $(this).attr("erp-id");
                    //var course_id = $(this).attr("course-id");
                    //var trans_id = $(this).attr("trans-id");
                    var msg = "<p>ERP-ID : "+erp_id+"</p>";
                    //msg += "<p>Transaction-ID : "+trans_id+"</p>";
                    $(".modal-body").html(msg);
                    $("#confirm-del").click(function() {
                        var id=erp_id;
                        $("#confirm-del").html('<a href="../users/del_user.php?erp=' + id + '">Delete</a>');
                    });
                });

            </script>
        
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    </body>

</html>