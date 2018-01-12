<?php
 require_once("functions.php");
 	global $db; 
$sql = "INSERT INTO product (Product_id) VALUES (NULL);";

if (mysqli_query($db, $sql)) {
} else {
    echo "Error updating record: " . mysqli_error($db);
}

	$id =  mysqli_insert_id($db);
		header("Location:productedit.php?id=".$id);
