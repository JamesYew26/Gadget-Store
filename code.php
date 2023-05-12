<?php 
session_start();
$connection = mysqli_connect('localhost', 'username', 'password', 'gadgetstore');
if(isset($_POST['update_btn']))
{
    $products_id = $_POST['id'];
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $rrp = $_POST['rrp'];
    $quantity = $_POST['quantity'];
    $img = $_POST['img'];
    $date_added = $_POST['date_added'];
    
    $update_query = "UPDATE products SET name='$name',desc='$desc',price='$price' ,rrp='$rrp' ,quantity='$quantity',img='$img', date_added=$date_added WHERE id='$products_id'"; 
    $update_query_run = mysqli_query($connection,$update_query);
    
    if($update_query_run)
    {
        $_SESSION['status'] ="Data updated successfully";
        header('location: products_list.php');
    }
    else
    {
        $_SESSION['status'] ="Not updated successfully";
        header('location: products_list.php');
    }
}    
if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];
    $delete_query = "DELETE FROM products WHERE id='$id'";
    $delete_query_run = mysqli_query($connection,$delete_query);
    
    if($delete_query_run)
    {
        $_SESSION['status'] ="Data deketed successfully";
        header('location: products_list.php');
    }  
    else
    {
        $_SESSION['status'] ="Data not deleted successfully";
        header('location: products_list.php');
    }
}

if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];
    $delete_query = "DELETE FROM Credential WHERE id='$id'";
    $delete_query_run = mysqli_query($connection,$delete_query);
    
    if($delete_query_run)
    {
        $_SESSION['status'] ="Data deketed successfully";
        header('location: admin.php');
    }  
    else
    {
        $_SESSION['status'] ="Data not deleted successfully";
        header('location: admin.php');
    }
}
?>
