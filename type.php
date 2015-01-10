<?php 
	session_start();
	require_once("scripts/connect_db.php");
	

	
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

<script type="text/javascript" src="jquery-1.3.2.js"></script>
 <script type="text/javascript" language="javascript">
$(document).ready(function(){
	$("select[name=tquiz]").change(function(){
		$("select[name=tipos]").html('<option value="">Selecione...</option>');

		$.post("tipos.php",
				 {tquiz:$(this).val()},
				  function(valor){
				$("select[name=tiposP]").html(valor);

		})
	})
})


</script>

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
    <a href="logout.php">Sair</a>
    <a href="player.php">Inicio</a> 
    <div class="clearer"><span></span></div>
  </div>
  <div class="holder_top"></div>
  <div class="holder">
  	<div class="content" style="margin-left:auto;margin-right:auto;text-align:center;">
	<form name="materia" method="post" action="main.php" >
  		<h3>Escolha qual tipo de quiz e qual matéria deseja estudar:</h3><br /><br />
 
 <label for="">Escolha o tipo de quiz:</label>
 <select name="tquiz">
 <option value="">Selecione...</option>
    	<?php 
 		$query = mysql_query("SELECT quizname FROM quiz_types GROUP BY quizname ORDER BY quizname ASC");
 		while($other = mysql_fetch_assoc($query)) { 
 		echo '<option value="'.$other['quizname'].'"> '.$other['quizname'].' </option>';

 		} 
 		?>
 </select><br /><br />
 <label for="">Escolha a matéria:</label>
<select name="tiposP">
    	<option value="">Selecione...</option>
    	<option value="todas">Todas</option>
 		
    </select>
<br /><br />
 	<input type="submit" value="Jogar">
</form>

</div>
	  </div>
  <div class="footer">&copy; 2014  by Leandro Moreira </div>
</div>
</body>
</html>