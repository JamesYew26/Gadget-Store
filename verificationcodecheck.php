<?php
include "connect_db.php";

session_start();
$conn=mysqli_connect('localhost','username','password','GadgetStore');
$key=$_POST['key'];
$email=$_SESSION['email'];
$res=mysqli_query($conn,"select * from password_reset_temp where email='$email' and key='$key'");
$count=mysqli_num_rows($res);
if($count>0){
	mysqli_query($conn,"update user set key='' where email='$email'");
	$_SESSION['IS_LOGIN']=$email;
	echo "yes";
}else{
	echo "not_exist";
}