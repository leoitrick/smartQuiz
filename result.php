<?php
session_start();
require_once("scripts/connect_db.php");
?>


<html>
<head>
	<meta charset="utf-8">
	<title>Resultados</title>
	<link rel="stylesheet" type="text/css" href="default.css" media="screen"/>
<script language="javascript">
function mostraDiv(el){
                        document.getElementById(el).style.display = "block";
                                }

</script>
<script>
function voltaPagina(url){
	window.location = url;
}
</script>
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
<style type="text/css">
.content{
	margin-top:48px;
	margin-left:auto;
	margin-right:auto;
	width:780px;
	padding:12px;
	display:none;
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
    <a href="logout.php">Sair</a>
    <a href="player.php">Inicio</a> 

    <div class="clearer"><span></span></div>
  </div>
  <div class="holder_top"></div>
  <div class="holder">
  	<div class="contents">
  <div style="margin-left:auto;margin-right:auto;text-align:center;">
   <p style="color:#06F;"></p>
	<h2>Resultado e Desenvolvimento do Aluno:</h2><br /><br />

	
	
	 <h3><?php
	 	$username = $_SESSION['username'];
	 	

		$resultado = mysql_query("SELECT percentage FROM quiz_takers WHERE username='$username' and id ORDER BY id DESC LIMIT 1 ") or die(mysql_error());
		$resultado = mysql_fetch_array($resultado);

		if($resultado["percentage"] <= 60){
			echo "<font color='#000000'>Sua nota foi de: $resultado[percentage]%<br /><br /></font>";
			echo "<font color='#000000'>Porém sua nota não foi satisfatória. Estude mais e volte a tentar o simulado novamente.<br /><br /></font>";
		}else{
			echo "<font color='#000000'>Sua nota foi de: $resultado[percentage]% <br /><br /></font>";
			echo "<font color='#000000'>Sua nota foi satisfatória. Parabéns.<br /><br /></font>";

	}
	?></h3><br />

	<h3><p>Para vizualizar seu histórico de jogadas, clique abaixo:</p>
	<button onClick="voltaPagina('historic.php')">Ver Histórico</button></span>&nbsp;&nbsp;<br /><br />

	<!--<button onClick="voltaPagina('main.php')">Voltar a tela principal</button></span>&nbsp;&nbsp;<br /><br />-->
	<p>Para vizualizar o gráfico de seu rendimento nos simulados até o momento, clique abaixo:</p>
    <button onClick="mostraDiv('grafico')">Exibir</button>&nbsp;&nbsp;<br /><br /></h3>

  </div>

  <div class="content" id="grafico">
  	
  	 <img src="graphics.php">
  	
  </div>
  </div>	
</div>
  <div class="footer">&copy; 2014  by Leandro Moreira </div>
</div>
</body>
</html>