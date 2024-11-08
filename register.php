<!DOCTYPE html>
<html>
     <?php 
     include 'functions.php';
     ?>
<head>
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

	<title>SIGN UP</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<body>

     <!--HEADER-->
<?=template_header('Home')?>





	<!--LOGIN CONTAINER-->
     <center>
     <form action="register-check.php" method="post">
     
     	<h2>SIGN UP</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

               
               
               <!-- Name -->
               <div class="mb-3 mt-3">
          <?php if (isset($_GET['name'])) { ?>
                    <input  type="text" name="name" value="<?php echo $_GET['name']; ?>" >
               <?php } else { ?>
                    <input type="text" name="name" placeholder="Name">
               <?php } ?>
               </div>
          
          
          
          <!-- Username -->
          <div class="mb-3 mt-3">
          <?php if (isset($_GET['uname'])) { ?>
               <input type="text" name="uname" value="<?php echo $_GET['uname']; ?>">
          <?php } else { ?>
               <input type="text" name="uname" placeholder="Username">
          <?php } ?>
          </div>
               
               
          
               <!-- Password & Retype Password -->
               <div class="mb-3 mt-3">
               <input type="password"
                          name="password"
                          placeholder="Password">
               </div>
                         
               <div class="mb-3 mt-3">
                    <input type="password"
                          name="re_password"
                          placeholder="Retype Password">
               </div>
                         
                
                <!-- Contact -->
                <div class="mb-3 mt-3">
                <input type="text" 
                    name="contact" 
                    placeholder="Contact Number">
                </div>
                
                
                
                <!-- Email -->
                <div class="mb-3 mt-3">
                    <input type="email" 
                    name="email" 
                    placeholder="Email">
                </div>

				<!-- Email -->
                <div class="mb-3 mt-3">
                    <input type="text" 
                    name="address" 
                    placeholder="Address">
                </div>
                
          <button type="submit" class="btn btn-primary">Sign Up</button>
          <div class="mt-3"><a href="index.php?page=login" class="ca">Already have an account?</a></div>
     </form>
     </center>
     
<?=template_footer()?>
</body>
</html>