<html>
<head><link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<script src="inc/jq.js"></script>
<script src="inc/jqui.js"></script>
<script type="text/javascript" src="inc/jquery.js"></script><!--
<sxript type="text/javascript" src="vendor/jquery/jquery.js"></sxript>-->
<style>
*{margin:0px auto;}
p,h1,h2,h3,h4,h5,h6{cursor:default;}
input:focus{outline:2px solid #ff8000;}
::selection{background:transparent;}
.formholder{min-height:52%;background:#fff;width:40%;margin-top:3%;font-family: arial,rockwell;border-radius: 30px;box-shadow: 20px #f0f0f0;}
.title{background:#8080ff;height:12%;width:100%;text-align:center;padding-top:30px;border-top-left-radius:20px;border-top-right-radius:20px; }
input[type=date],[type=time],[type=text][type=text],[type=text],[type=text],[type=text]{height:30px;width:80%;border:none;border-bottom:2px solid blue;}
.button1{height:40px;width:50px;border-radius:10px;float:right;margin-right:2%;background:green;}
.button2{height:40px;width:60px;border-radius:10px;float:left;margin-left:2%;background: #f0f0f0;text-align:center;line-height:40px;cursor:pointer;}
.overlay{height:100%;width:100%;cursor:progress;top:0;left: 0;background:transparent;position: fixed;z-index: 9;display:none;}
.lnk{cursor:pointer;font-family:helvetica;float:left;margin-top:20px;margin-left:20px;padding-left:5px}
.lnk:hover{color:blue;cursor:pointer;text-decoration:underline;}
p{padding:1px 20px;}
.row{
	margin-top:5px;width:100%;height: 60px;
}
.wait{height:70px;width:70px;border:10px solid #f0f0f0;border-radius:50%;border-bottom:10px solid green;width:40px;height:40px; animation:spin 1.5s linear infinite;display: none;}
</style>
</head>
<body style="background:lavender;">
<div class="formholder">
	<div class="overlay" id="prog"><div class="overlayprogress" ></div></div>
<form method="post" id="addform">
	<div class="title"><h2> <b>RECORD NEW SALE</b></h2></div>
<p> <label for="sdate">Sale date<br><input type="date" placeholder=" Enter sell date" id="sdate" name="sdate" autocomplete="off" required></label></p>
<p><label for="stime">Sale time<br><input type="time" name="time" placeholder="  Enter sale date" id="stime" autocomplete="off" required></i></label></p>
<p><label for="buyer"> Buyer<br><input type="text" placeholder=" Buyer name" name="buyer" id="buyer" autocomplete="off" required></label></p>
<p><label for="trans">Transporter:<br><input type="text" placeholder="Enter transporter registration " name="trans" id="trans" autocomplete="off" required></label></p>
<p><label for="bags"> Number of bags<br><input type="text" placeholder=" Enter number of bags sold" name="bags" id="bags" autocomplete="off" required></label></p>
<p><label for="weight">Total weight:<br><input type="text" placeholder=" Enter total weight" name="weight" id="weight"
 autocomplete="off" required> </label></p>

<div class="row"><div class="button2" onclick="home()">Home</div><button class="button1" ><i class="fas fa-fw fa-plus" style="color:white;"></i></button></div>
</form></div></body>
<script>
	$('#addform').submit(function(e){
	e.preventDefault()
	var dat=$(this).serialize();
  console.log(dat);
	$.ajax({method:"post",url:"newvalidate.php",data:dat,
		beforeSend:function(){
			$(".wait").fadeIn();},
		complete:function(){$('.wait').fadeOut();}
	}).fail(function(){alert("Unknown error!");
}).done(function(res){
	if(res.trim()=="success"){window.location=window.location;}
else{alert(res.trim())}
});})
function home(){
	location.replace("home.php");
}
</script>
</html>
