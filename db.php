<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 22-10-2017
 * Time: 19:41
 */

$mysql_host = 'localhost';
$mysql_user = '';
$mysql_password= '5454';
$mysql_name = 'webshop';

$conn_error = "connection failed";

$mysqli = new mysqli($mysql_host, $mysql_user, $mysql_name, $mysql_password);
if(mysqli-> $conn_err){
    die($conn_error." ". $mysqli->connect_error);

} else{
    echo "connection succes";

}
?>