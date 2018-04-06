<?php
if(isset($_GET['submit'])){
        include 'connection_db.php';
        $id=$_GET['stid'];
        $name=$_GET['stname'];
        $email=$_GET['email'];
        $sql="INSERT INTO `studentinfo` (`id`, `name`, `email`) VALUES ('$id', '$name', '$email')";

        $qry=mysqli_query($conn,$sql);
        if($qry){
            $msg="Insertted";
        } else{
            $msg="Error".mysqli_error($conn);
        }
}
?>

<html>
    <head>
        <title>Student Information</title>
        <style type="text/css">
            input{
                padding: 10px;
                margin-bottom: 5px;
                margin-top: 5px;
            }
            .activeinss{
                 background-color: #4CAF50;
            }
        </style>
    </head>
    <body>
    <?php
        include 'header.php';
        ?>
        <form action="" method="get">
            <center><table width="350px">
                            <tr>
                    <?php if(isset($msg)){
                        echo "<center>".$msg."</center>";
                    }?>
                </tr>
                <tr><h1>Insert Student Infornation</h1></tr>

                <tr>
                    <td>
                        <lebel>Student Name</lebel>
                    </td>
                    <td>
                        <input type="text" required='' name="stname" placeholder="Student Name">
                    </td>
                </tr>
                <tr>
                    <td>
                        <lebel>Student ID</lebel>
                    </td>
                    <td>
                        <input type="text" required='' name="stid" placeholder="Student ID">
                    </td>
                </tr>
                <tr>
                    <td>
                        <lebel>E-Mail</lebel>
                    </td>
                    <td>
                        <input type="text" required='' name="email" placeholder="E-Mail">
                    </td>
                </tr>
                
                
            </table></center>
            
            <center><table width = "200px">
                <tr>
                    <td><button type="submit" name="submit">Submit</button></td>
                    <td><button type="reset" name="reset">Reset</button></td>
                    
                </tr>
                </table></center>\
                <?php
                    include 'footer.php';
                    ?>

    </body>
</html>
