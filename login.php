<!DOCTYPE html>
<html>

<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body background="imgs/login-background.jpeg">

	<!--Padding Top = pt-4-->
	<!--Padding all sides = p-4-->
	<!--Margin Bottom = mb-4-->
	<!--Margin Top = mt-4-->

	<div class="container p-5 border mt-5">
		<form action="logincheck.php" method="post">
			<center>
				<h2>LOGIN</h2>
				<?php if (isset($_GET['error'])) { ?>
					<p class="error">
						<?php echo $_GET['error']; ?>
					</p>
				<?php } ?>

				<!--Username DIV-->
				<div class="mb-3 mt-3">
					<p><input type="text" name="uname" placeholder="Username"><br></p>
				</div>

				<!--Password DIV-->
				<div class="mb-4">
					<p><input type="password" name="password" placeholder="Password"><br></p>
				</div>

				<!--Submit DIV-->
				<button type="submit" class="btn btn-primary">Login</button>
				<div class="mt-3"><a href="register.php" class="ca">Create an account</a></p>
			</center>
		</form>
	</div>
</body>

</html>