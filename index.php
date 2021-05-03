<?php
	
	include "inc/functions.php"; # database connection and functions page
	include "inc/common.php"; #include this file once in any page that requires UI
	
	#reset session to null
	file_put_contents("inc/session.dll",0);
	
	echo '
	<style>
		body{background:linear-gradient(to bottom,#8FBC8F,#66CDAA);font-family:cambria;}
		.main{width:450px;height:250px;background:linear-gradient(to bottom,#87CEEB,#ADD8E6,#87CEEB);margin:0 auto;margin-top:15%;border-radius:5px;
		box-shadow:0px 0px 1px 0px green}
		input[type=password]{width:100%;padding:7px;border:1px solid #B0C4DE;outline:none;color:#4682b4;background:#F0F8FF;font-weight:bold}
		input[type=text]{width:100%;padding:6px;border:1px solid #B0C4DE;outline:none;color:#4682b4;background:#F0F8FF;font-weight:bold;font-family:cambria}
		input:focus{outline:1px solid #4682b4;}
		.progr{font-weight:bold;color:blue; margin-right:30px;}
	</style>
	<p style="text-align:center;position:fixed;color:#191970;right:20;left:20;bottom:20px">Copyright &copy; Mabsoft</p>
	<div class="main">
		<div style="padding:10px;color:#191970">
			<h3>Account Login</h3><br>
			<form method="post" id="lfom" onsubmit="login(event)">
			<table cellpadding="10" style="width:100%;color:#2f4f4f;font-family:cambria">
			<tr><td><h4>Username</h4> </td><td><input type="text" name="name" id="user" autofocus required></td></tr>
			<tr><td><h4>Password</h4> </td><td><input type="password" name="passw" required></td></tr>
			<tr><td colspan="2" style="text-align:right"><span class="progr"></span><button class="btn">Signin</button></td></tr>
			</table></form>
		</div>
	</div>
	<script>
		
		function login(e){
			e.preventDefault();
			var data=$("#lfom").serialize();
			$.ajax({
				method:"post",url:"controller.php",data:data,
				beforeSend:function(){
					$(".progr").html("Processing..."); $(".wrap").fadeIn(); 
				},
				complete:function(){
					$(".progr").html(""); $(".wrap").fadeOut(); 
				}
			}).fail(function(xhr, status, error){
				showerror("Error while processing your request: "+error);
			}).done(function(res){
				_("lfom").reset();
				if(res.trim()=="success"){
					window.location.replace("main.php"); 
				}
				else{
					showerror(res.trim());  _("user").focus();
				}
			});
		}
	</script>';
	
?>