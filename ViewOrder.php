<?php 
$sname= "localhost";
$unmae= "root";
$password = "";

$db_name = "shoppingcart";

$conn = new mysqli($sname, $unmae, $password, $db_name);

$sql ="SELECT userID , productID, name,img, quantity, rrp, price, date_ordered   FROM `userorder` WHERE `userID`=1"; 
$result = $conn->query($sql);
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
          <link rel="stylesheet" href="style.css">
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <title>User Order</title>
    </head>
    <body>
    <center>
        <br><br>
        <h2>Customer Ordered</h2>
 <br><br>
 <div class="container" style="text-align: center">
<table class="table table-hover">
            <tr class="table-primary">
                <th>Customer ID</th>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Product Image</th>
                <th>Quantity </th>
                <th>Per Unit Price</th>
                <th>Price</th>
                <th>Date Ordered</th>
            </tr>

  <?php
if ($result -> num_rows>0){
while ($row = $result->fetch_assoc()){
    echo "<tr><td>".$row["userID"]."</td><td>".$row["productID"]."</td><td>".$row["name"]."</td><td><img idth='50' height='50' src='imgs/".$row["img"]."'></td><td>".$row["quantity"]."</td><td>".$row["rrp"]."</td><td>".$row["price"]."</td><td>".$row["date_ordered"]."</td></tr>";
}
      echo "</table>";
  }
  else {
      echo "No Place any order yet.";
  }
      $conn->close();        
   ?>
                 
</table>
 </div>  
          <br><button  type="button" class="btn btn-primary" onclick="window.print()" > <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
              <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
              <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
              </svg>
              <i class="bi bi-printer-fill">Print Receipt</i></button>

</center>
</body>
</html>