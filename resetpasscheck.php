<?php

session_start();
include "connect_db.php";

if (isset($_POST['password']) && isset($_POST['repassword']) && isset($_POST['email'])) {

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    
    $password = validate($_POST['password']);
    $repassword = validate($_POST['repassword']);
    $email = validate($_POST['email']);

    
    if (empty($password)) {
        header("Location: reset_pass.php?error=Password is required");
        exit();
    } else if (empty($repassword)) {
        header("Location: reset_pass.php?error=Retype Password is required");
        exit();
    } else if (empty($email)) {
        header("Location: reset_pass.php?error=Email is required");
        exit();
    }
    elseif ($password !== $repassword) {
        header("Location: reset_pass.php?error=Please make your passwords are matched");
        exit();
    } else {
        // hashing the password
        $password = md5($password);

        $sql = "UPDATE `credential` SET password = '$password' WHERE email = '$email';";
                $result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['email'] === $email && $row['password'] === $password) {
            	$_SESSION['email'] = $row['email'];
                
                
                header("Location: index.php?page=login");
                exit();
            } else {
                header("Location: reset_pass.php?error=Please make your passwords are matched");
                exit();
            }
        } else {
            header("Location: reset_pass?error=Please make your passwords are matched");
            exit();
        }
    }
} else {
    header("Location: index.php?page=login");
    exit();
}

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

