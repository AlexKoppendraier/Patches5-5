<?php
 require_once("functions.php");
 	global $db; 
//Make sure that our query string parameters exist.
if(isset($_GET['user'])){
    $userId = trim($_GET['user']);
    
	$sql = "SELECT user_id, email, verificatie FROM user WHERE email='".$userId."' LIMIT 1 ";		
	$result = mysqli_query($db, $sql);
	$id = mysqli_fetch_row($result);
	
		if($id){
		if($id[2] == '0'){
			$chara = $id[0];
			$sql2 = "UPDATE user SET verificatie='1' WHERE user_id='".$chara."' LIMIT 1";
			if ($db->query($sql2) === TRUE) {
			header("Location:login.php?action=verified");
			return  mysqli_insert_id($db);
} else {
    echo "Error updating record: " . $db->error;
}
		}else{
			return false;
			?>test<?php
		}
		}
}
?>
