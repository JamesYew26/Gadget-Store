<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="logincheck.php" method="post">
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<p><label>Username</label>
            <input type="text" name="uname"><br></p>

     	<p><label>Password</label>
            <input type="password" name="password"><br></p>

     	<button type="submit">Login</button>
          <a href="register.php" class="ca">Create an account</a>
     </form>
</body>
</html>