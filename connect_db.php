<?php

$servername= "localhost";
$username= "username";
$password = "password";
$db_name = "GadgetStore";
$error = "";


// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
  die("FAIL: " . $conn->connect_error);
}



/*
//Create Database
$CreateDB = "CREATE DATABASE IF NOT EXISTS `GadgetStore` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
if ($conn->query($CreateDB) === TRUE) {
echo "Database created successfully <br>";}
else {
  echo "Error: " . $conn->error . "<br>";
}

//Create table products
  CREATE TABLE `Products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `desc` text NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `rrp` decimal(7,2) NOT NULL DEFAULT 0.00,
  `quantity` int(11) NOT NULL,
  `img` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `Products` (`id`, `name`, `desc`, `price`, `rrp`, `quantity`, `img`, `date_added`) VALUES
(1, 'iPhone 12 Pro Max', '<p>iPhone 12 Pro Max</p>\r\n<p>128 GB Storage</p>\r\n<p>6 GB RAM</p>\r\n<p>6.7\" Display</p>\r\n<p>Pacific Blue Colour</p>\r\n\r\nThe Apple iPhone 12 Pro Max features a 6.7\" display, 12 + 12 + 12MP back camera, 12MP front camera, and a 4100mAh battery capacity. It is powered by the Octa-Core CPU with 128GB 6 GB, and runs on iOS.', '2689.00', '0.00', 10, 'iphone12PM.jpg', '2019-03-13 17:55:22'),
(2, 'iPhone 13 Pro Max Set', '<p>iPhone 13 Pro Max</p>\r\n<p>128 GB Storage</p>\r\n<p>6 GB RAM</p>\r\n<p>6.7\" Display</p>\r\n<p>Graphite Colour</p>\r\n\r\nThe Apple iPhone 13 Pro Max features a 6.7\" display, 12 + 12 + 12MP back camera, 12MP front camera, and a 4352mAh battery capacity. It is powered by the Hexa Core CPU and runs on iOS.', '3449.00', '0.00', 34, 'iphone13PMset.jpg', '2019-03-13 18:52:49'),
(3, 'iPhone 14 Pro Max', '<p>iPhone 14 Pro Max</p>\r\n<p>128 GB Storage</p>\r\n<p>6 GB RAM</p>\r\n<p>6.7\" Display</p>\r\n<p>Graphite Colour</p>\r\n\r\nThe Apple iPhone 14 Pro Max features a 6.7\" display, 48 + 12 + 12 + 12MP back camera, 12MP front camera, and a 4323mAh battery capacity. It is powered by the Hexa Core CPU with 128GB 6GB, and runs on iOS.', '4649.00', '0.00', 23, 'iphone14PM.jpeg', '2019-03-13 18:47:56'),
(4, 'Phantom 4 Pro+ V2.0\r\n', '<p>DJI Phantom 4 Pro v2</p>\r\n<p>- 1 Aircraft</p>\r\n<p>- 1 Screened Remote Control</p>\r\n<p>- 1 Intelligent Flight Battery</p>\r\n<p>- 1 Charger </p>\r\n<p>- 1 Power cable </p>\r\n<p>- 4 Propellers </p>\r\n<p>- 1 Gimbal Clamp </p>\r\n<p>- 1 Micro SD Card 32GB </p>\r\n<p>- 1 Micro USB Cable </p>\r\n<p>- 1 Carrying Case </p>\r\n\r\n', '7599.00', '0.00', 7, 'drone.jpeg', '2019-03-13 17:42:04');

Indexes for dumped tables
 
Indexes for table `Products`
 
ALTER TABLE `Products`
  ADD PRIMARY KEY (`id`);

AUTO_INCREMENT for table `Products`

ALTER TABLE `Products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

//Create Table
$Table = "SELECT * FROM Credential";
$CheckTable = mysqli_query($conn,$Table);
if(!$CheckTable){
    $CreateTable = "CREATE TABLE `Credential` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;"

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
*/
