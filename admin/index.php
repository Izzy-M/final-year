	<?php
	$table=date('M_Y');

global $PDO;
$PDO= new PDO('mysql:dbname=pos;host=localhost;port=3306;charset=utf8','root','');
$PDO->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);

	?>
	<script src="common/jq.js"></script>
	<script src="common/jqui.js"></script>
	<style>

		*{margin:0px;}
		::selection{background:transparent;}
		p,h2,td{cursor:default;}
		.main{margin:0 auto;border:1px solid grey;padding:10px;width:400px;min-height:200px;margin-top:10%;background:#fff;}
		body{background:#e6e6fa;font-family:cambria;}
		.lnk{color:blue;}
		.lnk:hover{text-decoration:underline;cursor:pointer;}
		input{ padding:8px;width:100%;font-size:16px;}
		input:focus{outline:1px solid #008fff;}
		.prog{width:100%;height:100%;position:fixed;background:transparent;cursor:progress;z-index:99;display:none;top:0;left:0;}
		button{padding:8px;border: 1px solid #6495ed;background:#4682b4;outline:none;color:#fff;min-width:80px;border-radius:5px;text-shadow;0px 1px 1px #000;}
	</style>

	<div class="prog"></div>

	<div class="main">
		<h2 style="text-align:center;color:#191970;"> Account Login</h2><br><br>
		<form method="post" id="lform" onsubmit="login(event)">
			<div style="margin:0 auto;width:300px">
				<p> Username<br>
				<input type="text" name="user" autofocus required></p><br>
				<p> Password:<br>
				<input type="password" name="pass" required></p><br>
			<p style="text-align:right;"> <span style="float:left;" onclick="register()" class="lnk"> Register</span>
				<button onclick="login(event)"> Login</button></p><br>
			</div><br>
		</form>

	</div>

	<script>
	function register(){
		location.replace("signup.php");
	}
	function login(e){
		e.preventDefault();
		var det=$('#lform').serialize();
		$.ajax({
			method:"post",url:"validate.php", data:det,
			beforeSend:function(){progress('show');},
			complete:function(){progress('hide');}
		}).fail(function(){
			alert("Failed: Unknown error!");
		}).done(function(res){
			if(res.trim()=="OK"){
				$(".main").fadeOut(); location.replace("home.php");
			}
			else{
				alert(res.trim());
			}
		});

	}
	function progress(type){
		if(type=='show'){
			$(".prog").fadeIn();
		}
		else{ $(".prog").fadeOut(); }
	}

	</script>
