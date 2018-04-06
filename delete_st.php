<?php
include 'header.php';
include 'connection_db.php';

$id=$_GET['id'];

$sql="DELETE FROM `studentinfo` WHERE `studentinfo`.`id` = '$id'";

$result=  mysqli_query($conn, $sql);
header('Location: stView.php?msg=DELETED');