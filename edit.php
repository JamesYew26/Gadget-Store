
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">

<h1>Edit Details</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$username = $_REQUEST['username'];
$password =$_REQUEST['password'];
$name =$_REQUEST['name'];
$email =$_REQUEST['email'];
$contact = $_REQUEST["contact"];
$update="update new_record set contact='".$contact."',
username='".$username."', password='".$password."',
name='".$name."'email='".$email."', where id='".$id."'";
mysqli_query($con, $update) or die(mysqli_error());
$status = "Record Updated Successfully. </br></br>
<a href='admin.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<p><input type="text" name="username" placeholder="Enter Username" 
required value="<?php echo $row['username'];?>" /></p>
<p><input type="text" name=password placeholder="Enter Password" 
required value="<?php echo $row['password'];?>" /></p>
<p><input type="text" name=name placeholder="Enter Name" 
required value="<?php echo $row['name'];?>" /></p>
<p><input type="text" name=email placeholder="Enter email" 
required value="<?php echo $row['email'];?>" /></p>
<p><input type="text" name=contact placeholder="Enter contact" 
required value="<?php echo $row['contact'];?>" /></p>



<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>