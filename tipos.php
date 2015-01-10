<?php
session_start();
require_once("scripts/connect_db.php");

$tipoquiz = $_POST['tquiz'];
$tipoquiz = strip_tags($tipoquiz);
$tipoquiz = mysql_real_escape_string($tipoquiz);


$con = mysql_query("SELECT * FROM quiz_types WHERE quizname = '$tipoquiz' ORDER BY quizname")	or die(mysql_error());
	if(mysql_num_rows($con) ==0){
		echo "erro";
	}else{
		while($ln = mysql_fetch_assoc($con)){
			echo '<option value="'.$ln['tipoquestao'].'"> '.$ln['tipoquestao'].' </option>';
			
		}
	}

?>