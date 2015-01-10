<?php 
require_once("scripts/connect_db.php");
if(isset($_POST['username'])){
$username = $_POST['username'];
$pass1 = md5($_POST['pass1']);
$sql = mysql_query("SELECT * FROM members WHERE username = '$username' and password = '$pass1'") or die(mysql_error());
$row = mysql_num_rows($sql);
$tipousuario = mysql_query("SELECT membertype FROM members WHERE username = '$username'") or die(mysql_error());
$tipousuario = mysql_fetch_array($tipousuario);
if($row>0){
	session_start();
	$_SESSION['username']= $_POST['username'];
	$_SESSION['pass1']= $_POST['pass1'];
	$_SESSION['membertype'] = $tipousuario["membertype"];
	//echo "$tipousuario[membertype]";
	//echo "<center>Voce foi logado com sucesso! Aguarde um instante!</center>";
	if($_SESSION['username']== "admin"){
		echo"<script language='javascript' type='text/javascript'>alert('Usuário logado com sucesso!');window.location.href='index.php'</script>";
	}else if($tipousuario["membertype"]==1){
		echo"<script language='javascript' type='text/javascript'>alert('Usuário logado com sucesso!');window.location.href='teacher.php'</script>";
	}else {
			echo"<script language='javascript' type='text/javascript'>alert('Usuário logado com sucesso!');window.location.href='player.php'</script>";
	}

	//echo "<script> loginsuccess('index.php') </script>";
}else{
	//echo "<center>Usuario ou Senha inválidos! Aguarde um instante!</center>";
	echo"<script language='javascript' type='text/javascript'>alert('Usuário ou Senha inválidos!');window.location.href='login.php'</script>";
	//echo "<script>loginfailed('login.php')</script>";
}
}
?>

<html>
<head>
	<meta charset="utf-8">
	<title>Faça seu Login</title>
	<link rel="stylesheet" type="text/css" href="default.css" media="screen"/>
	<style type="text/css">
.content{
	
	margin-left:auto;
	margin-right:auto;
	width:550px;
	border:#333 1px solid;
	border-radius:12px;
	-moz-border-radius:12px;
	padding:12px;
	
}
</style>
<script>
function voltaPagina(url){
	window.location = url;
}
</script>
</head>

<body>
	    <div class="container">
  <div class="navigation">
    <div class="title">
      <h1>beSmart Quiz</h1>
      <h2>- A nova forma de estudar! -</h2>
    </div>
    <a href="index.php">Inicio</a> 
    <a href="register.php">Cadastrar</a>
    <div class="clearer"><span></span></div>
  </div>
  <div class="holder_top"></div>
  <div class="holder">
  	<div class="content" style="margin-left:auto;margin-right:auto;text-align:center;">
	<form name="login" method="post" action="">
		<label for="username"><strong>Login:</strong><input type="text" name="username"><br /><br />
		<label for="pass1"><strong>Senha:</strong><input type="password" name="pass1"><br /><br />
		<input type="submit" value="Entrar">
	</form>	

</div>
	  </div>
  <div class="footer">&copy; 2014  by Leandro Moreira </div>
</div>
</body>
</html>