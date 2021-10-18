<?php
if(isset($_GET['present'])){
  function getData(){
    require("common/dbmanage.php");
  session_start();
  $user=$_SESSION['currentUser'];
  $year=date('Y');
  $get=$PDO->query(sprintf("SELECT month,totalsale FROM `period` WHERE user='$user' AND year='$year'"));
  $data=array();
  foreach($get->fetchAll(PDO::FETCH_OBJ) as $row){
  array_push($data,$row);
  }
  return json_encode($data);
  }
  echo getData();
}

if(isset($_GET['getmonth'])){
  function getDat(){
    require("common/dbmanage.php");
  session_start();
  $user=$_SESSION['currentUser'];
  $current=date("M_Y");
  $year=date('Y');
  $get=$PDO->query(sprintf("SELECT date_bought,total_weight FROM $current WHERE salercode='$user'"));
  $data=array();
  foreach($get->fetchAll(PDO::FETCH_OBJ) as $row){
  array_push($data,$row);
  }
  return json_encode($data);
  }
  echo getDat();
}
?>
