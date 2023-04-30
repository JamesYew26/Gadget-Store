<?php 
$servername= "localhost";
$username= "username";
$password = "password";
$db_name = "GadgetStore";

$conn = mysqli_connect($servername, $username, $password, $db_name);


<?=template_header('Order')?>
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
        <?php
     
$query = $mysqli->query('SELECT *  FROM `userorder` WHERE `userID`=1');


/*foreach ($sql as $user)
{
    echo $user['userID'].' - '.$user['productID'].' - '.$user['name'].' - '.$user['img'].' - '.$user['quantity'].' - '.$user['rrp'].' - '.$user['price'].' - '.$user['date_ordered'].'<br>';

} */ 
?>

<table border ="1" cellspacing="0" cellpadding="10">
    <thead>
            <tr>
                <th>Customer ID</th>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Product Image</th>
                <th>Quantity </th>
                <th>Per Unit Price</th>
                <th>Price</th>
                <th>Date Ordered</th>
            </tr>
          </thead>   
          
           </tbody> 
              <tr>
	 <?php foreach ($query as $data){ ?>
                          <td><?php $data['userID']?></td>
                          <td><?php $data['productID']?></td>
                          <td><?php $data['name']?></td>
                          <td><?php $data['img']?></td>
                          <td><?php $data['quantity']?></td>
                          <td><?php $data['rrp']?></td>
                          <td><?php $data['price']?></td>
                          <td><?php $data['date_ordered']?></td>
             </tr>

  	     <?php } ?>    
          </tbody>       
</table>
               
          <br><button  type="button" class="btn btn-primary" onclick="window.print()" > <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
              <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
              <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
              </svg>
              <i class="bi bi-printer-fill">Print Order</i></button>

</center>
</body>
</html>
