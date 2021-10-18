<head>
	<link rel="stylesheet" href="/css/signup.css">
	<script src="inc/jq.js"></script>
	<script src="inc/jqui.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

	<style>
	*{margin:0px auto ;}
	h2{text-align:center;font-family:cambria;}
.process{height:100%;width:100%;background:transparent;top:0;left:0;position:fixed;display:none;cursor:progress;z-index:99;}
.body{width:30%;min-height:150px;background-color:#f0f0f0;border-top-right-radius: 20px!important;}
.nav{height:100px !important;width:fit-content !important;background:cadetblue !important;margin-bottom:4% !important;}
.formbody{
	width:100% !important;min-width:fit-content !important;
}
.headholder{
	width:100% !important;min-width:fit-content !important;
}
::selection{background:transparent;}
.imghldr{height:50px;width:60px;border-radius:50px;background-image:cover;padding:10px;border-radius:50px;}
input [type=text],[type=text],[type=text],[type=tel],[type=text],[type=text],[type=password],[type=password]{height:35px;width:95%;margin-bottom:20px;border:none;outline: none; border-bottom: 2px solid;background-color: white;padding:10px;}
button{ float:right;padding:8px;border: 1px solid #6495ed;background:#4682b4;outline:none;color:#fff;min-width:80px;border-radius:5px;text-shadow;0px 1px 1px #000;cursor:pointer}.alertdiv{height:auto;width:95%background:transparent;}.lnk{color:blue;}
.lnk:hover{text-decoration:underline;cursor:pointer;}
.wait{height:70px;width:70px;border:10px solid #f0f0f0;border-radius:50%;border-bottom:10px solid green;width:40px;height:40px; animation:spin 1.5s linear infinite;display: none;}@keyframes spin{0%{transform:rotate(0deg);}100%{transform:rotate(360deg);}}
.overlay{height:100%;width:100%;cursor:progress;top:0;left: 0;background:transparent;position: fixed;z-index: 9;display:none;}
</style>
</head>
<body style="background-color: #f0f0f0;">

	<div class="body">

				<div class=" card formholder" >
						<div class="card-header formbody nav"><h2>NEW USER SIGNUP</h2></div>
						<div class="card-body formbody">
							<form method="post" id="sform" onsubmit="signup(event)" >

						<label for="firstname">First Name: </label><br>
							<input type="text" placeholder="  First Name" name="fname" id="firstname" autocomplete="off" autofocus required><br>
						<label for="surname"> Surname: </label><br>
						<input type="text" placeholder="  Surname" name="surname" maxlength="20" id="surname" autocomplete="off" required><br>
						<label for="phone"> Phone Number: </label><br>
						<input type="tel" placeholder= "  Phone Number" name="phone"  id="phone" maxlength="11" autocomplete="off" required><br>
						<label for="mail"> Email: </label><br>
						<input type= "text"  placeholder="  User mail" name="mail" id="mail" maxlength="25" autocomplete="off" required><br>
						<label for="ucode"> Sales Code: </label><br>
						<input type="text" placeholder="  SA Code" maxlength="10" name="ucode" id="ucode" autocomplete="off" required>
						<label for="pass"> Password </label><br>
						<input type="password" placeholder="  Password" maxlength="12" name="pass" id="pass" autocomplete="off" required>
						<label for="pass2"> Password</label><br>
						<input type="password" placeholder="  confirm Password" maxlength="12" name="pass2" id="pass2" autocomplete="off" onkeyup="checkpass()"required>
						<div>
						<p style="text-align:right;"> <span style="float:left;" onclick="login()" class="lnk"> Login</span>
						<button id="btn1" onclick="signup(event)"> Sign Up </button></p>
						</div>
						</form>
						</div>

</div>
</div>

</body>

<script>
function checkpass(){
	if($('#pass').val()!=$('#pass2').val()){
	$('#btn1').hide();
	}
	else{
		$('#btn1').show();
	}
}
	function login(){location.replace("index.php");}
	 function signup(e){
		e.preventDefault();
		var fdata=$('#sform').serialize();
		$.ajax({
			method:'post',url:'signupvalidate.php',data:fdata,
			beforeSend:function(){$(".wait").fadeIn();},
			complete:function(){$(".wait").fadeOut();$("#sform").reset();}
		}).fail(function(){
			alert("Failed:Unknown error!");
		}).done(function(res){
			if(res.trim()=="success"){document.getElementById('sform').reset();
				//$(".main").fadeOut();
				 location.replace("home.php");
			}else{alert(res.trim());}
		});
	}
</script>
