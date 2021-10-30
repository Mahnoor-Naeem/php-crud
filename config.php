<?php
$server_name = "localhost";
$user = "root";
$pass = "";
$db_name = "ecomerce";

$con = new mysqli($server_name, $user, $pass, $db_name);

if($con -> connect_error){
    die('Database cannot found '. $con -> connect_error);
}else{
    // echo 'Connected';
}

?>