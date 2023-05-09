<?php
session_start(); 
include "connect_db.php";

if (isset($_POST['otpcode'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$otpcode = validate($_POST['otpcode']);

	if (empty($otpcode)) {
		header("Location: verificationcode.php?error=Please enter OTP code");
	    exit();
	}
	else{
	
		$sql = "SELECT otpcode FROM Credential WHERE otpcode='$otpcode'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['email'] === $email && $row['otpcode'] === $otpcode) {
            	$_SESSION['email'] = $row['email'];
            	header("Location: index.php?page=reset_pass");
		        exit();
            }else{
				header("Location: verificationcode.php?error=Incorrect OTP code");
		        exit();
			}
		}else{
			header("Location: verificationcode.php?error=Incorrect OTP code");
	        exit();
		}
	}
	
}else{
	header("Location: index.php?page=verificationcode");
	exit();
}