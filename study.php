<?php
session_start();
require_once("scripts/connect_db.php");

/////////////////////////////
///Verifica se esta logado///
/////////////////////////////
if (!isset($_SESSION["username"]) || !isset($_SESSION["pass1"])){
	echo"<script language='javascript' type='text/javascript'>alert('Usuário não logado! Entre com seu login ou faça um novo cadastro!');window.location.href='login.php'</script>";
	exit;
}else{
if(isset($_GET['question'])){
	$question = preg_replace('/[^0-9]/', "", $_GET['question']);
	$next = $question + 1;
	$prev = $question - 1;

	//tipo plano de estudo
	$_SESSION['type'] = 0;

	//////////////////////////////////////////////
	///Verifica se o usuario nao esta roubando///
	////////////////////////////////////////////
	if(!isset($_SESSION['qid_array']) && $question != 1){
		echo"<script language='javascript' type='text/javascript'>alert('Desculpe, você tem que começar do início!');window.location.href='index.php'</script>";
		exit();
	}
	if(isset($_SESSION['qid_array']) && in_array($question, $_SESSION['qid_array'])){
		echo"<script language='javascript' type='text/javascript'>alert('Desculpe, mas roubo não é permitido. Você terá que começar do início!');window.location.href='index.php'</script>";
		unset($_SESSION['answer_array']);
		unset($_SESSION['qid_array']);
		session_destroy();
		exit();
	}
	if(isset($_SESSION['lastQuestion']) && $_SESSION['lastQuestion'] != $prev){
		echo"<script language='javascript' type='text/javascript'>alert('Desculpe, mas roubo não é permitido. Você terá que começar do início!');window.location.href='index.php'</script>";
		unset($_SESSION['answer_array']);
		unset($_SESSION['qid_array']);
		session_destroy();
		exit();
	}
}
}
?>
<!doctype html>
<html>
<head>


<meta charset= "utf-8">
<title>Quiz</title>
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

<!-- ////////////////////////////////////////////-->
<!--Script para exibir a questão na página,pegar -->
<!--a resposta certa e exibir a proxima pergunta.-->	
<!--/////////////////////////////////////////////-->
<script>
function getQuestion(){
	var hr = new XMLHttpRequest();
		hr.onreadystatechange = function(){
		if (hr.readyState==4 && hr.status==200){
			var response = hr.responseText.split("|");
			if(response[0] == "finished"){
				document.getElementById('status').innerHTML = response[1];
			}
			var nums = hr.responseText.split("|");
			document.getElementById('question').innerHTML = nums[0];
			//document.getElementById("feedback").innerHTML = nums[1];
			document.getElementById('answers').innerHTML = '<h1>'+nums[1];
			document.getElementById('answers').innerHTML += nums[2];
		}
	}
hr.open("GET", "questions.php?question=" + <?php echo $question; ?>, true);
  hr.send();
}
function x() {
		var rads = document.getElementsByName("rads");
		for ( var i = 0; i < rads.length; i++ ) {
		if ( rads[i].checked ){
		var val = rads[i].value;
		return val;
		}
	}
}

function post_answer2(){
	var p = new XMLHttpRequest();
	//var hr = new XMLHttpRequest();
			var id = document.getElementById('qid').value;
			var fed = document.getElementById('qfb').value;
			var url = "userAnswers.php";
			var vars = "qid="+id+"&radio="+x();
			var res = x();
			p.open("POST", url, true);
			p.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			p.onreadystatechange = function() {
		if(p.readyState == 4 && p.status == 200) {
			//var nums = hr.responseText.split(",");
			document.getElementById("status").innerHTML = '';

			if(res ==1){
				//var fed = '<php echo $_SESSION[feedback];?>';
				//var certa = 'Resposta Certa.';
				alert('Resposta Certa.' + '\n\nSobre a questão:\n\n'+fed);
				
			}else{
				alert('Resposta Errada.'+'\n\nSobre a questão:\n\n'+fed);
			}
			
			var a = p.responseText;
			var url = 'study.php?question=<?php echo $next; ?>';
			window.location = url;
	}
}
p.send(vars);
document.getElementById("status").innerHTML = "processando...";
	
}

</script>



</head>

<body onLoad="getQuestion()">
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
 <div class="content"> 	
<div id="status">

<div id="question"></div>
<div id="answers"></div>
<div id="feedback"></div>

</div>
</div>
</div>
  <div class="footer"><br />&copy; 2014  by Leandro Moreira </div>
</div>
</body>
</html>