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

	$sql = "SELECT user_id, wachtwoord FROM user WHERE email='".$username."' LIMIT 1 ";		
	$result = mysqli_query($db, $sql);
	$id = mysqli_fetch_row($result);
	if($id){
		$password_hashed = $id[1];
		$wp_hasher = new PasswordHash(16, true);
		if($wp_hasher->CheckPassword($password, $password_hashed)) {
			return $id[0];
		}
	} else {
		return false;
	}
}

function checkAdmin($user){
	global $db;
	$userid = mysqli_real_escape_string($db, $user);
	$sql = "SELECT user_id, rol FROM user WHERE user_id='".$_SESSION['user_id']."' LIMIT 1 ";		
	$result = mysqli_query($db, $sql);
    $admin = mysqli_fetch_array($result);
    $_SESSION['rol'] = $admin['rol'];  
	if($_SESSION['rol'] == 1){
		header('Location: http://www.example.com/');
			unset($_SESSION['user_id']);
	unset($_SESSION['rol']);	
		exit;
	}
	else{
		return;
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
	header("Location:login.php?action=registered");
	return  mysqli_insert_id($db);
}

function logout(){
	unset($_SESSION['user_id']);
	unset($_SESSION['rol']);
	session_destroy();	
	header('Location: index.php');
	exit();
}

//mysqli_close($db);