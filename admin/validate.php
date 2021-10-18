	<?php
	global $PDO;
	$PDO= new PDO('mysql:dbname=pos;host=localhost;port=3306;charset=utf8','root','');
	$PDO->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
		if(isset($_POST['user'])){
			$user=trim(strtolower($_POST['user']));
			$pass=trim($_POST['pass']);

			 	if($user=="admin" && $pass=="454562"){
			 		echo 'OK';
			 	}
			 else{echo 'Wrong credentials details!';}

		}


	?>
