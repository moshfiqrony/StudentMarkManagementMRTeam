<?php
if(isset($_GET['submit'])){
    if($_GET['st_id']==""||$_GET['stName']==""||$_GET['email']==""){
        header("Location: stView.php?msg=Fill All Field And Try Again");
    } else{
        $id=$_GET['st_id'];
        $name=$_GET['stName'];
        $email=$_GET['email'];
        
        include 'connection_db.php';
        $sql="UPDATE `studentinfo` SET `id`='$id', `name`='$name', `email`='$email' WHERE `studentinfo`.`id`='$id' OR `studentinfo`.`email`='$email'";
        $qry=  mysqli_query($conn, $sql);
        if($qry){
            header("Location: stView.php?msg=Updatted");
        } else{
            header("Location: stView.php?msg=Error To UPDATE");
        }
    }
}

?>





<?php
include 'header.php';
include 'connection_db.php';
$id=$_GET['id'];
$sql="SELECT * FROM `studentinfo` WHERE `id`='$id'";
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
                        Student ID 
                    </td>
                    <td>
                        <input size="30" type="text" name="st_id" value="<?php echo $row['id'];?>" readonly> 
                    </td>
                </tr>
                <tr>
                    <td>
                        Student Name
                    </td>
                    <td>
                        <input size="30"type="text" name="stName" value="<?php echo $row['name'];?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        Email 
                    </td>
                    <td>
                        <input size="30" type="text" name="email" value="<?php echo $row['email'];?>" >
                    </td>
                </tr>
                
                <tr>
                    <td><button type="submit" name="submit">Submit</button></td>
                    <td><button type="reset" name="reset">Reset</button></td>
                    
                </tr>
                </table></center>
        </form>
    </body>
</html>
<?php
include 'footer.php';
?>