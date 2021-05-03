<?php
	
	#put this require in all pages you create; It has all functions and connection to DB
	require "inc/functions.php";
	
	# send any request to this page to request something
	
	#example try to login into CU page online
	if(isset($_GET['fetchonline'])){
		$data=array("user"=>"allan","password"=>1234);
		$res=request("http://karucu.com/admin/loginvalidate.php",$data);
		
		echo (is_numeric($res)) ? "Failed: Poor internet connection":$res;
		#make ur pages not to return numeric values so that u dont confuse try and catch for network problems returned by CURL function
		#read more about PHP CURL, its most usefull to create APIs and transfering data between domains
	}
	
	#fetch a functionality
	if(isset($_GET['displaytime'])){
		echo "<h3>Try to highlight me</h3>
		<p>Also try o highlight me or press CTRL+A then copy</p><br>
		<p>This is time fetched online</p>
		".date("j, d-m-Y, h:i:s:u");
	}
	
	#login post
	if(isset($_POST['name'])){
		$name=clean(strtolower($_POST['name']));
		$pass=clean($_POST['passw']);
		
		$sql=$PDO->query("SELECT *FROM `accounts` WHERE `name`='$name' AND `password`='$pass'");
		$res=$sql->fetchAll();
		
		if(count($res)>0){
			$user_id=$res[0]['id'];
			file_put_contents("inc/session.dll",$user_id);
			echo "success";
		}
		else{
			echo "Failed: Incorrect Username or Password";
		}
	}
	
	$PDO = null;

?>