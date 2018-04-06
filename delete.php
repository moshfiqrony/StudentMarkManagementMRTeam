<?php
include 'header.php';
include 'connection_db.php';

$id=$_GET['id'];

$sql="DELETE FROM `marks` WHERE `marks`.`id` = '$id'";

$result=  mysqli_query($conn, $sql);
header('Location: view.php?msg=DELETED');