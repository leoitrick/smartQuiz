<?php 

session_start();
require_once("scripts/connect_db.php");
$arrCount = "";
if(isset($_GET['question'])){
	$question = preg_replace('/[^0-9]/', "", $_GET['question']);
	$output = "";
	$answers = "";
	$q = "";
	
	$sql = mysql_query("SELECT id FROM questions");
	$numQuestions = mysql_num_rows($sql);
	if(!isset($_SESSION['answer_array']) || $_SESSION['answer_array'] < 1){
		$currQuestion = "1";
	}else{
		$arrCount = count($_SESSION['answer_array']);
	}
	if($arrCount > $numQuestions){
		unset($_SESSION['answer_array']);
		header("location: index.php");
		exit();
	}
	if($_SESSION['type']==0){
		if($arrCount >= 20){
		echo 'finished|<p>Não tem mais questões. Por favor, clique em próximo</p>
				<form action="userAnswers.php" method="post">
				<input type="hidden" name="complete" value="true">
				<input type="submit" value="Próximo">

				</form>';
		exit();
	}
	}else{
		/////////////////////////////////////////
		//Aqui delemito o tamanho do simulado///
		///////////////////////////////////////
		if($arrCount >= 20){
		echo 'finished|<p>Não tem mais questões. Por favor, clique em próximo</p>
				<form action="userAnswers.php" method="post">
				<input type="hidden" name="complete" value="true">
				<input type="submit" value="Próximo">

				</form>';
		exit();
	}
	}
	$qtype= $_SESSION['result_type'];
	$singleSQL = mysql_query("SELECT * FROM questions WHERE id='$question' AND qtype= '$qtype' LIMIT 1");
		$numperg = mysql_num_rows($singleSQL);
		while($row = mysql_fetch_array($singleSQL)){
			$id = $row['id'];
			$thisQuestion = $row['question'];
			$feedback = $row['feedback'];
			$question_id = $row['question_id'];
			$q = '<h1>'.$thisQuestion.'</h1><br />';
			$sql2 = mysql_query("SELECT * FROM answers WHERE question_id='$question' ORDER BY rand()");
			while($row2 = mysql_fetch_array($sql2)){
				$answer = $row2['answer'];
				$correct = $row2['correct'];
				$answers .= '<label style="cursor:pointer;&nbsp;"><input type="radio" name="rads" value="'.$correct.'">'.$answer.'</label> 
				<input type="hidden" id="qid" value="'.$id.'" name="qid"><input type="hidden" id="qfb" value="'.$feedback.'" name="qfb"><br /><br />
				';
				
			}
			if($_SESSION['type']==1){
				$output = ''.$q.'|'.$answers.'|<span id="btnSpan"><center><button onclick="post_answer()">Enviar Resposta</button></center></span>';
			}else{
				$output = ''.$q.'|'.$answers.'|<span id="btnSpan"><center><button onclick="post_answer2()">Enviar Resposta</button></center></span>';

			}
			echo $output;
		   }
		}
	
	
	

?>