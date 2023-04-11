<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="register-check.php" method="post">
     	<h2>SIGN UP</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

               
               
               <!-- Name -->
          <p><label>Name</label>
          <?php if (isset($_GET['name'])) { ?>
               <input type="text" 
                      name="name"
                      value="<?php echo $_GET['name']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="name"><br></p>
          <?php }?>
          
          
          
          <!-- Username -->
          <p><label>Username</label>
          <?php if (isset($_GET['uname'])) { ?>
               <input type="text" 
                      name="uname"
                      value="<?php echo $_GET['uname']; ?>"><br>
          <?php }else{ ?>
               <input type="text"
                      name="uname"><br></p>
                          <?php }?>
               
               
          
               <!-- Password & Retype Password -->
               <p><label>Password</label>
                   <input type="password"
                          name="password"><br></p>
               
               <p><label>Retype Password</label>
                   <input type="password"
                          name="re_password"><br></p>
               
               
               
               <!-- Gender -->
               <p><label>Gender: </label>
                    <input type="radio" name="gender" value="Male">Male
                    <input type="radio" name="gender" value="Female">Female
                </p>
                
                
                
                <!-- Contact -->
                <p><label>Contact: </label>
                    <input type="text" name="contact">
                </p>
                
                
                
                <!-- Email -->
                <p><label>Email: </label>
                    <input type="email" name="email">
                </p>
                    
                </select>
                <br><br>
                           
                
                    
                    
                    

                    
     	<button type="submit">Sign Up</button>
          <a href="login.php" class="ca">Already have an account?</a>
     </form>
</body>
</html>