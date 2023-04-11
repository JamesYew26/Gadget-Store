<?php

$servername= "localhost";
$username= "username";
$password = "password";
$db_name = "GadgetStore";


// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
  die("FAIL: " . $conn->connect_error);
}
echo "SUCCCCCCCC CONEXION<br>";


//Create Database
$CreateDB = "CREATE DATABASE IF NOT EXISTS `GadgetStore` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
if ($conn->query($CreateDB) === TRUE) {
echo "Database created successfully <br>";}
else {
  echo "Error: " . $conn->error . "<br>";
}


//Create Table
$Table = "SELECT * FROM Credential";
$CheckTable = mysqli_query($conn,$Table);
if(!$CheckTable){
    $CreateTable = "CREATE TABLE Credential
        (id int(11) NOT NULL AUTO_INCREMENT,
        username varchar(255) NOT NULL,
        password varchar(255)NOT NULL,
        name varchar(255),
        email varchar(255),
        PRIMARY KEY (id)) 
        ENGINE=InnoDB DEFAULT CHARSET=latin1";
    $ok = mysqli_query($conn,$CreateTable);
    if(!$ok){
        echo "Table Error "."---> ".$conn->error."<br>";
    }
    else{
        echo "Table Success";
    }
}

else{
    echo "Table Exists";
}
?>
