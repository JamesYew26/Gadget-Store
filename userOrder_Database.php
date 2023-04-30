<?php
$sname= "localhost";
$unmae= "root";
$password = "";

$db_name = "shoppingcart";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}

$CreateDB = "CREATE DATABASE IF NOT EXISTS `shoppingcart` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
/*
 //Create userOrder Database
if ($conn->query($CreateDB) === TRUE) {
echo "Database created successfully <br>";}
else {
  echo "Error: " . $conn->error . "<br>";
}
 */

$createTables= "CREATE TABLE IF NOT EXISTS `userOrder` (
        `userID` int(11) NOT NULL ,
	`productID` int(11) NOT NULL,
	`name` varchar(200) NOT NULL,
	`desc` text NOT NULL,
	`price` decimal(7,2) NOT NULL,
	`rrp` decimal(7,2) NOT NULL DEFAULT '0.00',
	`quantity` int(11) NOT NULL,
	`img` text NOT NULL,
	`date_ordered` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8";
    


    
   /* $ok = mysqli_query($conn,$createTables);
    if(!$ok){
        echo "Table Error "."---> ".$conn->error."<br>";
    }
    else{
        echo "Table Success";
    }

*/