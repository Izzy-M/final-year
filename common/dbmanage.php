<?php
$table=date('M_Y');

global $PDO;
$PDO= new PDO('mysql:dbname=pos;host=localhost;port=3306;charset=utf8','root','');
$PDO->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);

$createusertable=$PDO->query("CREATE TABLE IF NOT EXISTS users(id INT PRIMARY KEY AUTO_INCREMENT,
  fname VARCHAR(50) ,
  surname VARCHAR(50) ,
  phone INTEGER ,
  email VARCHAR(50) ,
  salescode VARCHAR(50) ,
  password VARCHAR(50))");
$createrecord=$PDO->query("CREATE TABLE IF NOT EXISTS $table (id INT PRIMARY KEY AUTO_INCREMENT,
  day VARCHAR(50) ,
  salercode VARCHAR(50) ,
  date_bought VARCHAR(50) ,
  time_bought INTEGER ,
  time_recorded INTEGER ,
  transporter VARCHAR(50) ,
  no_of_bags INTEGER ,
  total_weight VARCHAR(50) ,
  buyer VARCHAR(50),
  year INTEGER)");
  $period= $PDO->query("CREATE TABLE IF NOT EXISTS period(id INT PRIMARY KEY AUTO_INCREMENT,
  Month VARCHAR(8) NOT NULL,
  totalsale INT NOT NULL ,
  year INTEGER)");
  ?>
