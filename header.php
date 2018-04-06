<?php  
session_start();
if(!isset($_SESSION['username'])){
    header('Location: login.php');
}
?>
<html>
    <head>
        <style>
        body{
            width: 100%;
            background-color: #E6E6E6;
        }
            *{
                margin: 0;
                padding: 0;
            }
            
            h1{
                text-align: center;
            }
            ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
                background-color: #333;
            }


            li {
                float: left;
            }

            li a {
                display: block;
                color: white;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
            }

            li a:hover {
                background-color: #B0C5E3;
                color: black;
            }
            .header{
                margin-bottom: 10px
            }
            .h_text{
                overflow: hidden;
                width: 100%;
                height: 86px;
                background-color: activecaption;
                padding-top:  20px;
            }
            input{
                border: 1px solid black;
                border-radius: 5px;
            }
        </style>
    </head>
    <body>
        <div class="header">
            <div class="h_text">
                <h1>Student Grade System</h1>
                <ul>
                    <li><a class="activeh" href="login.php">Home</a></li>
                    <li><a class="activeinsm" href="insert.php">Insert Marks</a></li>
                    <li><a class="activeinsc" href="courseInsert.php">Insert Course Info</a></li>
                    <li><a class="activeinss" href="insert_st_info.php">Insert Student Info</a></li>
                    <li><a class="activevws" href="stView.php">View Student Info</a></li>
                    <li><a class="activevwc" href="crsView.php">View Course Info</a></li>
                    <li><a class="activevw" href="view.php">View Result</a></li>
                    <li style="float: right;"><a href="logout.php">Logout<?php echo ' '. $_SESSION['username']?></a></li>
              </ul>
            </div>
            
        </div>
    </body>
</html>