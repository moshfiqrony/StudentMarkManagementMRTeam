<?php

include 'connection_db.php';
if(!$conn){
    die("Error" . mysqli_error($conn));
} elseif ($_POST["st_id"] == "" || $_POST["crs_id"] == "" || $_POST["marks"] == "" ) {
    header('Location: insert.php?msg=Fill All The Field');
} else{
    
    $stdnt_id = $_POST["st_id"];
    $course_id = $_POST["crs_id"];
    $term = $_POST["term"];
    $totalMrks=0;
    $frstTerm=0;
    $midTerm=0;
    $finalTerm=0;
    $assign=0;
    $prjct=0;
    $attn=0;
    
    $sql="SELECT * FROM `dbstudentgrade`.`marks` WHERE st_id = '$stdnt_id' AND crs_id='$course_id'";



    $sql="SELECT * FROM `dbstudentgrade`.`marks` WHERE st_id = '$stdnt_id' AND crs_id='$course_id'";
    $result=  mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
        while ($row=mysqli_fetch_assoc($result)){
            $frstTerm=$row['frstTerm'];
            $midTerm=$row['midTerm'];
            $finalTerm=$row['final_marks'];
            $attn=$row['attn'];
            $assign=$row['assign'];
            $prjct=$row['prjct'];
            switch ($term){
                case 'frstTerm':
                    $frstTerm=$_POST['marks'];
                    break;
                case 'midTerm':
                    $midTerm=$_POST['marks'];
                    break;
                case 'finalTerm':
                    $finalTerm=$_POST['marks'];
                    break;
                case 'assign':
                    $assign=$_POST['marks'];
                    break;
                case 'prjct':
                    $prjct=$_POST['marks'];
                    break;
                case 'attn':
                    $attn=$_POST['marks'];
                    break;
            }
            $totalMrks=$frstTerm + $midTerm + $finalTerm + $attn + $assign + $prjct;
                $sql="UPDATE `marks` SET `frstTerm`='$frstTerm', `midTerm`='$midTerm', `attn`='$attn', `assign`='$assign', `prjct`='$prjct', `final_marks`='$finalTerm', `total_marks`='$totalMrks', `grade`='' WHERE `marks`.`st_id` = '$stdnt_id' AND `marks`.`crs_id` = '$course_id';";
           
         $qry = mysqli_query($conn, $sql);
         if(!$qry){
             echo 'Error'. mysqli_error($conn);
         } else{
             mysqli_close($conn);
             header('Location: insert.php?msg=Updatted successfully');

         }
        }
    }
    else{
        switch ($term){
                case 'frstTerm':
                    $frstTerm=$_POST['marks'];
                    break;
                case 'midTerm':
                    $midTerm=$_POST['marks'];
                    break;
                case 'finalTerm':
                    $finalTerm=$_POST['marks'];
                    break;
                case 'assign':
                    $assign=$_POST['marks'];
                    break;
                case 'prjct':
                    $prjct=$_POST['marks'];
                    break;
                case 'attn':
                    $attn=$_POST['marks'];
                    break;
            }
            $totalMrks=$frstTerm + $midTerm + $finalTerm + $attn + $assign + $prjct;
        $sql="INSERT INTO `marks` (`st_id`, `crs_id`, `frstTerm`, `midTerm`, `attn`, `assign`, `prjct`, `final_marks`, `total_marks`) VALUES ('$stdnt_id', '$course_id', '$frstTerm', '$midTerm', '$attn', '$assign', '$prjct', '$finalTerm', '$totalMrks')";
        $qry = mysqli_query($conn, $sql);
         if(!$qry){
             echo 'Error'. mysqli_error($conn);
         } else{
             mysqli_close($conn);
             header('Location: insert.php?msg=Insertted successfully');
         }
    }
    
}