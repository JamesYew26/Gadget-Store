
<html>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
<?php
include 'functions.php';
include 'index.html';
$pdo = pdo_connect_mysql();
// Get the 12 most recently added products
$stmt = $pdo->prepare('SELECT * FROM products ORDER BY id ASC LIMIT 12');
$stmt->execute();
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?=template_header('Home')?>

<div class="featured-itempage">
    <h2>Welcome to Gadget Store</h2>
    <p>Cool gadgets that you won't want to miss</p>
</div>
<div class="productswesell content-wrapper">
    <h2>PRODUCTS WE SELL</h2>
    <div class="products">
        <?php foreach ($recently_added_products as $product): ?>
        <a href="index.php?page=product&id=<?=$product['id']?>" class="product">
            <img src="imgs\<?=$product['img']?>" width="200" height="200" alt="<?=$product['name']?>">
            <span class="name"><?=$product['name']?></span>
            <span class="price">
                &#82;&#77;<?=$product['price']?>
                <?php if ($product['rrp'] > 0): ?>
                <span class="rrp">&#82;&#77;<?=$product['rrp']?></span>
                <?php endif; ?>
            </span>
        </a>
        <?php endforeach; ?>
    </div>
</div>

<?=template_footer()?>
</html>


