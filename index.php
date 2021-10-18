<?php
require('common/dbmanage.php');
$table=date('M_Y');
if(isset($_SESSION['currentUser'])){
  header("Location:home.php");
}
  else{
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
  .prog{height:30px;width:100%;text-align:center;color:blue;display: block;}
  button{padding:8px;border: 1px solid #6495ed;background:#4682b4;outline:none;color:#fff;min-width:80px;border-radius:5px;text-shadow;0px 1px 1px #000;}
</style>



<div class="main">
  <h2 style="text-align:center;color:#191970;"> Account Login</h2><br><br>
  <div class="prog" id="prog"></div>
  <form method="post" id="lform">
    <div style="margin:0 auto;width:300px">
      <p> Username<br>
      <input type="text" name="user" autocomplete="false" autofocus required></p><br>
      <p> Password:<br>
      <input type="password" name="pass" required></p><br>
    <p style="text-align:right;"> <span style="float:left;" onclick="register()" class="lnk"> Register</span>
      <button> Login</button></p><br>
    </div><br>
  </form>

</div>
<script>
function register(){
location.replace("signup.php");
}
$("#lform").submit(function(e){
  e.preventDefault();
  var det=$("#lform").serialize();
  $.ajax({
    method:"POST",
    url:"loginvalidate.php",
    data:det,
    beforeSend:function(){
      $(".prog").text("Processing...");
      setTimeout(function () {
        $(".prog").text('');
      }, 2000);
    },
    success:function(data,status,xhr){
    if(data=="found"){
      console.log(data);
      location.replace("home.php");
    }
    else{
      $(".prog").html(data);
    }
    }
  }).fail(function(){
    alert("An error occured!");
  })
})

</script>
<?php
}

?>
