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
    } elseif ($password !== $repassword) {
        header("Location: reset_pass.php?error=Please make sure your passwords are matched");
        exit();
    } else {
        // hashing the password
        $password = md5($password);

        mysqli_query($conn, "UPDATE `credential` SET password = '$password' WHERE email='$email';");
        header("Location: login.php?success=Password successfully changed");
        exit();
    }
} else {
     header("Location: login.php?success=Password successfully changed");
    exit();
}

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

