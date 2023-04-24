<?php
$id=$_REQUEST['id'];
$query = "DELETE FROM Credential WHERE id=$id"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
?>  