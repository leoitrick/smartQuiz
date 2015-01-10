<?php

session_start(); 
require_once("scripts/connect_db.php");
if (!isset($_SESSION["username"]) || !isset($_SESSION["pass1"])){
	echo "<script language='javascript' type='text/javascript'>alert('Usuário não logado! Entre com seu login ou faça um novo cadastro!');window.location.href='login.php'</script>";
  exit;
 } 
if ($_SESSION['membertype'] != 1){
  echo "<script language='javascript' type='text/javascript'>alert('Somente professor pode ter acesso a esta página!');window.location.href='main.php'</script>";
  exit;
}
	//header("Location: login.php");
	



?>
<html>
<head>
	<meta charset="utf-8">
	<title>beSmart Quiz</title>
	<link rel="stylesheet" type="text/css" href="default.css" media="screen"/>
<style type="text/css">
.content{
	margin-top:48px;
	margin-left:auto;
	margin-right:auto;
	
	display:none;
}

</style>

<script>
function startQuiz(url){
	window.location = url;

}
</script>
<script language="javascript">
function mostraDiv(el){
    document.getElementById(el).style.display = "block";
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
    <a href="logout.php">Sair</a>
    <a href="teacher.php">Inicio</a> 

    <div class="clearer"><span></span></div>
  </div>
  <div class="holder_top"></div>
  <div class="holder">
  	 <center><img src="img/be-Smart.jpg"/>
        <center><h1>Bem Vindo ao beSmart Quiz</h1><br /><br /><br />
  	
 	
 	

  <br />
   <center>	<h3>Clique abaixo o modo que deseja jogar:</h3><br /><br />
	<button onClick="startQuiz('addQuiz.php')">Adicionar um novo Quiz</button>
	<button onClick="startQuiz('addQuestions.php')">Cadastrar Perguntas</button>
<br /><br />	
	 
</div>
  <div class="footer">&copy; 2014  by Leandro Moreira </div>
</div>
</body>
</html>	