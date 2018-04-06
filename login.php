<?php     
session_start();
if(isset($_SESSION['username'])){
    ?>
    <html>
    <head>
        <style>
        body{
            width: 100%;
            background-color: #E6E6E6;
            background-image: url(bg_login.jpg);
            background-repeat: no-repeat;
            background-size: 100%;
            color: white;
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
            .activeh{
                 background-color: #4CAF50;
            }
            .bodyl{
                height: 254px;
            }
            .bodyl h1{
                margin-top: 180px;
            }
            .bodyl h1,h3{
                text-shadow: 0px 0px 5px black;
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
<div class="bodyl">
<?php
    echo "<center><h1>WELCOME ".$_SESSION['username']."</h1></center>";
?>
<center>
    <h3>
        To your Grade Sheet Database Management System
    </h3>
</center></div>
<?php
    include 'footer.php';
?>
        </body>
</html>
<?php
} else{
?>



<!DOCTYPE html
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <style>
        body{
            width: 100%;
            background-color: #E6E6E6;
            background-image: url(bg_login.jpg);
            background-repeat: no-repeat;
            background-size: 100%;
            color: white;
        }
            input{
                padding: 10px;
                margin-bottom: 10px;
                border: 1px solid black;
                border-radius: 5px;
            }
            .login_box{
                width: 250px;
                float: left;
                margin-bottom: 10px;
                height: 375px;
            }
            .main_body{
                margin: 0 auto;
                padding: 0;
                width: 500px; 
                
               }
            *{
                margin: 0;
                padding: 0
            }
            .activeh{
                 background-color: #4CAF50;
            }
            .header{
                padding-top: 20px;
                padding-bottom: 20px;
                margin-bottom: 10px;
                background-color: #CCCCCC;
            }
            h1,p{
                color: black;
            }
        </style>
            
    </head>
    <body>
        
            <div class="header">
            <center><h1>Student Grade System</h1></center>
            </div>
            <center><table><tr>
                <td>
                <?php if(isset($_GET['msg'])){
                    echo "<h2>".$_GET['msg']."</h2>";
                    }?>
                </td>
            </tr></table></center>
        <div class = "main_body">
            <div class="login_box">
                <form action="login_code.php" method="POST">
                <center><table>
                <tr><td>
                   <center><lebel><h2>Log In</h2></lebel></center>
                   </td></tr>
                <tr><td>
                   <input type="text" required='' name="user_name" placeholder="User Name">
                   </td></tr>
                   <tr><td>
                    <input type="password" required='' name="user_pass" placeholder="Password">
                    </td></tr>
                    <tr><td>
                    <input name="login" type="submit" value="Login">
                    <input type="reset" value="Reset">
                    </td></tr>
                </table></center>
                </form>
                </div>

                <div class="login_box">
                <form action="login_code.php" method="POST">
                <center><table>
                <tr><td>
                   <center><lebel><h2>Register</h2></lebel></center>
                   </td></tr>
                <tr><td>
                   <input type="text" required='' name="user_name" placeholder="User Name">
                   </td></tr>
                   <tr><td>
                    <input type="password" required='' name="user_pass" placeholder="Password">
                    </td></tr>
                    <tr><td>
                    <input type="password" required='' name="re_user_pass" placeholder="Retype Password">
                    </td></tr>
                    <tr><td>
                    <input name="register" type="submit" value="Register">
                    <input type="reset" value="Reset">
                    </td></tr>
                </table></center>
                </form>

            </div>
            <center><h1 font-size="20px"><a href="index.php">Back</a></h1></center>
        </div>

        <?php
            include 'footer.php';
        ?>
    </body>
</html>
<?php }?>