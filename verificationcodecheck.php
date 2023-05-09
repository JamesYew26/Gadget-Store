<?php
include "connect_db.php";
session_start();

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

    if (isset($_POST["key"]))
    {
        $key = $_POST["key"];
 
        // connect with database
        $conn=mysqli_connect('localhost','username','password','GadgetStore');
 
        // mark email as verified
        $sql = "UPDATE Credential SET email_verified_at = NOW() WHERE email = '" . $email . "' AND verification_code = '" . $verification_code . "'";
        $result  = mysqli_query($conn, $sql);
 
        if (mysqli_affected_rows($conn) == 0)
        {
            die("Verification code failed.");
        }
 
        echo "<p>You can login now.</p>";
        exit();
    }
 
?>