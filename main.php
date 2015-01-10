<?php

session_start(); 
require_once("scripts/connect_db.php");
if (!isset($_SESSION["username"]) || !isset($_SESSION["pass1"])){
	echo "<script language='javascript' type='text/javascript'>alert('Usuário não logado! Entre com seu login ou faça um novo cadastro!');window.location.href='login.php'</script>";

	//header("Location: login.php");
	exit;

}
  $qtype= $_POST['tiposP'];
  $singleSQL = mysql_query("SELECT * FROM questions WHERE qtype= '$qtype'");
  //$sing= mysql_query("SELECT * FROM questions ORDER BY RAND() LIMIT 15")or die(mysql_error());
  $numperg = mysql_num_rows($singleSQL);
    if($numperg<1){
      echo"<script language='javascript' type='text/javascript'>alert('Não há perguntas cadastradas nesta máteria ainda, escolha outra!');window.location.href='type.php'</script>";

    }
if($_POST['tiposP']=="" || $_POST['tiposP']=="Selecione..." || $_POST['tquiz']=="" || $_POST['tquiz']=="Selecione..."){
		echo"<script language='javascript' type='text/javascript'>alert('Voce precisa escolher um tipo de jogo.');window.location.href='type.php'</script>";
	}


$_SESSION['result_type'] = $_POST['tiposP'];
$_SESSION['gamename'] = $_POST['tquiz'];
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
  <style type="text/css">
.contents{
  
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
    <a href="player.php">Inicio</a> 

    <div class="clearer"><span></span></div>
  </div>
  <div class="holder_top"></div>
  <div class="holder">
  <div class="contents">	
  <center><h1>Tipos de Jogo</h1></center> <br /><br />

 	<font color="#000000"><h3>Plano de Estudo: <br /><br /></font>

  &nbsp;&nbsp;O modo plano de estudo é composto por perguntas de multiplas escolhas, não tendo um tempo limite. Além disto, a cada resposta, você receberá um "feedback",
  o qual lhe informará o por que de você ter acertado ou errado aquela questão.<br /><br />
  <center><button  class= "botao01" onClick="startQuiz('study.php?question=1')">Jogar Modo Plano de Estudo</button></center>
  <br /><br />

  <font color="#000000">Modo Simulado: <br /><br /></font>

  &nbsp;&nbsp;O modo simulado é composto por perguntas de multiplas escolhas, com uma limitação de 1 minuto (60 segundos) para responder cada questão, caso este tempo
  acabe, a resposta será automaticamente marcada como incorreta.<br /><br />
  <center><button class= "botao01" onClick="startQuiz('quiz.php?question=1')">Jogar Modo Simulado</button></center><br />
 	

  <br /><br />
   Você pode também, acessar ao gráfico das suas últimas tentativas.</h3><br /><br />
	<center><button  class= "botao01" onClick="mostraDiv('grafico')">Exibir gráfico das últimas tentativas</button><center><br /><br />	
    
	  <div class="content" id="grafico">
  	
  	 <img src="graphics.php">
  	
  
	</div>
</div>
</div>
  <div class="footer">&copy; 2014  by Leandro Moreira </div>
</div>
</body>
</html>	