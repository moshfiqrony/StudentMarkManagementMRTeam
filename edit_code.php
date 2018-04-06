<?php

include 'connection_db.php';

$st_id=$_GET['st_id'];
$crs_id=$_GET['crs_id'];
$totalMrks=0;
$frstTerm=$_GET['frstTerm'];
$midTerm=$_GET['midTerm'];
$finalTerm=$_GET['final_marks'];
$assign=$_GET['assign'];
$prjct=$_GET['prjct'];
$attn=$_GET['attn'];
$totalMrks=$frstTerm + $midTerm + $finalTerm + $attn + $assign + $prjct;
$sql="UPDATE `marks` SET `frstTerm`='$frstTerm', `midTerm`='$midTerm', `attn`='$attn', `assign`='$assign', `prjct`='$prjct', `final_marks`='$finalTerm', `total_marks`='$totalMrks', `grade`='' WHERE `marks`.`st_id` = '$st_id' AND `marks`.`crs_id` = '$crs_id';";
$result=  mysqli_query($conn, $sql);
header('Location: view.php');

