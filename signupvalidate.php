<?php
//$pass=rand(456789,987654);
//$password=base64_encode($pass);
require 'common/dbmanage.php';

if(isset($_POST['ucode'])){
	$fname=strtolower(trim(htmlentities($_POST['fname'])));$pass=trim(strtolower(htmlentities($_POST['pass'])));
	$surname=trim(strtolower(htmlentities($_POST['surname']))); $phone=trim($_POST['phone']);
	$email=strtolower(trim($_POST['mail']));$ucode=trim(strtoupper($_POST['ucode']));
	$password=base64_encode($pass);

		if(empty($fname)){echo'Fill the first name';}

		else if(empty($surname)){echo 'Fill in the Surname';}
		else if(empty($phone)){echo 'Fill in the phone numbe';}
		elseif(empty($email)){echo 'Fill in your Email address';}
		elseif(empty($ucode)){echo 'Enter User Code';}
		elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){echo 'Enter valid Email address';}
		else if(empty($pass)){echo 'Enter your user password';}
		else{
	$check=$PDO->query("SELECT * FROM users WHERE salescode='$ucode'");
	$total=count($check->fetchAll());
	if($total<1){$sql=$PDO->query("INSERT INTO users VALUES(NULL,'$fname','$surname','$phone','$email','$ucode','$password')");
					if($sql){echo 'success';}
		else {echo'<span style="color:red;"> Registration Failed. Unknown Error!';}
				}
	else{echo "User ".$ucode." or is  already registered!";}

	}
}
?>
