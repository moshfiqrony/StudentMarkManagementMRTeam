<?php
if(isset($_GET['submit'])){
    if($_GET['crs_id']==""||$_GET['crsName']==""||$_GET['creditHour']==""){
        header("Location: crsView.php?msg=Fill All Field And Try Again");
    } else{
        $id=$_GET['crs_id'];
        $name=$_GET['crsName'];
        $creditHour=$_GET['creditHour'];
        
        include 'connection_db.php';
        $sql="UPDATE `courseinfo` SET `id`='$id', `name`='$name', `creditHour`='$creditHour' WHERE `courseinfo`.`id`='$id' OR `courseinfo`.`name`='$name'";
        $qry=  mysqli_query($conn, $sql);
        if($qry){
            header("Location: crsView.php?msg=Updatted");
        } else{
            header("Location: crsView.php?msg=Error To UPDATE");
        }
    }
}

?>





<?php
include 'header.php';
include 'connection_db.php';
$id=$_GET['id'];
$sql="SELECT * FROM `courseinfo` WHERE `id`='$id'";
$result=  mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
    $row=mysqli_fetch_assoc($result);
}
?>
<html>
    <head>
        <title>Edit</title>
        <style type="text/css">
            input{
                padding: 10px;
                margin-bottom: 5px;
                margin-top: 5px;
            }
        </style>
    </head>
    <body>
   <form action="" method="get">
            <center><table width="350px">
                <tr>
                    <td>
                        Course ID 
                    </td>
                    <td>
                        <input size="30" type="text" name="crs_id" value="<?php echo $row['id'];?>" readonly> 
                    </td>
                </tr>
                <tr>
                    <td>
                        Course Name
                    </td>
                    <td>
                        <input size="30"type="text" name="crsName" value="<?php echo $row['name'];?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        Credit Hour 
                    </td>
                    <td>
                        <input size="30" type="text" name="creditHour" value="<?php echo $row['creditHour'];?>" >
                    </td>
                </tr>
                
                <tr>
                    <td><button type="submit" name="submit">Update</button></td>
                    <td><button type="reset" name="reset">Reset</button></td>
                    
                </tr>
                </table></center>
        </form>
    </body>
</html>
<?php
include 'footer.php';
?>