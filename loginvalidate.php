<?php
global $PDO;
$PDO= new PDO('mysql:dbname=pos;host=localhost;port=3306;charset=utf8','root','');
$PDO->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
if (isset($_POST['user'])){
  $user=trim(strtoupper($_POST['user']));
  $password=trim(base64_encode($_POST['pass']));

  $check=$PDO->query("SELECT * FROM users WHERE salescode='$user' AND password='$password'");
  if($check){
    if(count($check->fetchAll())===1){
      session_start();
      $_SESSION['currentUser']=$user;

      echo 'found';
    }
    else{
      echo 'not found';
    }
  }
  else{
    echo 'You are not registered user! Kindly register <a href="signup.php">here</a>';
  }

}


?>
