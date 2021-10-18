<?php
session_start();
require('common/dbmanage.php');
$tablename=date('M_Y');
$user=$_SESSION['currentUser'];
//echo "connected";
if(isset($_POST['weight'])){
	$sdate=trim($_POST['sdate']);
	$stime=trim($_POST['time']);
	$buyer=trim($_POST['buyer']);
	$trans=trim($_POST['trans']);
	$bag=trim($_POST['bags']);
	$weight=trim($_POST['weight']);
	$tablename= date('M_Y');
	$day=date("l");
	$rtime=date("H:i:s");
	$maxweight=12.5;
	$year=date('Y');

if(empty($sdate)){echo"Enter your sale date!";}
elseif(empty($stime)){echo"Enter tha sale time!";}
elseif(empty($buyer)){echo"Enter your product buyer!";}
else if(!is_string($buyer)||is_numeric($buyer)){echo "Wrong buyer name";}
else if(empty($trans)){echo"Enter the transport code";}
else if(!is_string($trans)||is_numeric($trans)){echo "Wrong transporter name";}
else if(empty($bag)){echo"Enter the number of bags sold";}
else if(empty($weight)){echo"Enter Total weight sold!";}

else if(!is_numeric($bag)){echo"Wrong bag(s) value input";}
else if(!is_numeric($weight)){echo"Check weight input value!";}
else if($weight<$bag*6){echo'The weight is invalid for the bags';}
else if($weight>$bag*$maxweight){echo'The weight is invalid for the bags';}
//else if($total_weight/$bags<10 || $weight/$bags>12){echo'Invalid number of bags';}
else if($bag>=$weight){echo "Invalid Weight";}
else{
$sql=$PDO->query("INSERT INTO $tablename VALUES(NULL,'$day','$user','$sdate','$stime','$rtime','$trans','$bag','$weight','$buyer','$year')");

	if($sql){
		$check=$PDO->query("SELECT * FROM period WHERE month='$tablename'");
		if($check->fetchAll()){
		foreach($check->fetchAll() as $me){
		$new=$me['totalsale']+$weight;
		$add=$PDO->query("UPDATE period SET totalsale='$new' WHERE month='$tablename'");
		echo 'success';
		}
		echo 'success';
		}
		else{
		$PDO->query("INSERT INTO period VALUES (NULL,'$tablename','$user','$weight','$year')");
		echo 'success';
		}
	}
	else{echo 'Unkown Error! Failed to add record!';}

		}
}
?>
