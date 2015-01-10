<?php 
require_once("scripts/connect_db.php");
session_start();

if(isset($_POST['idade'])){


  $idade = strip_tags($_POST['idade']);
  $estadocivil = strip_tags($_POST['estadocivil']);
  $formacao = strip_tags($_POST['formacao']);
  $area = strip_tags($_POST['area']);
  $moradia = strip_tags($_POST['moradia']);
  $conhecimento = strip_tags($_POST['conhecimento']);
  $ajuda = strip_tags($_POST['ajuda']);
  $saberusar = strip_tags($_POST['saberusar']);
  $curso = strip_tags($_POST['curso']);
  $acesso = strip_tags($_POST['acesso']);
  $costumeredes = strip_tags($_POST['costumeredes']);
  $frequencia = strip_tags($_POST['frequencia']);
  $apreTrabalho = strip_tags($_POST['apreTrabalho']);
  $trabalho = strip_tags($_POST['trabalho']);
  $assistiuaulas = strip_tags($_POST['assistiuaulas']);
  $aula = strip_tags($_POST['aula']);
  $moodle = strip_tags($_POST['moodle']);
  $onde = strip_tags($_POST['onde']);
  $estudaU = strip_tags($_POST['estudaU']);
  $testudo = strip_tags($_POST['testudo']);
  $facilidadeAprender = strip_tags($_POST['facilidadeAprender']);
  $freqComputador = strip_tags($_POST['freqComputador']);
  $acessoInternet = strip_tags($_POST['acessoInternet']);
  $tipoInternet = strip_tags($_POST['tipoInternet']);
  $freqInternet = strip_tags($_POST['freqInternet']);
  $smartphone = strip_tags($_POST['smartphone']);
  $jogar = strip_tags($_POST['jogar']);
  $freqJogar = strip_tags($_POST['freqJogar']);
  $prefJogos = strip_tags($_POST['prefJogos']);
  $costumaTv = strip_tags($_POST['costumaTv']);
  $asstv = strip_tags($_POST['asstv']);
  $tecAjuda = strip_tags($_POST['tecAjuda']);
  $tecProporciona = strip_tags($_POST['tecProporciona']);
  $usoEscola = strip_tags($_POST['usoEscola']);
  $tecAtualidade = strip_tags($_POST['tecAtualidade']);

  //Aqui to so a lembranca
  //$query = mysql_query("INSERT INTO questionario(onde,estudaU,testudo,facilidadeAprender,freqComputador,acessoInternet,tipoInternet,freqInternet,smartphone,jogar,freqJogar,prefJogos,costumaTv,asstv,tecAjuda,tecProporciona,usoEscola,tecAtualidade) VALUES ('$onde','$estudaU','$testudo','$facilidadeAprender','$freqComputador','$acessoInternet','$tipoInternet','$freqInternet','$smartphone','$jogar','$freqJogar','$prefJogos','$costumaTv','$asstv','$tecAjuda','$tecProporciona','$usoEscola','$tecAtualidade')") or die(msql_error());
  $query2 = mysql_query("INSERT INTO questionario(idade,estadocivil,formacao,area,moradia,conhecimento,ajuda,saberusar,curso,acesso,costumeredes,frequencia,apreTrabalho,trabalho,assistiuaulas,aula,moodle,onde,estudaU,testudo,facilidadeAprender,freqComputador,acessoInternet,tipoInternet,freqInternet,smartphone,jogar,freqJogar,prefJogos,costumaTv,asstv,tecAjuda,tecProporciona,usoEscola,tecAtualidade) VALUES ('$idade','$estadocivil','$formacao','$area','$moradia','$conhecimento','$ajuda','$saberusar','$curso','$acesso','$costumeredes','$frequencia','$apreTrabalho','$trabalho','$assistiuaulas','$aula','$moodle','$onde','$estudaU','$testudo','$facilidadeAprender','$freqComputador','$acessoInternet','$tipoInternet','$freqInternet','$smartphone','$jogar','$freqJogar','$prefJogos','$costumaTv','$asstv','$tecAjuda','$tecProporciona','$usoEscola','$tecAtualidade')") or die(mysql_error());             
     
  if($query2){
        echo"<script language='javascript' type='text/javascript'>alert('Obrigado! Iremos redirecioná-lo para a última parte do questionário');window.location.href='questionario2.php'</script>";
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
    <div style="margin-left:auto;margin-right:auto;text-align:auto;">
    <form action="" method="post" class="form">
    <h2 style="text-align:center">Questionário</h2> <br /><br />
<br />
<div class = "content"> 

<!-- Aqui ficará os valores para a idade -->
<h3>Qual é sua idade?<br /> <br />
  <select name="idade">
       <option value="">Selecione sua resposta</option>
      <option value="crianca">Menor que 18 anos</option>
      <option value="jovem">Entre 18 e 29 anos</option>
      <option value="adulto">Entre 30 e 49 anos</option>
      <option value="idoso">Maior que 50 anos</option>
    </select> <br /><br />

 <!-- Aqui os valores para estado civil -->
 Qual é o seu estado civil?<br /> <br />
  <select name="estadocivil">
       <option value="">Selecione sua resposta</option>
      <option value="solteiro">Solteiro(a)</option>
      <option value="casado">Casado(a)</option>
      <option value="separado">Separado(a)</option>
      <option value="viuvo">Viúvo(a)</option>
     
    </select><br /> <br />

 <!-- Aqui os valores para formação -->
 Qual é a sua formação?<br /> <br />
  <select name="formacao">
       <option value="">Selecione sua resposta</option>
      <option value="EF">Ensino Fundamental</option>
      <option value="EM">Ensino Médio</option>
      <option value="ES">Ensino Superior</option>
      <option value="PG">Pós Graduado</option>
     
    </select><br /> <br />

  Se com Ensino Superior Completo. Qual área?<br /><br />
  <select name="area">
       <option value="">Selecione sua resposta</option>
      <option value="CH">Ciências Humanas e Socias</option>
      <option value="CE">Ciências Exatas</option>
      <option value="CB">Ciências Biológicas</option>
     
    </select><br /> <br />



  <!-- Aqui os valores para moradia -->
 Com quem mora? <br /><br />
  <select name="moradia">
     <option value="">Selecione sua resposta</option>
      <option value="sozinho">Sozinho</option>
      <option value="familia">Família</option>
      <option value="esposo">Esposo(a)</option>
      <option value="outros">Outros</option>
     
    </select><br /> <br />

    <!-- Aqui os valores para familia com conhecimento -->
 As pessoas com quem mora, tem conhecimento de como usar um computador? <br /><br />
  <select name="conhecimento">
     <option value="">Selecione sua resposta</option>
      <option value="familiaN">Não</option>
      <option value="familiaS">Sim</option>

  </select><br /><br />   

      <!-- Aqui os valores se recebe ajuda da familia-->
 Você pede ajuda a elas?<br /><br />
  <select name="ajuda">
     <option value="">Selecione sua resposta</option>
      <option value="ajudaN">Não</option>
      <option value="ajudaS">Sim</option>

  </select><br /><br />  

      <!-- Aqui os valores se saber usar um computador -->
 Você sabe usar um computador? <br /><br />
  <select name="saberusar">
     <option value="">Selecione sua resposta</option>
      <option value="saberN">Não</option>
      <option value="saberS">Sim</option>

  </select><br /><br />   

      <!-- Aqui os valores para se fez curso de computador-->
 Fez algum curso de computador?<br /><br />
  <select name="curso">
     <option value="">Selecione sua resposta</option>
      <option value="cursoN">Não</option>
      <option value="cursoS">Sim</option>

  </select><br /><br />    


      <!-- Aqui os valores para acessos de varios dispositivos -->
 Você tem costume de acessar mais de um dispositivo com internet? <br /><br />
  <select name="acesso">
     <option value="">Selecione sua resposta</option>
      <option value="acessoN">Não</option>
      <option value="acessoS">Sim</option>

  </select><br /><br />   


    <!-- Aqui os valores para acessos a rede sociais -->
 Você tem costume de acessar as redes sociais? <br /><br />
  <select name="costumeredes">
     <option value="">Selecione sua resposta</option>
      <option value="costumeN">Não</option>
      <option value="costumeS">Sim</option>

  </select><br /><br />

      <!-- Aqui os valores para frequencia de acesso a rede social -->
 Com que frequência? <br /><br />
  <select name="frequencia">
     <option value="">Selecione sua resposta</option>
      <option value="Nuso">Não uso redes sociais</option>
      <option value="Tdias">Acesso todos os dias</option>
      <option value="Sdias">Acesso semanalmente</option>
      <option value="Rdias">Acesso raramente</option>

  </select><br /><br />

      <!-- Aqui os valores para se apresentou trabalho usando computador -->
 Ja apresentou trabalhos usando o computador? <br /><br />
  <select name="apreTrabalho">
     <option value="">Selecione sua resposta</option>
      <option value="apresentouN">Não</option>
      <option value="apresentouS">Sim</option>

  </select><br /><br />

 <!-- Aqui os valores para se apresentou trabalho usando computador -->
  Se apresentou. Qual foi o tipo de trabalho?<br /><br />
  <input type="text" id="trabalho" name="trabalho"></input><br /><br />

  
  <!-- Aqui os valores para se assistiu aula com lsides -->
 Já assistiu aulas com slides? <br /><br />
  <select name="assistiuaulas">
     <option value="">Selecione sua resposta</option>
      <option value="assistiuN">Não</option>
      <option value="assistiuS">Sim</option>

  </select><br /><br />

  <!-- Aqui os valores para tipo de aula -->
  Se assitiu. Qual foi o tipo de aula?<br /><br />
  <input type="text" id="aula" name="aula"></input><br /><br />

 <!-- Aqui os valores para se conhece moodle-->
 <strong>Conhece e ja usou o Moodle?</strong> <br /><br />
  <select name="moodle">
     <option value="">Selecione sua resposta</option>
      <option value="moodleN">Não</option>
      <option value="moodleS">Sim</option>

  </select><br /><br />

   <!-- Aqui os valores para onde conhece moodle-->
 Onde? <br /><br />
  <select name="onde">
     <option value="">Selecione sua resposta</option>
      <option value="Nconheco">Não conheço Moodle</option>
      <option value="Econheco">Na escola</option>
      <option value="Fconheco">Na faculdade</option>
      <option value="Aconheco">Através de amigos</option>
      <option value="Oconheco">Outros meios</option>

  </select><br /><br />

  <!-- Aqui os valores para estuda usando computador -->
 Estuda usando o computador? <br /><br />
  <select name="estudaU">
     <option value="">Selecione sua resposta</option>
      <option value="estudaN">Não</option>
      <option value="estudaS">Sim</option>

  </select><br /><br />

<!-- Aqui os valores para estuda usando computador -->
 Se sim, que tipo de estudo? <br /><br />
  <select name="testudo">
     <option value="">Selecione sua resposta</option>
      <option value="Eescola">Para a escola</option>
      <option value="Fescola">Para a faculdade</option>
      <option value="Cescola">Para concursos</option>
      <option value="Oescola">Outros</option>
  </select><br /><br />
<p class="submit">

    <!-- Aqui os valores para facilidade de aprender -->
 Tem facilidade de aprender vendo ou escrevendo? <br /><br />
  <select name="facilidadeAprender">
      <option value="">Selecione sua resposta</option>
      <option value="NSaprender">Não sei</option>
      <option value="Vaprender">Vendo</option>
      <option value="Eaprender">Escrevendo</option>


  </select><br /><br />

          <!-- Aqui os valores para frequencia de uso do computador -->
 Qual a sua frequência de uso de um computador? <br /><br />
  <select name="freqComputador">
     <option value="">Selecione sua resposta</option>
      <option value="Nuso">Não uso computador</option>
      <option value="Tdias">Acesso todos os dias</option>
      <option value="Sdias">Acesso semanalmente</option>
      <option value="Rdias">Acesso raramente</option>

  </select><br /><br />

    <!-- Aqui os valores para tem acesso a internet em casa -->
 Tem acesso a internet em casa? <br /><br />
  <select name="acessoInternet">
     <option value="">Selecione sua resposta</option>
      <option value="acessoN">Não</option>
      <option value="acessoS">Sim</option>

  </select><br /><br />

    <!-- Aqui os valores para que tipo de acesso -->
 Que tipo de acesso? <br /><br />
  <select name="tipoInternet">
     <option value="">Selecione sua resposta</option>
      <option value="acessoNS">Não sei</option>
      <option value="acessoD">Acesso discado</option>
      <option value="acessoBL">Internet Banda Larga</option>
      <option value="acessoVR">Internet Via Rádio</option>
      <option value="acessoFO">Internet Fíbra Ótica</option>

  </select><br /><br />

          <!-- Aqui os valores para frequencia de acesso a internet pelo smartphones-->
 Qual a sua frequência de acesso a internet? <br /><br />
  <select name="freqInternet">
     <option value="">Selecione sua resposta</option>
      <option value="Nuso">Não uso internet</option>
      <option value="Tdias">Acesso todos os dias</option>
      <option value="Sdias">Acesso semanalmente</option>
      <option value="Rdias">Acesso raramente</option>

  </select><br /><br />

      <!-- Aqui os valores para utiliza smartphones -->
 Utiliza smartphones? <br /><br />
  <select name="smartphone">
     <option value="">Selecione sua resposta</option>
      <option value="smartN">Não</option>
      <option value="smartS">Sim</option>
  </select><br /><br />

 <!-- Aqui os valores para jogar video-game ou jogos de computador -->
 Gosta de jogar video-game ou jogos de computador? <br /><br />
  <select name="jogar">
     <option value="">Selecione sua resposta</option>
      <option value="jogarN">Não</option>
      <option value="jogarS">Sim</option>
  </select><br /><br />

          <!-- Aqui os valores para frequencia joga games-->
 Com que frequência? <br /><br />
 <select name="freqJogar">
   <option value="">Selecione sua resposta</option>
      <option value="Nuso">Não uso jogos</option>
      <option value="Tdias">Jogo todos os dias</option>
      <option value="Sdias">Jogo semanalmente</option>
      <option value="Rdias">Jogo raramente</option>

  </select><br /><br />

          <!-- Aqui os valores para preferncia de jogo-->
Qual a sua preferencia de tipo de jogos?<br /><br />
  <select name="prefJogos">
     <option value="">Selecione sua resposta</option>
      <option value="ac">Ação/Tiro</option>
      <option value="av">Aventura</option>
      <option value="ar">Arcade</option>
      <option value="cor">Corrida</option>
      <option value="esp">Esportes</option>
      <option value="est">Estratégia</option>
      <option value="luta">Luta</option>
      <option value="rpg">RPG</option>
      <option value="sim">Simulação</option>
      <option value="out">Outros</option>

  </select><br /><br />

            <!-- Aqui os valores para quanto tempo assisti tv-->
 Quanto tempo costuma assistir a TV ao dia? <br /><br />
  <select name="costumaTv">
     <option value="">Selecione sua resposta</option>
      <option value="Ntv">Não assisto TV</option>
      <option value="1tv">Até 1 hora</option>
      <option value="15tv">Entre 1 e 5 horas</option>
      <option value="5tv">Mais que 5 horas</option>

  </select><br /><br />

   <!-- Aqui os valores para possui tv por assinatura-->
 Tem acesso a TV por assinatura? <br /><br />
  <select name="asstv">
     <option value="">Selecione sua resposta</option>
      <option value="tvN">Não</option>
      <option value="tvS">Sim</option>
  </select><br /><br />

   <!-- Aqui os valores para tecnologia ajuda a aprender-->
 Acha que o uso de tecnologia ajuda a aprender?<br /><br />
  <select name="tecAjuda">
     <option value="">Selecione sua resposta</option>
      <option value="tecAjudaN">Não</option>
      <option value="tecAjudaS">Sim</option>
  </select><br /><br />

              <!-- Aqui os valores para o tipo de aprendizado que o uso da tecnologia proporciona-->
 Qual o nível de aprendizado o uso da tecnologia proporciona? <br /><br />
  <select name="tecProporciona">
     <option value="">Selecione sua resposta</option>
      <option value="nenhum">Nenhum</option>
      <option value="ruim">Ruim</option>
      <option value="bom">Bom</option>
      <option value="medio">Médio</option>
      <option value="otimo">Ótimo</option>

  </select><br /><br />

    <!-- Aqui os valores para computadores na escola seja essencial-->
 Você acha que o uso de computadores na escola seja essencial? <br /><br />
  <select name="usoEscola">
     <option value="">Selecione sua resposta</option>
      <option value="usoescolaN">Não</option>
      <option value="usoescolaS">Sim</option>
  </select><br /><br />

              <!-- Aqui os valores para opniao sobre a tecnologia na atualidade-->
 Qual sua opinião sobre a tecnologia na atualidade? </h3><br />
  <select name="tecAtualidade">
     <option value="">Selecione sua resposta</option>
      <option value="ruim">Ruim</option>
      <option value="bom">Bom</option>
      <option value="medio">Médio</option>
      <option value="otimo">Ótimo</option>

  </select><br /><br /><br /><br />

<p class= "submit">
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