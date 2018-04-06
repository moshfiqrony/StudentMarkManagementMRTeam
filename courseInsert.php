<?php
if(isset($_GET['submit'])){
    if($_GET['crsName']==""||$_GET['crsId']==""||$_GET['crdtHr']==""){
        $msg="Fill All Field";
    } else{
        include 'connection_db.php';
        $crsname=$_GET['crsName'];
        $crsid=$_GET['crsId'];
        $crdtHr=$_GET['crdtHr'];
        $sql="INSERT INTO `courseinfo` (`id`, `name`, `creditHour`) VALUES ('$crsid', '$crsname', '$crdtHr')";

        $qry=mysqli_query($conn,$sql);
        if($qry){
            $msg="Insertted";
        } else{
            $msg="Error " . mysqli_error($conn);
        }
    }
    
}
?>





<html>
    <head>
        <title>Course Insert</title>
        <style type="text/css">
            input{
                padding: 10px;
                margin-bottom: 5px;
                margin-top: 5px;
            }
            .activeinsc{
                 background-color: #4CAF50;
            }
        </style>
    </head>
    <body>
        <?php
            include'header.php';
            
        ?>
        
        <form action="" method="get">
            <center><table width="350px">
            <tr>
                    <?php if(isset($msg)){
                        echo "<center>".$msg."</center>";
                    }?>
                </tr>
                <tr><h1>Insert Course Information</h1></tr>
                
                <tr>
                    <td>
                        <lebel for ="courseName">Course Name</lebel>
                    </td>
                    <td>
                        <input type="text" required='' name="crsName" placeholder="Course Name">
                    </td>
                </tr>
                <tr>
                    <td>
                        <lebel for ="courseName">Course ID</lebel>
                    </td>
                    <td>
                        <input type="text" required='' name="crsId" placeholder="Course ID">
                    </td>
                </tr>
                <tr>
                    <td>
                        <lebel for ="courseName">Credit Hour</lebel>
                    </td>
                    <td>
                        <input type="text" required='' name="crdtHr" placeholder="Credit Hour">
                    </td>
                </tr>
                
                
            </table></center>
            
            <center><table width = "200px">
                <tr>
                    <td><button type="submit" name="submit">Submit</button></td>
                    <td><button type="reset" name="reset">Reset</button></td>
                    
                </tr>
                </table></center>
        
        </form>
        
        
        <?php
            
            include'footer.php';
        ?>
    </body>
</html>