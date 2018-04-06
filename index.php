<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <style type="text/css">
    *{
        margin: 0;
        padding: 0;
    }
    .main{
        margin: 0 auto;
        padding: 0;
        width: 100%;
        height: 100%;
        margin-top: 100px;
        text-align: center;
    }
    .nav{
        width: 710px;
        margin: 0 auto;
    }
        ul{
            list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
                margin-top: 30px;
                
        }
        ul li{
            float: left;
            padding: 10px;
            padding-right: 3px;
            padding-left: 3px;
            list-style-type: none;
            text-align: center;
        }
        ul li a{
            display: block;
            text-align: center;
            padding: 10px 60px;
            text-decoration: none;
            color: black;
            border: 1px solid #969696;
            border-radius: 10px;
        }
        ul li a:hover{
            background-color: #DEDEDE;
            border: 1px solid #66D9EF;
            box-shadow: 0 0 5px 0px;
        }

    </style>



</head>
<body>
    <div class="main" id="main">
        <img src="silver.png" alt="silver Logo">
        <div class="nav"><ul>
            <li><strong><a href="login.php">Login</a></strong></li>
            <li><strong><a href="login.php">Register</a></strong></li>
            <li><strong><a href="http://iubat.edu/web1/index.php/about/brief-history/">About</a></strong></li>
            <li><strong><a href="http://iubat.edu/web1/">Website</a></strong></li>
        </ul>
        </div>
    </div>
</body>
</html>