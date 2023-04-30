<?php
// If the user clicked the add to cart button on the product page we can check for the form data
if (isset($_POST['product_id'], $_POST['quantity']) && is_numeric($_POST['product_id']) && is_numeric($_POST['quantity'])) {
    // Set the post variables so we easily identify them, also make sure they are integer
    $product_id = (int)$_POST['product_id'];
    $quantity = (int)$_POST['quantity'];
    // Prepare the SQL statement, we basically are checking if the product exists in our databaser
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
    $stmt->execute([$_POST['product_id']]);
    // Fetch the product from the database and return the result as an Array
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if the product exists (array is not empty)
    if ($product && $quantity > 0) {
        // Product exists in database, now we can create/update the session variable for the cart
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            if (array_key_exists($product_id, $_SESSION['cart'])) {
                // Product exists in cart so just update the quanity
                $_SESSION['cart'][$product_id] += $quantity;
            } else {
                // Product is not in cart so add it
                $_SESSION['cart'][$product_id] = $quantity;
            }
        } else {
            // There are no products in cart, this will add the first product to cart
            $_SESSION['cart'] = array($product_id => $quantity);
        }
    }
    // Prevent form resubmission...
    header('location: index.php?page=Order');
    exit;
}





// Send the user to the place order page if they click the Place Order button, also the cart should not be empty
if (isset($_POST['placeorder']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    header('Location: index.php?page=index.php');
    exit;
}

// Check the session variable for products in cart
$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$products = array();
$subtotal = 0.00;
// If there are products in cart
if ($products_in_cart) {
    // There are products in the cart so we need to select those products from the database
    // Products in cart array to question mark string array, we need the SQL statement to include IN (?,?,?,...etc)
    $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id IN (' . $array_to_question_marks . ')');
    // We only need the array keys, not the values, the keys are the id's of the products
    $stmt->execute(array_keys($products_in_cart));
    // Fetch the products from the database and return the result as an Array
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Calculate the subtotal
    foreach ($products as $product) {
        $subtotal += (float)$product['price'] * (int)$products_in_cart[$product['id']];
    }
}



?>

<html>
    <head>
        <meta charset="UTF-8">
        <style>

        </style>
        <title>Order Confirmation</title>
        <link rel="stylesheet" href="style.css">
        
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    </head>
    <body>
<main>

<div class="cart content-wrapper">
    <h1>User's Order Confirmation</h1>
    <form action="index.php?page=cart" method="post">
        <table>
            <thead>
                <tr> 
                    <td colspan="2">Product</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Total</td>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($products)): ?>
                <tr>
                    <td colspan="5" style="text-align:center;">You haven't place any order yet</td>
                  
                </tr>
                <?php else: ?>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td class="img">
                        <a href="index.php?page=product&id=<?=$product['id']?>">
                            <img src="imgs/<?=$product['img']?>" width="50" height="50" alt="<?=$product['name']?>">
                        </a>
                    </td>
                    <td>
                        <a href="index.php?page=product&id=<?=$product['id']?>"><?=$product['name']?></a>
                        <br>

                    </td>
                    <td class="price">&#82;&#77;<?=$product['price']?></td>
                    
                    
                    <td class="quantity">
                        <a><?=$products_in_cart[$product['id']]?> </a>
                    </td>
                    
                    <td class="price">&#82;&#77;<?= $total=$product['price'] * $products_in_cart[$product['id']]?></td>
                </tr>
                
                <?php 
                
                
                date_default_timezone_set("Asia/Kuala_Lumpur");
                include "userOrder_Database.php";
                $productID = (int)$product['id'];
                $productName = $product['name'];
                
                $Totalprice= $total=$product['price'] * $products_in_cart[$product['id']] ;
                $ProductPrice= $product['price'];      
                $quantity = (int)$products_in_cart[$product['id']];
                $imgs= $product['img'];
                $date_ordered = date('Y-m-d  H:i:sa');
                
                
                $InsertOrder ="INSERT INTO `userorder`(`userID`,`productID`,`name`,`desc`,`price`,`rrp`,`quantity`,`img`,`date_ordered`) 
                       VALUES ('1' ,'$productID' ,'$productName' ,' ' ,'$Totalprice' ,'$ProductPrice' ,'$quantity' ,'$imgs' ,'$date_ordered')";
                
                
               
      /*   if ($conn->query($InsertOrder) === TRUE) {
               echo "insert data created successfully <br>";}
            else {
               echo "Error: " . $conn->error . "<br>";
                 }       
       */        

                ?>
                
                <?php endforeach; ?>
                <?php endif; ?>

            </tbody>
        </table>
        <div class="subtotal">
            <span class="text">Total:</span>
            <span class="price">&#82;&#77; <i><?=$subtotal?></i></span>
        </div>
        
        
        
        
        
                   <?php
            
            if ($subtotal!=0 && $subtotal>0){ ?>
                  
       <div id="paypal-button-container"  action="index.php?page=placeorder" class="paypal-button-container"> </div>
            <?php }  ?>
        </div>

             <script src="https://www.paypal.com/sdk/js?client-id=AUmxKOm63zam86G8doC6ZZMGmsb2rPwgbrCICp2hyga_DxUxfNBbqoxqWVQr_5h5_xTg3VSxU3hU7aQe&currency=MYR&disable-funding=credit,card"></script>
              <script>
    paypal.Buttons({
        
    style: {
    layout:  'horizontal',
    shape:   'pill',
    label: 'pay',
    height:  40
  },

        //sets up the transaction when a payment buttonis clicked
          createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units:[{
                        amount:{
                            value:'<?= $subtotal ?>'//can aslo reference a variable or function
                        }
                }]
            });
          },
                 
           onCancel: function (data) {
           window.location.href = "PaymentCancel.php";
            },
            
    //Finalize the transaction after payer approval
    onApprove: function(data, actions) {
        // Finalize the transaction after payer approval
        return actions.order.capture().then(function(orderData) {

            window.location.href = "PaymentSuccessful.php";
            // Successful capture! For dev/demo purposes:')";
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            const transaction = orderData.purchase_units[0].payment.captures[0];
            alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
        });
    }
}).render('#paypal-button-container');
</script>
              
        <?php /*
         if (!empty($products)) {  ?>
          <br><button  type="button" class="btn btn-primary" onclick="window.print()" style="float: right;"> <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
              <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
              <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
              </svg>
              <i class="bi bi-printer-fill">Print Order</i></button>
        <?php } 

                 */ ?>
        
        
    </form>
        </main>
</body>
</html>