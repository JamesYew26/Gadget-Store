<?php 
$servername= "localhost";
$username= "username";
$password = "password";
$db_name = "GadgetStore";

$conn = mysqli_connect($servername, $username, $password, $db_name);



if (!$conn) {
	echo "Connection failed!";
}

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>User Order</title>
    </head>
    <body>
        <?php
     
$query = "SELECT 'userID' , 'productID', 'name', 'img', 'quantity', 'rrp', 'price', 'date_ordered'   FROM `userorder` WHERE `userID`=1";
$result = mysqli_query($conn, $query);

/*foreach ($sql as $user)
{
    echo $user['userID'].' - '.$user['productID'].' - '.$user['name'].' - '.$user['img'].' - '.$user['quantity'].' - '.$user['rrp'].' - '.$user['price'].' - '.$user['date_ordered'].'<br>';

} */
?>

<table border ="1" cellspacing="0" cellpadding="10">
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
            
<?php
if ($result->num_rows > 0) {
  $sn=1;
  while($data = $result->fetch_assoc()) {
 ?>
            
                      <tr>
                          <td><?php $data ['userID']?></td>
                          <td><?php $data ['productID']?></td>
                          <td><?php $data ['name']?></td>
                          <td><?php $data ['img']?></td>
                          <td><?php $data ['quantity']?></td>
                          <td><?php $data ['rrp']?></td>
                          <td><?php $data ['price']?></td>
                          <td><?php $data ['date_ordered']?></td>
 </tr>
   <?php
      $sn++;}} else { ?>
        <tr>
          <td colspan="8">No data found</td>
        </tr>
    <?php } ?>
        
</table>
</body>
</html>
