<?php
include 'header.php';
include 'connection_db.php';
$id=$_GET['id'];
$sql="SELECT * FROM `marks` WHERE `id`='$id'";
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
                margin-bottom: 10px;
            }
        </style>
    </head>
    <body>
    <center><form action="edit_code.php" method="get">
            <table width="300px">
                <tr>
                    <td>
                        Student ID 
                    </td>
                    <td>
                        <input type="text" name="st_id" value="<?php echo $row['st_id'];?>" readonly> 
                    </td>
                </tr>
                <tr>
                    <td>
                        Course ID 
                    </td>
                    <td>
                        <input type="text" name="crs_id" value="<?php echo $row['crs_id'];?> " readonly>
                    </td>
                </tr>
                <tr>
                    <td>
                        First Term 
                    </td>
                    <td>
                        <input type="text" name="frstTerm" value="<?php echo $row['frstTerm'];?>" >
                    </td>
                </tr>
                <tr>
                    <td>
                        Mid Term 
                    </td>
                    <td>
                        <input type="text" name="midTerm" value="<?php echo $row['midTerm'];?> ">
                    </td>
                </tr>
                <tr>
                    <td>
                        Attendance 
                    </td>
                    <td>
                        <input type="text" name="attn" value="<?php echo $row['attn'];?>" >
                    </td>
                </tr>
                <tr>
                    <td>
                        Assignment 
                    </td>
                    <td>
                        <input type="text" name="assign" value="<?php echo $row['assign'];?>" >
                    </td>
                </tr>
                <tr>
                    <td>
                        Project 
                    </td>
                    <td>
                        <input type="text" name="prjct" value="<?php echo $row['prjct'];?>" >
                    </td>
                </tr>
                <tr>
                    <td>
                        Final Marks 
                    </td>
                    <td>
                        <input type="text" name="final_marks" value="<?php echo $row['final_marks'];?>" >
                    </td>
                </tr>
                <tr>
                    <td><button type="submit" name="submit">Submit</button></td>
                    <td><button type="reset" name="reset">Reset</button></td>
                    
                </tr>
            </table>
        </form></center>
    </body>
</html>
<?php
include 'footer.php';
?>