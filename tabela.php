<?php
session_start();
require_once("scripts/connect_db.php");


$data = $_POST['data'];
$tipo= $_POST['tipo'];
$mat = $_POST['mat'];


//echo $tipo;
//////////////////////////////////////////
//Fazendo tabela com dados da pesquisa///
////////////////////////////////////////
if($data=="0000-00-00"){
	$consulta = mysql_query("SELECT * FROM quiz_takers WHERE username='$_SESSION[username]'") or die(mysql_error());
	if($tipo==2){
		if($mat=="Todas"){
			
			$consulta = mysql_query("SELECT * FROM quiz_takers WHERE username='$_SESSION[username]'") or die(mysql_error());
		}else{

			$consulta = mysql_query("SELECT correct,incorrect,number_question,percentage,type_game,date_play FROM quiz_takers WHERE result_type='$mat' AND username='$_SESSION[username]'") or die(mysql_error());
		}
	}else{
		
		if($mat=="Todas"){
			$consulta = mysql_query("SELECT correct,incorrect,number_question,percentage,result_type,date_play FROM quiz_takers WHERE type_game='$tipo' AND username='$_SESSION[username]' ") or die(mysql_error());
		}else{
			$consulta = mysql_query("SELECT correct,incorrect,number_question,percentage,date_play FROM quiz_takers WHERE type_game='$tipo' AND result_type='$mat' AND username='$_SESSION[username]'") or die(mysql_error());
		}
	}
	
}else{
if($tipo==2){
 if($mat=="Todas"){
	$consulta = mysql_query("SELECT correct,incorrect,number_question,percentage,result_type,type_game FROM quiz_takers WHERE date_play='$data' AND username='$_SESSION[username]'") or die(mysql_error());
 }else{
	$consulta = mysql_query("SELECT correct,incorrect,number_question,percentage,type_game FROM quiz_takers WHERE date_play='$data' AND result_type='$mat' AND username='$_SESSION[username]'") or die(mysql_error());
 }
}else{	
if($mat=="Todas"){
	$consulta = mysql_query("SELECT correct,incorrect,number_question,percentage,result_type FROM quiz_takers WHERE date_play='$data' AND type_game='$tipo' AND username='$_SESSION[username]'") or die(mysql_error());
}else{
	////////////////////////////
	//Exibi consulta específica
	$consulta = mysql_query("SELECT correct,incorrect,number_question,percentage FROM quiz_takers WHERE date_play='$data' AND result_type='$mat' AND type_game='$tipo' AND username='$_SESSION[username]'") or die(mysql_error());
}
}
}

$cont= 1; 
$tabela = "";

$tabela .= '<table class="sample">';
 
$tabela .= '<tr>';

$tabela .= '<td>Jogada</td>';

if($data=="0000-00-00"){
	$tabela .= '<td>Data</td>';
}
 


$tabela .= '<td>Número de Questões</td>';

$tabela .= '<td>Acertos</td>';

$tabela .= '<td>Erros</td>';
 
$tabela .= '<td>Porcentagem</td>';

if($mat=="Todas"){
	$tabela .= '<td>Matéria</td>';
}

if($tipo==2){
	$tabela .= '<td>Modo de Jogo</td>';
}

$tabela .= '</tr>';
 
// Armazena os dados da consulta em um array associativo

while($registro = mysql_fetch_assoc($consulta)){
 
$tabela .= '<tr>';

$tabela .= '<td><center>'.$cont.'</center></td>';

if($data=="0000-00-00"){
	$tabela .= '<td><center>'.$registro["date_play"].'</center></td>';
}

$tabela .= '<td><center>'.$registro["number_question"].'</center></td>';
 
$tabela .= '<td><center>'.$registro["correct"].'</center></td>';
 
$tabela .= '<td><center>'.$registro["incorrect"].'</center></td>';

$tabela .= '<td><center>'.$registro["percentage"].'</center></td>';

if($mat=="Todas"){
	$tabela .= '<td><center>'.$registro["result_type"].'</center></td>';
}

if($tipo==2){
	if($registro["type_game"]==1){
		$tabela .= '<td><center>'."Simulado".'</center></td>';
	}else{
		$tabela .= '<td><center>'."Plano de Estudo".'</center></td>';
	}

	
}

$tabela .='</tr>';

$cont = $cont+1;
 
}
 
$tabela .= '</table>';
 

?>

<html>
<head>
<script>
function voltaPagina(url){
	window.location = url;
}
</script>
</head>	
<body>
<center><h2>Informações das Tentativas</h2></center><br /><br />

    <p>Dia Jogado: <?php if($data=="0000-00-00"){
    	echo "-";
    }else{
    $date = new DateTime($data);
    echo $date->format('d-m-Y');
	} ?>
    <p>Matéria: <?php echo $mat; ?></p>
    <p>Modo de estudo: <?php if($tipo==1){
      echo "Simulado";
    }
    else if($tipo==2){
      echo "Ambos";
    }
    else if(isset($_SESSION['tipo'])&&$_SESSION['tipo']==0){
      echo "Plano de Estudo";
    }?><p>

    <center><?php echo $tabela ?></center><br /><br />

    <p>Clique abaixo caso queira ver o gráfico desta consulta:</p>
    <button onClick="mostraDiv('grafico')">Exibir</button>&nbsp;&nbsp;<br /><br />
    <div id="grafico" style="Display: none;">
    	<img src="graphics.php">
    
    </div>	
   </body> 
</html>
