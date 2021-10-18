<?php
session_start();
if(isset($_SESSION['currentUser'])){
$user=$_SESSION['currentUser'];
require("common/dbmanage.php");
require("common/fpdf/fpdf.php");

class PDF extends FPDF{
function Header(){
    $this->Image('inc/img/logo.jpg',10,6,30);
    $this->SetFont('Arial','B',14);
    $this->Cell(200,5,'Record Sales ',0,0,'C');
    $this->Ln();
    $this->SetFont("Times",'',12);
    $this->Cell(200,10,'Production ',0,0,'C');
    $this->Ln(20);
}
  function Footer(){
    $this->SetY(-15);
    $this->SetFont('Arial','',8);
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
  }

function headerTable(){
  $this->SetFont('Times','B',10);
  $this->Cell(20,5,'Entry',1,0,'C');
  $this->Cell(50,5,"Code",1,0,'C');
  $this->Cell(50,5,'Month',1,0,'C');
  $this->Cell(50,5,'Year',1,0,'C');
  $this->Cell(50,5,'Weight(Kgs)',1,0,'C');
  $this->Ln();
  }
function getData($PDO,$user){
  $this->SetFont('Times','',12);
  $get=$PDO->query("SELECT * FROM period WHERE user='$user'");
  foreach($get->fetchAll() as $row){
    $this->Cell(20,5,$row['id'],1,0,'C');
    $this->Cell(50,5,$row['user'],1,0,'L');
    $this->Cell(50,5,$row['month'],1,0,'L');
    $this->Cell(50,5,$row['year'],1,0,'L');
    $this->Cell(50,5,$row['totalsale'],1,0,'L');
    $this->Ln();
  }

}
}
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->headerTable();
$pdf->getData($PDO,$user);
$pdf->Output();}
else{
  echo "You must be logged in";
}
?>
