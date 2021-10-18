<?php
global $PDO;
$PDO= new PDO("sqlite:common/tsrbk","","");
$PDO->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);

if(isset($_POST['ucode'])){
	$fname=strtolower(trim(htmlentities($_POST['fname'])));$sname=trim(strtolower(htmlentities($_POST['sname'])));
	$surname=trim(strtolower(htmlentities($_POST['surname']))); $phone=trim($_POST['phone']);
	$email=strtolower(trim($_POST['mail']));$fcode=trim(strtoupper($_POST['sacode']));
$err=""; echo $err;
	if(empty($fname)){
		$err="Fill the first name";
	}
	if(empty($surname)){
		$err='Fill in the Surname';
	}
	if(empty($phone)){
		$err= 'Fill in the phone number!';

	}
	if(empty($email)){
		$err= 'Fill in your Email address';
	}
	if(empty($fcode)){
	$err= 'Enter the User code';
	}
	if(filter_var($email,FILTER_VALIDATE_EMAIL)){
		$err=' Enter valid Email address ';
	}
}
?>