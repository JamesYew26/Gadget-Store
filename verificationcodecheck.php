<?php
session_start();
include "connect_db.php";

if (isset($_POST['key']) && isset($_POST['email'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $otp = validate($_POST['key']);
    $email = validate($_POST['email']);

    if (empty($otp)) {
        header("Location: verificationcode.php?error=OTP code is required");
        exit();
    } else if (empty($email)) {
        header("Location: verificationcode.php?error=Email is required");
        exit();
    } else {
        // hashing the password
        $pass = md5($pass);


        $sql = "SELECT * FROM password_reset_temp WHERE key='$otp' AND email='$email'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['email'] === $email && $row['key'] === $otp) {
                $_SESSION['email'] = $row['email'];
                header("Location: reset_pass.php?page=itempage");
                exit();
            } else {
                header("Location: verificationcode.php?error=Incorrect 1 OTP Code");
                exit();
            }
        } else {
            header("Location: verificationcode.php?error=Incorect 2 OTP Code");
            exit();
        }
    }

} else {
    header("Location: index.php?page=verificationcode");
    exit();
}