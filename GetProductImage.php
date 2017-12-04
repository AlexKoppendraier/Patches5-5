<?php
$servername = "localhost";
$username = "root";
$password = "";
$mysql_name = 'webshop';

$Product_id = $_GET['Product_id'];

// creërt de connectie
$conn = new mysqli($servername, $username, $password, $mysql_name);

// Checkt connectie
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT image FROM product WHERE Product_id = $Product_id LIMIT 1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$conn->close();

header("Content-type: image/png");
echo $row['image'];
?>