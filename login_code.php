<?php
session_start();
include 'connection_db.php';
if(isset($_POST['login'])){
		$user_name=$_POST['user_name'];
		$user_pass=$_POST['user_pass'].'mrid';
		$sql="SELECT * FROM `userinfo` WHERE `user_name`='$user_name' AND `user_pass`='$user_pass'";
		$qry=mysqli_query($conn,$sql);
		if(mysqli_num_rows($qry)>0){
					$_SESSION['username']=$user_name;
					header('Location: login.php');
		} else{
			header('Location: login.php?msg=Please Register');
		}

	} elseif (isset($_POST['register'])){
	if($_POST['user_name']==""||$_POST['user_pass']==""||$_POST['re_user_pass']==""){
		header("Location: login.php?msg=Fill All Field To Register");
	} else{
		$user_name=$_POST['user_name'];
		$user_pass=$_POST['user_pass']."mrid";
		$re_user_pass=$_POST['re_user_pass']."mrid";
		$sql="SELECT * FROM `userinfo` WHERE `user_name`='$user_name' OR `user_pass`='$user_pass'";
		$qry=mysqli_query($conn,$sql);
		if(mysqli_num_rows($qry)>0){
			$row=mysqli_fetch_assoc($qry);
			if($row['user_name']==$user_name&&$row['user_pass']==$user_pass){
				header("Location: login.php?msg=User Name and Password Exist");
			} elseif($row['user_pass']==$user_pass){
				header("Location: login.php?msg=Password Exist");
			}
			elseif($row['user_name']==$user_name){
				header("Location: login.php?msg=User Name Exist");
			}
		}
		elseif($user_pass==$re_user_pass){
			
			$sql="INSERT INTO `userinfo` (`user_name`, `user_pass`) VALUES ('$user_name', '$user_pass')";
			$qry=mysqli_query($conn,$sql);
			if(!$qry){
				header("Location: login.php?msg=Problem To Register");
			} else{
				header("Location: login.php?msg=Successfuly Registred");
			}
		} else{
			header("Location: login.php?msg=Password Is Not Same");
		}
	}
}


?>