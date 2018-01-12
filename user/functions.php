<?php 
require_once("../config.php"); 
require_once("class-phpass.php"); 
global $db;

$db = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
if(!$db){
	die( "Sorry! There seems to be a problem connecting to our database.");
}

function login($user, $pass){
	global $db; 
	$username = mysqli_real_escape_string($db, $user);
	$password = mysqli_real_escape_string($db, $pass);

	$sql = "SELECT user_id, wachtwoord, verificatie FROM user WHERE email='".$username."' LIMIT 1 ";		
	$result = mysqli_query($db, $sql);
	$id = mysqli_fetch_row($result);
	
	if($id){
		if($id[2] == '0'){
		return false;
		}
		$password_hashed = $id[1];
		$wp_hasher = new PasswordHash(16, true);
		if($wp_hasher->CheckPassword($password, $password_hashed)) {
			return $id[0];
		}
	} else {
		return false;
	}
}

function emailExist($user){
	global $db; 
	$username = mysqli_real_escape_string($db, $user);
	$sql = "SELECT user_id FROM user WHERE email='".$username."' LIMIT 1 ";		
	$result = mysqli_query($db, $sql);
	$id = mysqli_fetch_row($result);
	return ($id[0] > 0);
}
function register($voornaam, $tussenvoegsel, $achternaam, $adres, $huisnummer, $postcode, $geboortedatum, $telefoonnummer, $pass, $emailId){
	global $db; 
	$voornaam = mysqli_real_escape_string($db, $voornaam);
	$tussenvoegsel = mysqli_real_escape_string($db, $tussenvoegsel);
	$achternaam = mysqli_real_escape_string($db, $achternaam);	
	$adres = mysqli_real_escape_string($db, $adres);
	$huisnummer = mysqli_real_escape_string($db, $huisnummer);	
	$postcode = mysqli_real_escape_string($db, $postcode);
	$geboortedatum = mysqli_real_escape_string($db, $geboortedatum);
	$telefoonnummer = mysqli_real_escape_string($db, $telefoonnummer);		
	$password = mysqli_real_escape_string($db, $pass);
	$email = mysqli_real_escape_string($db, $emailId);

	$wp_hasher = new PasswordHash(16, true);
			$pass = $wp_hasher->HashPassword( trim( $password ) );
			
	$sql = "INSERT INTO user (voornaam, tussenvoegsel, achternaam, adres, huisnummer, postcode, geboortedatum, telefoonnummer, email,wachtwoord) VALUES ('".$voornaam."', '".$tussenvoegsel."', '".$achternaam."', '".$adres."', '".$huisnummer."', '".$postcode."', '".$geboortedatum."', '".$telefoonnummer."','".$email."', '".$pass."') ";		
	$result = mysqli_query($db, $sql);
	
	
	$to = $email;
$subject = "Patchy Verificatie Email";
$url = "http://localhost/user/verify.php?user=$email";
$message = "
<html>
<head>
<title>Patchy Verificatie Email</title>
</head>
<body>
<p>Beste meneer/mevrouw,</p>
<p>Super leuk dat je klant bij ons wilt worden, Maar voordat het eenmaal zover is moet er nog een ding gedaan worden. Om te testen of je email wel geldig is zouden we graag willen dat je op de volgende link klikt voor het activeren van je account:</p>
<p> <a href=".$url.">Klik hier om de registratie te voltooien.</a></p>
<p>Zodra dit gedaan is zal je een volledig klant zijn en kan je dus ook bestellingen plaatsen. Als je problemen ondervindt met deze link of je hebt verdere vragen kan je ons bereiken via een aantal hieronder vermelde manieren:</p> <p>Patchywebmaster@gmail.com</p>
<p>0624206969</p>
<p>Alvast dank!</p>
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
	
	header("Location:login.php?action=registered");
	return  mysqli_insert_id($db);
}

function logout(){
	unset($_SESSION['user_id']);
	session_destroy();	
	header('Location: index.php');
	exit();
}

//mysqli_close($db);