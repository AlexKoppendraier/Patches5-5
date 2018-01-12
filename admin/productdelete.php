<?php 
require_once("functions.php"); 

if(isset($_SESSION['user_id'])) {  
checkAdmin($_SESSION['user_id']);
if(isset($_GET['action']) && $_GET['action'] == 'logout'){
	logout();
}
$product_id = $_GET['id'];
	$sql = "DELETE FROM product WHERE Product_id='".$product_id."'";	
	if (mysqli_query($db, $sql)) {
} else {
    echo "Error updating record: " . mysqli_error($db);
}
header("Location:products.php");
}

?>