<?php 
require_once("scripts/connect_db.php");
session_start();

if(isset($_POST['intuitiva'])){

  $intuitiva = strip_tags($_POST['intuitiva']);
  $dificuldades = strip_tags($_POST['dificuldades']);
  $objetivos = strip_tags($_POST['objetivos']);
  $prefInterface = strip_tags($_POST['prefInterface']);
  $interAjuda = strip_tags($_POST['interAjuda']);
  $interFaceLimpa = strip_tags($_POST['interfaceLimpa']);
  $ajudaVoce = strip_tags($_POST['ajudaVoce']);
  $gostouSite = strip_tags($_POST['gostouSite']);
  $voltarUsar = strip_tags($_POST['voltarUsar']);
  $usarJogos = strip_tags($_POST['usarJogos']);
  $siteEstudaria = strip_tags($_POST['siteEstudaria']);
  $sugestao = strip_tags($_POST['sugestao']);
  

  //Aqui to so a lembranca
  $query = mysql_query("INSERT INTO questionario2 (intuitiva,dificuldades,objetivos,prefInterface,interAjuda,interFaceLimpa,
    ajudaVoce,gostouSite,voltarUsar,usarJogos,siteEstudaria,sugestao) VALUES ('$intuitiva','$dificuldades','$objetivos','$prefInterface',
    '$interAjuda','$interFaceLimpa','$ajudaVoce','$gostouSite','$voltarUsar','$usarJogos','$siteEstudaria','$sugestao')") or die(msql_error());
              
     
    if($query){
        echo"<script language='javascript' type='text/javascript'>alert('Obrigado! Suas respostas foram enviadas. ');window.location.href='result.php'</script>";
        }else{
         echo"<script language='javascript' type='text/javascript'>alert('Não foi possível responder o questionário!');window.location.href='player.php'</script>";
             }
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
    <a href="index.php">Inicio</a> 
    <div class="clearer"><span></span></div>
  </div>
  <div class="holder_top"></div>
  <div class="holder">
    <div style="margin-left:auto;margin-right:auto;text-align:left;">
    <form action="" method="post" class="form">
    <h1 style="text-align:center">Questionário sobre o Site</h1><br /><br />
<br />
<div class = "content"> 

<!-- Aqui ficará os valores para a idade -->
<h3>Você achou a aplicação intuitiva? <br /><br />
  <select name="intuitiva">
      <option value="">Selecione sua resposta</option>
      <option value="intN">Não</option>
      <option value="intS">Sim</option>

    </select> <br /><br />

<!-- Aqui ficará os valores para a idade -->
Teve dificuldades para usá-la?<br /><br />
  <select name="dificuldades">
     <option value="">Selecione sua resposta</option>
      <option value="difS">Sim</option>
      <option value="difN">Não</option>
 
    </select> <br /><br />

<!-- Aqui ficará os valores para a idade -->
Prefere sites objetivos (sites diretos, sem muita complicação) ? <br /><br />
  <select name="objetivos">
     <option value="">Selecione sua resposta</option>
      <option value="objS">Sim, são fáceis de entender</option>
      <option value="objNTP">Não tenho uma preferência</option>
      <option value="objN">Não, tenho facilidade pra entender  </option>
    </select> <br /><br /> 

   

    <!-- Aqui ficará os valores para a idade -->
Prefere interfaces mais limpa (sem "spans" e propagandas) ou com mais propagandas? <br /><br />
  <select name="prefInterface">
     <option value="">Selecione sua resposta</option>
      <option value="MS">Mais limpa</option>
      <option value="CP">Com propagandas</option>
      <option value="NTP">Não tenho preferência</option>
    </select> <br /><br />

<!-- Aqui ficará os valores para a idade -->
Você acha que interfaces mais limpas, ajudam a concentrar melhor no objetivo principal do site?<br /><br />
  <select name="interAjuda">
     <option value="">Selecione sua resposta</option>
      <option value="interS">Sim</option>
      <option value="interN">Não</option>
    </select> <br /><br />


<!-- Aqui ficará os valores para a idade -->
Você achou a interface deste site limpa? <br /><br />
  <select name="interfaceLimpa">
     <option value="">Selecione sua resposta</option>
      <option value="limpaS">Sim</option>
      <option value="limpaN">Não</option>
    </select> <br /><br />

    <!-- Aqui ficará os valores para a idade -->
Acha que este site ajudaria você a estudar? <br /><br />
  <select name="ajudaVoce">
     <option value="">Selecione sua resposta</option>
      <option value="ajudaS">Sim</option>
      <option value="ajudaN">Não</option>
    </select> <br /><br />

    <!-- Aqui ficará os valores para a idade -->
Gostou da interface (aparência) do site? <br /><br />
  <select name="gostouSite">
     <option value="">Selecione sua resposta</option>
      <option value="gostouS">Sim</option>
      <option value="gostouN">Não</option>
    </select> <br /><br />

 <!-- Aqui ficará os valores para a idade -->
Voltaria a usá-lo?<br /><br />
  <select name="voltarUsar">
     <option value="">Selecione sua resposta</option>
      <option value="voltaS">Sim</option>
      <option value="voltaN">Não</option>
    </select> <br /><br />

  <!-- Aqui ficará os valores para a idade -->
Acha interessante usar jogos para aprender?<br /><br />
  <select name="usarJogos">
     <option value="">Selecione sua resposta</option>
      <option value="jogosS">Sim</option>
      <option value="jogosN">Não</option>
    </select> <br /><br />   

Estudaria usando este site (caso fosse cadastrado perguntas do seu interesse de estudo)?<br /><br />
  <select name="siteEstudaria">
     <option value="">Selecione sua resposta</option>
      <option value="siteS">Sim</option>
      <option value="siteN">Não</option>
    </select> <br /><br />   

  Tem sujestões para melhorar a aplicação? Deixe-a abaixo:</h3>
    <br />
    <textarea id="sug" name="sugestao" style="width:400px;height:95px;"></textarea>
    <br />   <br /><br />
 <p class="submit">   
<center><button type="submit" >Enviar Respostas</button></center>
</p>
</div>
</form>
</div>
        
       
    
  </div>
  <div class="footer">&copy; 2014  by Leandro Moreira </div>
</div>
        

</body>
</html>