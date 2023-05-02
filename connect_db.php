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
(1, 'iPhone 12 Pro Max', '<p>iPhone 12 Pro Max</p>\r\n<p>128 GB Storage</p>\r\n<p>6 GB RAM</p>\r\n<p>6.7 inches\" Display</p>\r\n<p>Pacific Blue Colour</p>\r\n\r\nThe Apple iPhone 12 Pro Max features a 6.7\" display, 12 + 12 + 12MP back camera, 12MP front camera, and a 4100mAh battery capacity. It is powered by the Octa-Core CPU with 128GB 6 GB, and runs on iOS.', '2689.00', '0.00', 10, 'iphone12PM.jpg', '2019-03-13 17:55:22'),
(2, 'iPhone 13 Pro Max Set', '<p>iPhone 13 Pro Max</p>\r\n<p>128 GB Storage</p>\r\n<p>6 GB RAM</p>\r\n<p>6.7 inches\" Display</p>\r\n<p>Graphite Colour</p>\r\n\r\nThe Apple iPhone 13 Pro Max features a 6.7\" display, 12 + 12 + 12MP back camera, 12MP front camera, and a 4352mAh battery capacity. It is powered by the Hexa Core CPU and runs on iOS.', '3449.00', '0.00', 34, 'iphone13PMset.jpg', '2019-03-13 18:52:49'),
(3, 'iPhone 14 Pro Max', '<p>iPhone 14 Pro Max</p>\r\n<p>128 GB Storage</p>\r\n<p>6 GB RAM</p>\r\n<p>6.7 inches\" Display</p>\r\n<p>Graphite Colour</p>\r\n\r\nThe Apple iPhone 14 Pro Max features a 6.7\" display, 48 + 12 + 12 + 12MP back camera, 12MP front camera, and a 4323mAh battery capacity. It is powered by the Hexa Core CPU with 128GB 6GB, and runs on iOS.', '4649.00', '0.00', 23, 'iphone14PM.jpeg', '2019-03-13 18:47:56'),

(4, 'Samsung S23 Ultra', '<p>Samsung S23 Ultra</p>\r\n<p>256 GB Storage</p>\r\n<p>8 GB RAM</p>\r\n<p>6.8 inches\" Display</p>\r\n<p>Phantom Black Colour</p>\r\n\r\nLatest Galaxy S23 Ultra phone, designed with the planet in mind, equipped with a built-in S Pen, Nightography camera, & powerful chip.', '5699.00', '0.00', 50, 'SamsungGalaxyS23Ultra.png', '2023-02-17 18:47:56'),
(5, 'Huawei Mate 50 Pro', '<p>Huawei Mate 50 Pro</p>\r\n<p>512 GB Storage</p>\r\n<p>8 GB RAM</p>\r\n<p>6.74 inches\" Display</p>\r\n<p>Orange Colour(Kunlun Glass)</p>\r\n\r\nUltra Aperture XMAGE Camera | Durable Kunlun Glass, Up to 6-Metre Water Resistance | HUAWEI SuperCharge, SuperHub, SuperStorage.', '5099.00', '0.00', 50, 'HuaweiMate50Pro.jpg', '2022-12-10 18:50:56'),
 
(6, 'Apple Watch Series 8(45MM)', '<p>Apple Watch Series 8</p>\r\n<p>45 MM</p>\r\n<p>1 GB RAM</p>\r\n<p>1.9 inches\" Display</p>\r\n<p>Graphite Colour</p>\r\n\r\nYour essential companion is even more powerful. Temperature sensing for deeper insights into women’s health.1 Crash Detection to get help in an emergency.2 Sleep stages to better understand your sleep. And improved ways to train using the enhanced Workout app. The future of health never looked so good.', '1999.00', '0.00', 50, 'AppleWatchSeries8.jpeg', '2022-09-12 18:50:56'),
(7, 'Samsung Galaxy Watch 5 Pro (44mm)', '<p>Samsung Galaxy Watch 5 Pro</p>\r\n<p>16 GB Storage</p>\r\n<p>44mm </p>\r\n<p>1.4 inches\" Display</p>\r\n<p>Black Titanium Colour</p>\r\n\r\nSamsung Watch5 Pro 45mm supports over 90 exercises. A man is mountain biking down a. Count steps, calories, and more. Your watch will detect physical activity', '1899.00', '0.00', 50, 'SamsungGalaxyWatch5Pro.jpg', '2022-08-12 18:50:56'),
(8, 'Huawei Watch Fit GT3', '<p>Huawei Watch Fit GT3</p>\r\n<p>32 MB Ram</p>\r\n<p>48mm </p>\r\n<p>1.43 inches\" Display</p>\r\n<p>Leather Colour</p>\r\n\r\nElegant design with versatile styles, accurates monitoring, professional workout modes and AI running coach.', '1099.00', '0.00', 50, 'HuaweiWatchFitGT3.jpg', '2021-11-11 18:50:56'),

(9, 'Air Pods 3rd Generation', '<p>Air Pods 3rd Generation</p>\r\n<p>Weight:42.19g</p>\r\n<p>up to 30 hours of listening time </p>\r\n<p>Bluetooh 5.0 wireless technology</p>\r\n<p>H1 Headphone Chip</p>\r\n\r\Custom high-exursion Apple driver. Custom high dynamic range amplifier. Personalised Spatial Audio with dynamic head tracking', '879.00', '0.00', 50, 'AirPods3rdGeneration.jpg', '2021-11-11 18:50:56'),
(10, 'Samsung Galaxy Buds 2 Pro', '<p>Samsung Galaxy Buds 2 Pro</p>\r\n<p>Weight:43.3g</p>\r\n<p>61 mAh battery </p>\r\n<p>Bluetooh 5.0 wireless technology</p>\r\n<p>Bora Purple colour</p>\r\n\r\ Galaxy Buds 2 Pro has the capability to distinguish between noise and human voices so when you speak, it temporarily switches to Ambient mode and reduces media volume, allowing you to have conversations without having to take out the earbuds', '499.00', '0.00', 50, 'SamsungGalaxyBuds2Pro.jpg', '2022-08-26 18:50:56'),
(11, 'Huawei FreeBuds Pro 2', '<p>Huawei FreeBuds Pro 2</p>\r\n<p>Pure Voice</p>\r\n<p>Dual-Speaker True sound </p>\r\n<p>Bluetooh 5.2 wireless technology</p>\r\n<p>Silver Blue colour</p>\r\n\r\Huawei FreeBuds Pro 2 suppoer LDAC high resolution codec, 4 and is certified both by HWA and Hi-Res Audio Wireless, supporting blazing-fast transmission', '899.00', '0.00', 50, 'HuaweiFreeBudsPro2.png', '2022-08-01 18:50:56'),
 
(12, 'Phantom 4 Pro+ V2.0\r\n', '<p>DJI Phantom 4 Pro v2</p>\r\n<p>- 1 Aircraft</p>\r\n<p>- 1 Screened Remote Control</p>\r\n<p>- 1 Intelligent Flight Battery</p>\r\n<p>- 1 Charger </p>\r\n<p>- 1 Power cable </p>\r\n<p>- 4 Propellers </p>\r\n<p>- 1 Gimbal Clamp </p>\r\n<p>- 1 Micro SD Card 32GB </p>\r\n<p>- 1 Micro USB Cable </p>\r\n<p>- 1 Carrying Case </p>\r\n\r\n', '7599.00', '0.00', 7, 'drone.jpeg', '2019-03-13 17:42:04');

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
