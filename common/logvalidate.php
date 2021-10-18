<?php
session_start();
if(isset($_POST['sub'])){
$user=trim(strtolower($_POST['user']));
$pass=trim($_POST['pass']);
if($user=='isaiahmorara@gmail.com' && $pass='morara'){
	//$_SESSION['user']=$user;
	header('location:fs/signup.php');
}
else{
	echo 'wrong credentials!';
}
}
?>