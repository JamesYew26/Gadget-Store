<?php 
session_start(); 
include "connect_db.php";

if (isset($_POST['uname']) && isset($_POST['password'])
    && isset($_POST['name']) && isset($_POST['re_password'])
        && isset($_POST['gender']) && isset($_POST['skills'])
        && isset($_POST['contact']) && isset($_POST['email'])
        && isset($_POST['college'])) {

	function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
	}
        
        $uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	$re_pass = validate($_POST['re_password']);
	$name = validate($_POST['name']);
        
        $gender = validate($_POST['gender']);
        $skills = validate($_POST['skills']);
        
        $contact = validate($_POST['contact']);
        $email = validate($_POST['email']);
        $college = validate($_POST['college']);
        
        

	$user_data = 'uname='. $uname. '&name='. $name;


	if (empty($uname)) {
		header("Location: register.php?error=User Name is required&$user_data");
	    exit();
	}else if(empty($pass)){
        header("Location: register.php?error=Password is required&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: register.php?error=Re Password is required&$user_data");
	    exit();
	}
        
        else if(empty($gender)){
        header("Location: register.php?error=Gender is required&$user_data");
	    exit();
	}
        
        else if(empty($skills)){
        header("Location: register.php?error=Skills is required&$user_data");
	    exit();
	}
        
        else if(empty($contact)){
        header("Location: register.php?error=Contact number is required&$user_data");
	    exit();
	}
        
        else if(empty($email)){
        header("Location: register.php?error=Email is required&$user_data");
	    exit();
	}
        
        else if(empty($college)){
        header("Location: register.php?error=College is required&$user_data");
	    exit();
	}
        
        else if(empty($re_pass)){
        header("Location: register.php?error=Re Password is required&$user_data");
	    exit();
	}

	else if(empty($name)){
        header("Location: register.php?error=Name is required&$user_data");
	    exit();
	}
        
        else if($pass !== $re_pass){
        header("Location: register.php?error=The confirmation password  does not match&$user_data");
	    exit();
	}

	else{

		// hashing the password
        $pass = md5($pass);

	    $sql = "SELECT * FROM Credential WHERE username ='$uname' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: register.php?error=The username is taken try another& $user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO Credential(name, username, password, gender, skills, contact, email, college) "
                   . "VALUES('$name', '$uname', '$pass', '$gender', '$skills','$contact','$email','$college')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: register.php?success=Your account has been created successfully");
	         exit();
           }else {
	           	header("Location: register.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: register.php");
	exit();
}