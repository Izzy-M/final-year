
<?php global $PDO;
$PDO= new PDO("sqlite:tsrbk","","");$PDO->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING); ?>
	<head><script></script><script></script><style>
	table,td{border:2px solid black;}
	.sale{height:400px;width:95%;margin:2px;padding:5px;position:fixed;z-index:9;display:block;background:#f0f0f0;
	}</style></head><body>
	
	<div class="sale" id="sale"><?php $date=date('M_Y'); include'dbmanage.php'; $sql=$PDO->query("SELECT * FROM $date")?>
		<div style="height:30px;width:100%;background:navyblue;font-family: rockwell;text-align:center;">
<h2>SALES OF THE MONTH <?php echo $date; ?></h2></div>
		<table><tr><td>entry</td><td>day</td><td>salecode</td><td>sell date</td><td>time bought</td><td>transporter</td><td>bags</td>
			<td>Total weight</td><td>Buyer</td><td>time recorded</td></tr>
			<?php foreach($sql->fetchall() as $row){
				$id=$row['id'];$day=$row['day'];$seller=$row['salercode'];$date=$row['date_bought'];$buy_time=$row['time_bought'];$time_recorded=$row['time_recorded'];$transporter=$row['transporter'];$bags=$row['no_of_bags'];$totalweight=$row['total_weight'];$buyer=$row['buyer'];
			
echo "<tr><td>".$id."</td><td>".$day."</td><td>".$seller."</td><td>".$date."</td><td>".$buy_time."</td><td>".$transporter."</td><td>".$bags."</td><td>".$totalweight."</td><td>".$buyer."</td><td>".$time_recorded."</td></tr>";
			}
				?>
		</table>
	</div>
	</bo