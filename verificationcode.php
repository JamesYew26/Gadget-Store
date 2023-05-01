
<?php include "connect_db.php";
include "functions.php"
?>

<html>
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

	</style>
    <title>Verification Code</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>

<body>
     <!--HEADER-->
<?=template_header('Home')?>

<center>
    <div class="form">
                <form action="reset_pass.php" method="POST" autocomplete="off">
                    <h2 class="text-center"></h2>

                    <?php
                    if (isset($_SESSION['info'])) {
                        ?>
                        <div class="success" style="padding: 0.4rem 0.4rem">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if (count((is_countable($error)?$error:[]))>0);  {
                        ?>
                        <div class="error">
                            <?php
                            foreach ((array)$error as $showerror) {
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
            
                    <div class="mb-3 mt-5">
                        <input type="number" name="otp" placeholder="Enter code" required>
                    </div>
                    <div class="mb-3 mt-5">
                    <button type="submit" class="btn btn-primary" name="check-reset-otp" value="Submit">Submit</button>
                    </div>
                </form>
    </div>
</center>


<?=template_footer()?>
</body>

</html>