<?php
if (!function_exists('pdo_connect_mysql')) {
    function pdo_connect_mysql()
    {
        $DATABASE_HOST = 'localhost';
        $DATABASE_USER = 'username';
        $DATABASE_PASS = 'password';
        $DATABASE_NAME = 'GadgetStore';
        try {
            return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
        } catch (PDOException $exception) {
            // If there is an error with the connection, stop the script and display the error.
            exit('Failed to connect to database!');
        }

    }
}

// Template header, feel free to customize this
if (!function_exists('template_header')) {
    function template_header($title)
    {
        // Get the number of items in the shopping cart, which will be displayed in the header.
        $num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;

        echo <<<EOT
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>$title</title>
            <link href="style.css" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        </head>
        <body>
            <header>
                <div class="content-wrapper">
                <a href="index.php?page=itempage">
                <img src="imgs/Gadget.png" style="width:80px;height:80px;" href="itempage.php">
                </a>
    
                <a href="index.php?page=itempage">
                    <h1>Gadget Store</h1>
                

     
                    <div class="link-icons">
                        <a href="index.php?page=cart">
                            <i class="fas fa-shopping-cart"></i>
            <span>$num_items_in_cart</span>
                        </a>
                    </div>
                    <div class="loginbtn">
                    <a href = "index.php?page=login">
                    <button type="button" class="btn btn-secondary" href"index.php?page=login">Login</button>
                    </a>
                </div>
                </div>
            </header>
            <main>
    EOT;


    }
}

// Template footer
if (!function_exists('template_footer')) {
    function template_footer()
    {
        $year = date('Y');
        echo <<<EOT
            </main>
            <footer>
                <div class="content-wrapper">
                    <p>&copy;2023 Group 1 Gadget Store</p>
                </div>
            </footer>
        </body>
    </html>
    EOT;
    }
}


?>
