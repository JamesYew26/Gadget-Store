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
    header('location: index.php?page=cart');
    exit;
}

// Remove product from cart, check for the URL param "remove", this is the product id, make sure it's a number and check if it's in the cart
if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {
    // Remove the product from the shopping cart
    unset($_SESSION['cart'][$_GET['remove']]);
} ?>



<?php
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

<?=template_header('Cart')?>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        
<div class="cart content-wrapper">
    
    
    <h1>Shopping Cart</h1>
      <div class="alert alert-warning alert-dismissible fade show">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Notice:</strong> Please check the Items and Quantity that you need to purchase before making the payment.
  </div>

    <form action="index.php?page=OrderConfirm" method="post">

        <table>
            <thead>
                <tr>
                    <td colspan="2">Product</td>
                    <td>Price Per Unit</td>
                    <td>Quantity</td>
                    <td>Action</td>
                    <td>Total</td>

                </tr>
            </thead>
            <tbody>
                <?php if (empty($products)): ?>
                <tr>
                    <td colspan="5" style="text-align:center;">You have no products added in your Shopping Cart</td>
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
                        <input style="border: none;" type="number" name="quantity-<?=$product['id']?>" value="<?=$products_in_cart[$product['id']]?>" min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required readonly>
                    </td>

                    <td  class="remove"><a href="index.php?page=cart&remove=<?=$product['id']?>" class="remove"color="red"><font color="FF7777">Remove</font></a></td>
                   
                <td class="price">&#82;&#77;<?=$product['price'] * $products_in_cart[$product['id']]?></td>
                </tr>

                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="subtotal">
            <span class="text">Total</span>
            <span class="price">&#82;&#77;<?=$subtotal?></span>
        </div>
        
 
         <br>
               <?php if (!empty($products)) { ?>
            <div class="buttons">
            <input type="submit" class="btn btn-primary" value="Make Payment" name="Submit">
            </div>
          <?php }?>
 </form>

</div>
        

<?=template_footer()?>