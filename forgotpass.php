<html>

<head>
   <title>Forgot Password</title>
   <style>
      body {
         display: flex;
         flex-direction: column;
         font-family: sans-serif;
         box-sizing: border-box;
      }

      * {
         font-family: sans-serif;
         box-sizing: border-box;
      }

      form {
         margin-top: 30px;
         width: 500px;
         border: 2px solid #ccc;
         padding: 30px;
         background: #fff;
         border-radius: 15px;
      }

      h2 {
         text-align: center;
         margin-bottom: 40px;
      }

      input {
         display: block;
         border: 2px solid #ccc;
         width: 95%;
         padding: 10px;
         margin: 10px auto;
         border-radius: 5px;
      }

      label {
         color: #888;
         font-size: 18px;
         padding: 10px;
      }

      .error {
         background: #F2DEDE;
         color: #A94442;
         padding: 10px;
         width: 95%;
         border-radius: 5px;
         margin: 20px auto;
      }

      .success {
         background: #ABEBC6;
         color: #239B56;
         padding: 10px;
         width: 95%;
         border-radius: 5px;
         margin: 20px auto;
      }
   </style>
   <link rel="stylesheet" type="text/css" href="style.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<?php
include 'functions.php';
use PHPMailer\PHPMailer\PHPMailer;

//forgot password part
include('connect_db.php');
if (isset($_POST["email"]) && (!empty($_POST["email"]))) {
   $email = $_POST["email"];
   $email = filter_var($email, FILTER_SANITIZE_EMAIL);
   $email = filter_var($email, FILTER_VALIDATE_EMAIL);



   if (!$email) {
      $error .="<p>Invalid email address please type a valid email address!</p>";
      }else{
      $sel_query = "SELECT * FROM `Credential` WHERE email='".$email."'";
      $results = mysqli_query($conn,$sel_query);
      $row = mysqli_num_rows($results);
      if ($row==""){
      $error .= "<p>No user is registered with this email address!</p>";
      }
     }







   if ($error != "") {
      echo "<div class='error'>" . $error . "</div>
      <p><center><a href='javascript:history.go(-1)'><button class='btn btn-primary'>Go Back</button></a></center></p>";
   } else {
      $expFormat = mktime(
         date("H"),
         date("i"),
         date("s"),
         date("m"), date("d") + 1,
         date("Y")
      );
      $expDate = date("Y-m-d H:i:s", $expFormat);
      $key = rand(999999, 111111);
      // Insert Temp Table
      mysqli_query(
         $conn,
         "INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`)
VALUES ('" . $email . "', '" . $key . "', '" . $expDate . "');"
    );

      $output = '<p>Dear user,</p>';
      $output .= '<p>Please use the following OTP code to reset your password.</p>';
      $output .= '<br><br>';
      $output .= '<h1>' . $key . '</h1>';
      $output .= '<br><br>';
      $output .= '<p>The code will expire after 1 day for security reason.</p>';
      $output .= '<p>If you did not request this forgotten password email, no action 
is needed, your password will not be reset. However, you may want to log into 
your account and change your security password as someone may have guessed it.</p>';
      $output .= '<p>Thanks,</p>';
      $output .= '<p>Gadget Store, Group 1</p>';
      $body = $output;
      $subject = "Password Recovery - Gadget Store";

      $email_to = $email;
      $fromserver = "yewjc-wm22@student.tarc.edu.my";
      require 'vendor/autoload.php';
      $mail = new PHPMailer();
      $mail->IsSMTP();
      $mail->Host = "smtp.gmail.com"; // Enter your host here
      $mail->SMTPAuth = true;
      $mail->Username = "yewjc-wm22@student.tarc.edu.my"; // Enter your email here
      $mail->Password = "020206140497"; //Enter your password here
      $mail->Port = 587;
      $mail->IsHTML(true);
      $mail->From = "yewjc-wm22@student.tarc.edu.my";
      $mail->FromName = "Gadget Store";
      $mail->Sender = $fromserver; // indicates ReturnPath header
      $mail->Subject = $subject;
      $mail->Body = $body;
      $mail->AddAddress($email_to);
      if (!$mail->Send()) {
         echo "Mailer Error: " . $mail->ErrorInfo;
      } else {
         echo "<center>
         <form action='verificationcode.php' method='post>
         <div class='success'>
<p>An email has been sent to you with instructions on how to reset your password. </p> 
</div>
<button type='submit' class='btn btn-primary mt-5'>Verify OTP</button>
</form>
</center>
<br /><br /><br />";
      }
   }









   

} else {
   ?>
   <!--HEADER-->
   <?= template_header('Home') ?>

   <center>
      <form method="post" action="" name="reset">
         <h2>Forgot Password</h2>
         <input class="mt-5" type="email" name="email" placeholder="username@email.com" />
         <button type="submit" class="btn btn-primary mt-5">Send OTP</button>
      </form>
   </center>

   <p>&nbsp;</p>
   <p>&nbsp;</p>
   <p>&nbsp;</p>
<?php } ?>


<?= template_footer() ?>

</html>