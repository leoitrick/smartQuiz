<?php 
require_once("scripts/connect_db.php");
session_start();

 if(!isset($_SESSION['username'])){
 	$membertype = 0;
 }else{
 	$membertype =1;
 }
	if(isset($_POST['username'])){
  		$username = strip_tags($_POST['username']);
   		$email1 = strip_tags($_POST['email1']);
        $email2 = strip_tags($_POST['email2']);
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];

    //Verificando se não há campos não preenchidos///
    if(trim($username) == "" || trim($email1) == "" || trim($pass1) == "" || trim($pass2) == ""){
        echo "Erro: Todos os campos precisam ser preenchidos. Por favor, volte e tente novamente.";
        $db = null;
        exit();
    }
    /// Verificando se os emails sao iguais////
    if($email1 != $email2){
        echo "Emails diferentes. Por favor, volte e tente novamente.";
		$db = null;
        exit();
    }
    /// Verificando se as senhas sao iguais//////
    else if($pass1 != $pass2){
        echo "Senhas diferentes. Por favor, volte e tente novamente.";
		$db = null;
        exit();
    }
    //criptografando a senha
		$pass1 = md5($pass1);

	////////////////////////////////////////////////////////////////////////
	//Verificando se o que vai ser adicionado, ja esta no banco de dados////
	////////////////////////////////////////////////////////////////////////
	 $sql = mysql_query("SELECT username FROM members WHERE username = '$username'");
	 $numCad = mysql_num_rows($sql);
		if($numCad > 0){
			echo"<script language='javascript' type='text/javascript'>alert('Usuário já existe, escolha outro nome.');window.location.href='register.php'</script>";
			$db=null;
			exit();
		}

	///////////////////////////////////
	//cadastrando no banco de dados///
    /////////////////////////////////
    $query = mysql_query("INSERT INTO members (username,password,email,membertype) VALUES ('$username','$pass1', '$email1', '$membertype')") or die(msql_error());
              
     
    if($query){
        echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='login.php'</script>";
        }else{
         echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='register.php'</script>";
             }
     }
        

			

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Registre-se no beSmart Quiz</title>
<link rel="stylesheet" type="text/css" href="default.css" media="screen"/>
<style type="text/css">
.content{
	margin-top:48px;
	margin-left:auto;
	margin-right:auto;
	width:550px;
	border:#333 1px solid;
	border-radius:12px;
	-moz-border-radius:12px;
	padding:12px;
	
}
</style>

</head>
<body>
	<div class="container">
  <div class="navigation">
    <div class="title">
      <h1>beSmart Quiz</h1>
      <h2>- A nova forma de estudar! -</h2>
    </div>
    <a href="index.php">Inicio</a> 
    <div class="clearer"><span></span></div>
  </div>
  <div class="holder_top"></div>
  <div class="holder">
<div style="width:700px;margin-left:auto;margin-right:auto;text-align:center;">
    <form action="" method="post" class="form">
    <h3 style="text-align:center">Digite os dados do cadastro:</h3>
<br />
<div class = "content">    
<label for="username"><strong>Login</strong>
<br />
<input type="text" name="username">
</label>
<br />
<label for="email1"><strong>Email</strong>
<br />
<input type="text" name="email1">
</label>
<br />
<label for="email2"><strong>Confirmar Email</strong>
<br />
<input type="text" name="email2">
</label>
<br />
<label for="pass1"><strong>Senha</strong>
<br />
<input type="password" name="pass1">
</label>
<br />
<label for="pass2"><strong>Confirmar Senha</strong>
<br />
<input type="password" name="pass2">
</label>
<br />
<br />
<p class="submit">
<button type="submit" >Cadastrar</button>
</p>
</div>
</form>
</div>
 </div>
  <div class="footer">&copy; 2014  by Leandro Moreira </div>
</div>
</body>
</html>