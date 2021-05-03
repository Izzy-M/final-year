<?php
	
	include "inc/functions.php";
	include "inc/common.php";
	
	if($sid){
		$sql=$PDO->query("SELECT *FROM `accounts` WHERE `id`='$sid'"); 
		$row=$sql->fetchAll()[0];
		$name=prepare(ucwords($row['name']));
		
		$PDO = null;
		
		echo "<link href='inc/jq-ui.css' rel='stylesheet'><script src='inc/jq.js'></script> <script src='inc/jqui.js'></script>
		<link rel='stylesheet' href='inc/font/css/font-awesome.css'>
		
		<style>
		input[type=password]{ padding:5px;width:200px;border:1px solid #ccc;color:#191970;outline:none;font-size:16px;box-shadow:inset 0px 0px 3px #dcdcdc; }
		input[type=search]{ font-family:'FontAwesome',cambria;padding:7px;width:200px;border:1px solid #ccc;color:#191970;outline:none;font-size:15px;box-shadow:inset 0px 0px 3px #dcdcdc; }
		.bts{padding:6px;border:0px;outline:none;color:#fff;background:linear-gradient(to top,green,#3CB371);border-radius:3px;cursor:pointer;}
		.mssg{padding:10px;width:100%;min-height:100px;font-family:helvetica;font-size:16px;color:#191970;resize:none;}
		.mssg:focus{outline:1px solid #008fff;}
		.btc{border:2px solid #3CB371;outline:none;color:#3CB371;font-weight:bold;cursor:pointer;background:transparent;padding:5px 10px;}
		.lnk:hover{color:blue;cursor:pointer;text-decoration:underline;}
		.btop{min-width:100px;padding:8px;border:1px solid #6495ed;outline:none;cursor:pointer;font-weight:bold;color:#4682b4;border-radius:3px;
		background:linear-gradient(to top,#F0F8FF,#fff); }
		input[type=date]{font-family:cambria;}
		.btop:hover{background:linear-gradient(to top,lightblue,#fff,#fff,#fff);}
		.btop img{height:17px;float:left;}
		.sidenav{height:100%;width:15%;color:#fff;float:left;background:#a6a6a6;}
		.section{height:100%;width:85%;background:#f0f0f0;float:right;}
		.items{height:200px;width:70%;background:#fff;overflow:auto;margin-left:1%}
		.tbtns{height:40px;width:70%;background:#fff;;margin-left:1%;text-align:right;}
		.tbtn1{min-width:100px;padding:8px;border:1px solid #6495ed;outline:none;cursor:pointer;font-weight:bold;color:#4682b4;
			border-radius:3px;background:green;color:black;cursor:pointer;margin-right:10px;}
		.tbtn2{min-width:100px;padding:8px;border:1px solid #6495ed;outline:none;cursor:pointer;font-weight:bold;color:#4682b4;
			border-radius:3px;background:red;color:black;cursor:pointer;}
			.tbtn2:hover{opacity:0.7;}
			.tbtn1:hover{opacity:0.7;}
		.menuholder{min-height:300px;width:95%;margin-left:1%;overflow:auto;margin-top:10px;}
		</style>
		
		<div style='margin:0 auto;height:100%;width:100%'> <input type='hidden' id='discount' value='0'> <input type='hidden' id='totals' value='0'>
			<div id='upper' style='height:100px;background:linear-gradient(to bottom,lightblue,#B0C4DE);color:#fff;text-shadow:0px 1px 1px #fff;padding:10px 20px'>
				<table style='width:100%;color:#191970' cellpadding='10'><tr valign='top'>
					<td style='width:100px'><img src='data:image/jpg;base64,$images[3]' height='90'></td>
					<td><h1>Application Name</h1><h3>Sub title Name</h3></td><td style='text-align:right'>
					<h4><i class='fa fa-power-off fa-2x' style='color:red;cursor:pointer;' onclick='logout();'></i></h4><br></td></tr></table>
			</div>
			<div style='min-height:400px;overflow:auto;' id='lower'>
			<div class='sidenav'></div>
			<div class='section'>
			<div class='items'>
			<table style='width:100%;pdding:2px;border-collapse:collapse;border:1px solid black;font-weight:bold;text-align:right;'>
			<tr><td>Entry</td><td>Id</td><td>Item</td><td>Quantity</td><td>Price</td><td>Amount</td></tr></table></div>
			<div class='tbtns'><hr><button class='tbtn1' style=>Cash Out</button>

			<button class='tbtn2'><i class='fa fa-times'></i>Clear All</botton></div>
			<div class='menuholder'>
				<button class='btop' onclick=\"popup('settings','WINES')\">Wines</button>
				<button class='btop' onclick=\"popup2('settings','CAKES')\">Cakes</button>
				<button class='btop' onclick=\"popup3('settings','DINNER MEALS')\">Dinner</button>
				<button class='btop' onclick=\"popup4('settings','VEGETABLES')\">Vegetables</button>
				<button class='btop' onclick=\"popup5('settings','BEVERAGES')\">Beverages</button>
				<button class='btop' onclick=\"popup6('settings','SNACKS')\">Snacks</button>
				<button class='btop' onclick=\"popup('settings','PIZZA')\">Pizza</button>
				<button class='btop' onclick=\"window.open('inc/phpliteadmin.php?')\">Open DB</button>
				
			</div>
		</div></div>
		</div>";
	?>
		
	<script>
		
		$( window ).resize(divide);
		
		(function(){
			var ha=$(window).height()-120; $("#lower").css("height",ha+"px");
		}
		
		function divide(){
			var ha=$(window).height()-120; $("#lower").css("height",ha+"px");
		}
		
		function logout(){
			if(confirm("Sure to Sign Out?")){
				window.location.replace("index.php");
			}
		}
		
		function loadpage(page){
			progress("s");  // Loader to show progress
			$("#lower").animate({ scrollTop:0 },300);  // scroll the current view page section to top
			$(".activity").load(page,function(){ progress(); });  // function to load requested page
		}
		
		$(".overlay").click(function() {
		  _("foreg").currentTime=0; $( ".popup" ).effect( "pulsate" ); _("foreg").play();
		});
		
		</script>
	<?php
		
	}
	else{
		echo "<script>window.location.replace('index.php'); </script>";
	}
?>