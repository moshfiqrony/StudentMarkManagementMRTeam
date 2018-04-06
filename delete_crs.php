<?php
include 'header.php';
include 'connection_db.php';

$id=$_GET['id'];

$sql="DELETE FROM `courseinfo` WHERE `courseinfo`.`id` = '$id'";

$result=  mysqli_query($conn, $sql);
header('Location: crsView.php?msg=DELETED');