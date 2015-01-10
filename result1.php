<?php
session_start(); 

require_once("scripts/connect_db.php");
include('scripts/phplot.php');


//$username=$_SESSION['username'];
//$data = $_POST['data'];
//$tipo= $_POST['tipo'];
//$mat = $_POST['mat'];
$volta1= 'costumeS';
$volta2= 'Tdias';
$volta3= 'Sdias';
$volta4= 'Rdias';
//$teste = 'ajudaS';
//$teste2 = 'ajudaN';
//$volta5= 'otimo';

$query=mysql_query("SELECT moodle FROM questionario WHERE moodle= 'moodleN' ") or die(mysql_error());
$query2=mysql_query("SELECT moodle FROM questionario WHERE moodle= 'moodleS' ") or die(mysql_error());
//$query2=mysql_query("SELECT costumeredes and frequencia FROM questionario  WHERE costumeredes= '$volta1' and frequencia='$volta3' " ) or die(mysql_error());
//$query3=mysql_query("SELECT costumeredes and frequencia FROM questionario WHERE costumeredes= '$volta1' and frequencia='$volta4' ") or die(mysql_error());
//$query4=mysql_query("SELECT costumeredes and frequencia FROM questionario WHERE intuitiva= '$volta4' and dificuldades = '$volta3' and ajudaVoce='$teste' ") or die(mysql_error());
//$query5=mysql_query("SELECT intuitiva and dificuldades and ajudaVoce FROM questionario2 WHERE intuitiva= '$volta4' and dificuldades = '$volta3' and ajudaVoce='$teste2' ") or die(mysql_error());
//$query5=mysql_query("SELECT tecProporciona FROM questionario  WHERE tecProporciona = '$volta5' " ) or die(mysql_error());


$linhas=mysql_num_rows($query);
$linhas2=mysql_num_rows($query2);
$linhas3= $linhas + $linhas2;
//$linhas4=mysql_num_rows($query4);
//$linhas5=mysql_num_rows($query5);




//for($i=0;$i<$linhas;$i++){

//$array[]=array(mysql_result ($query, $i,'voltarUsar'));




//}




$array =  array(array(utf8_decode('Conhece'), $linhas),array(utf8_decode('Não conhece'), $linhas2),array(utf8_decode('total'), $linhas3));


$plot=new PHPlot (900, 600);

$plot->SetImageBorderType ('plain');

$plot->SetPlotType('bars');

$plot->SetDataType('text-data');



$plot->SetDataValues($array);



$plot->SetTitle(utf8_decode("Você conhece a plataforma moodle "));

//$plot->SetXTitle('Voltaria');





$plot->SetBackgroundColor('white');


//
$plot->SetXTickLabelPos('none');

$plot->SetXTickPos('none');



$plot->SetYDataLabelPos('plotin');

$plot->DrawGraph();

?>
