<!--HTML Navbar Doc , to be included in all files-->
<html>
    
    <head>
    
        <style type="text/css">

            .my-navbar a {
                font-size: 16px;
                font-weight: bold;
                margin-right: 15px;
            }

            #profile-btn img {
                padding-top:2px;
                width: 35px;
                margin: 0px 15px;
            }

            .my-navbar a:hover{
                background-color: #0F7ACE;
                border-radius: 10px;
            }        
            
            #profile-btn {
                margin-left: 820px;
                font-size : 14px;
                margin-top: 1px;
            }

            #profile-btn:hover {
                background-color: none;
            }

            #logout-btn {
                margin-left: 20px;
            }

            body {
                background : url('../img/webpage-bg.jpg');
                background-size: cover;
            }

        </style>

        <!-- JQuery File -->
        <script type="text/javascript" src="../jquery.min.js"></script>
           
    </head>

    <body>

        <div class="my-navbar">

            <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #58B5FF;">
                <div class="container-fluid">
                    
                    <div class="navbar-nav">
                        
                        <a class="nav-link" href="../home/home.php">Home</a>

                        <a class="nav-link" href="../attendance/attendance.php">Attendance</a>
            
                        <a class="nav-link" aria-current="page" href="../courses/courses.php">Courses</a>
                        
                        <a class="nav-link" href="../exam/exams.php">Exam</a>
                        
                        <a class="nav-link" href="../fees/fees.php">Fees</a>

                        <a class="nav-link" href="../faculty/faculty.php">Faculty</a>

                        <?php
                            echo '<a id="profile-btn"  href="../users/update.php?erp_id='.$_SESSION['id'].'" ><img src="../img/account.png" /></a>';
                        ?>

                        <a id='logout-btn' href="../home/index.php?logout=1" class='btn btn-primary'>Logout</a>
            
                    </div>
                    
                    </div>
                </div>
            </nav>

        </div>
        
    </body>
</html>
