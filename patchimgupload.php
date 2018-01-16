<?php
 require_once("functions.php");
 	global $db; 
if(isset($_POST["submit"])){
    $check = getimagesize($_FILES["image"]["tmp_name"]);
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));

	$sql = "INSERT INTO product (Product_id, image) values ('' ,'$imgContent')";
	$result = mysqli_query($db, $sql);

		header("Location:patchupload.php");
			return  mysqli_insert_id($db);	
}

if(isset($_POST["submitpart2"])){
	$name = $_POST["product_name"];
	$materiaal = $_POST["materiaal"];
	$formaat = $_POST["breedte"]."x".$_POST["hoogte"];
	$dikte = $_POST["dikte"];
	
	$sql = "SELECT * FROM product ORDER BY Product_id DESC LIMIT 1";
	$result = mysqli_query($db, $sql);
    while($row = mysqli_fetch_assoc($result)) {
	$pid = $row["Product_id"];
	}
	$sql1= "UPDATE product set product_name = '".$name."', materiaal = '".$materiaal."', formaat = '".$formaat."', dikte = '".$dikte."', Custom = '1' WHERE Product_id='".$pid."'";
	$result1 = mysqli_query($db, $sql1);
	}
	
	$sql = "SELECT email from user where user_id = '".$_SESSION['user_id']."'";
	while($row = mysqli_fetch_assoc($result)) {
	$email = $row["email"];
	}

$to = $email;
$subject = "Patchy Eigen Patch order verstuurd";
$message = "
<html>
<head>
<title>Uw order is binnen!</title>
</head>
<body>
<p>Beste meneer/mevrouw,</p>
<p>Uw order voor een eigen patch is binnen!</p>
<p>U kunt er van uit gaan dat u binnen 2 werkdagen een reactie krijgt met de prijs en verwachtte wachttijd.</p>
<p>Veel plezier!</p>
<p>Patchy</p>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <patchwebmaster@gmail.com>' . "\r\n";

mail($to,$subject,$message,$headers);
	

header("Location:orderbinnen.php");
			return  mysqli_insert_id($db);	
	
?>
