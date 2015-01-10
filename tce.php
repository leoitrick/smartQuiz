<?php

session_start(); 
require_once("scripts/connect_db.php");
if (!isset($_SESSION["username"]) || !isset($_SESSION["pass1"])){
  echo "<script language='javascript' type='text/javascript'>alert('Usuário não logado! Entre com seu login ou faça um novo cadastro!');window.location.href='login.php'</script>";
  exit;
 } 

  



?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>beSmart Quiz</title>
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

<script>
function startQuiz(url){
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
    <div class="content">

     
    <center><h1><font color="#000000">Termo de Consentimento Livre e Esclarecido - TCLE</font></h1></center><br /><br />
     <h3>  <p>&nbsp;&nbsp;&nbsp;&nbsp;Eu, Leandro José Moreira, responsável pela pesquisa "A Influência da Tecnologia na Educação: Estudo heurístico do uso de ferramentas de estudo no aprendizado", estou fazendo um convite para você participar como voluntário deste nosso estudo.<br /></p>

<p>&nbsp;&nbsp;&nbsp;&nbsp;Esta pesquisa pretende analisar se o uso da tecnologia é beneficiente à nossas vidas, principalmente dentro da educação. Acreditamos que ela seja importante porque através dos resultados,
  a criação de ferramentas nesta área poderão se tornar úteis e ter uma maior visibilidade. Para sua realização será apresentado dois questionários, um sobre o tema em geral
  e outro sobre esta ferramenta. Sua participação constará de (participação do voluntário).
É possível que aconteçam os seguintes desconfortos ou riscos (como por exemplo, desconforto visual). Os benefícios que esperamos como estudo são o aumento no investimento de tecnologias na educação, podendo proporcionar assim
 um novo meio interessante de ser aprender.
</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;Durante todo o período da pesquisa você tem o direito de tirar qualquer dúvida ou pedir qualquer outro esclarecimento, bastando para isso entrar em contato. Em caso de algum problema relacionado com a pesquisa você terá direito à assistência gratuita que será prestada por mim.
Você tem garantido o seu direito de não aceitar participar ou de retirar sua permissão, a qualquer momento, sem nenhum tipo de prejuízo ou retaliação, pela sua decisão (voluntariedade).É importante esclarecer que, caso você decida não participar, apenas não aceite este documento que você será redirecionado para a próxima página.</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;As informações desta pesquisa serão confidencias, e serão divulgadas apenas em eventos ou publicações científicas, não havendo identificação dos voluntários, a não ser entre os responsáveis pelo estudo, sendo assegurado o sigilo sobre sua participação (confidencialialidade).

<br /><br />
<font color="#000000">Autorização:<br /><br /></font>
￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼
&nbsp;&nbsp;&nbsp;&nbsp;Eu, <?php echo "$_SESSION[username]";?>, após a leitura deste documento e ter tido a oportunidade de conversar com o pesquisador responsável, para esclarecer todas as minhas dúvidas, acredito estar suficientemente informado, ficando claro para mim que minha participação é voluntária e que posso retirar este consentimento a qualquer momento sem penalidades ou perda de qualquer benefício. Estou ciente também dos objetivos da pesquisa, dos procedimentos aos quais serei submetido, dos possíveis danos ou riscos deles provenientes e da garantia de confidencialidade e esclarecimentos sempre que desejar. Diante do exposto expresso minha concordância de espontânea vontade em participar deste estudo.


<br /><br /><center>  <h3>Declaro que li e concordo com as informações acima citadas:</h3><br /><br />
  <button  class= "botao01" onClick="startQuiz('questionario.php')">Aceitar</button>
  <button class= "botao01" onClick="startQuiz('result.php')">Não aceitar</button></center>
<br /><br />
<font color="#000000">Dado do pesquisador: <br /><br /></font>

Nome: Leandro José Moreira<br />
Endereço: Rua Expedicionário Lucindo Martins de Abreu, 419, São João del Rei - MG<br />
Email: leandro.tkd.ufsj@gmail.com </p></h3><br /><br />

  </div>  
  </div>
  <div class="footer">&copy; 2014  by Leandro Moreira </div>
</div>
        

</body>
</html>