<?php
 require_once("functions.php");
 	global $db; 
	$id = $_POST["id"];
if(isset($_POST["submit"])){
    $check = getimagesize($_FILES["image"]["tmp_name"]);
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));

	$sql = "UPDATE product SET image='".$imgContent."' WHERE Product_id='".$id."'";		
	$result = mysqli_query($db, $sql);
header("Location:productedit.php?id=$id");
			return  mysqli_insert_id($db);	

			
}
?>
