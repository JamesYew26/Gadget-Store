<?php include "connect_db.php";
include "functions.php";
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
        .success {
			background: #98FB98;
			color: #32CD32;
			padding: 10px;
			width: 95%;
			border-radius: 5px;
			margin: 20px auto;
		}
        .error {
			background: #F2DEDE;
			color: #A94442;
			padding: 10px;
			width: 95%;
			border-radius: 5px;
			margin: 20px auto;
		}
    </style>
    <title>Verification Code</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>

<body>

    <center>
        <form action="verificationcodecheck.php" method="post">

            <h2>Enter OTP Code</h2>
            <!--Error message part-->
            <?php if (isset($_GET['error'])) { ?>
                <p class="error">
                    <?php echo $_GET['error']; ?>
                </p>
            <?php } ?>


            <!--Enter OTP Code DIV-->
            <div class="mb-3 mt-5">
                <input type="password" name="key" placeholder="Enter code" required>
            </div>

            <div class="mb-3 mt-5">
			<button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </center>


    <?= template_footer() ?>
</body>

</html>