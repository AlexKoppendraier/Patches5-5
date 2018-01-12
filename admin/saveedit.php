<?php 
require_once("functions.php"); 

if(isset($_SESSION['user_id'])) {  
checkAdmin($_SESSION['user_id']);
if(isset($_GET['action']) && $_GET['action'] == 'logout'){
	logout();

$id = $_GET["id"];
}?>