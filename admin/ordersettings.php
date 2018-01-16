<?php
 require_once("functions.php");
 	global $db; 
if(isset($_POST["submitsent"])){
	$id = $_POST["id"];
	$email = $_POST["email"];
	$sql = "update webshop.order set shipped = 'Ja' where order_id = '".$id."'";
		$result = mysqli_query($db, $sql);
	$to = $email;
$subject = "Patchy Order Verstuurd";
$message = "
<html>
<head>
<title>Uw order is verstuurd!</title>
</head>
<body>
<p>Beste meneer/mevrouw,</p>
<p>Uw order bij Patchy is net de deur uit gegaan.</p>
<p>U kunt er van uit gaan dat het pakket binnen 2 werkdagen geleverd zal worden.</p>
<p>Voor meer informatie kunt u terrecht bij uw gebruiker dashboard.</p>
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
	

		header('Location: ' . $_SERVER['HTTP_REFERER']);
			return  mysqli_insert_id($db);	
}
?>
