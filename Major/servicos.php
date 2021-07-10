<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

     <title>Major Segurança Eletrônica</title>
     <link rel="stylesheet" type="text/css" href="estilo.css">
      
   
  </head>
  <body>

    <div id="cliente">

        <ul id="menu_cliente">
          <li><a href="entrar.html">Entrar</a></li>
          <li><a href="registrar.html">Registrar</a></li>
          <li><a href="carrinho.php"> <img src="imagens/carr.png"></a></li>
        </ul>

    </div>
    
  
    <div id="menu">
      
      <div id="img"><a href="index.html"><img src="imagens/logoex.png" width="300" height="100"></a></div>
      
      <div id="categoria">

        <ul id="menu_categoria">

          <li><a href="index.html">Início</a></li>
          <li><a href="empresa.html">Empresa</a></li>
          <li><a href="servicos.html">Serviços</a></li>
          <li><a href="clientes.html">Clientes</a></li>
          <li><a href="contato.html">Contato</a></li>

        </ul>

      </div>

    </div>

    <?php
session_start();
if(!empty($_SESSION['id_login']))
{
	echo "Olá  " .$_SESSION['email']. ",  Bem Vindo!<br>";
    echo "<a href='sair.php'>Sair</a>";
}
?>

    <br><br>
<br>

<div class="navlist">
  <div id="back">
<ul>
  <li><a href="#">Pacotes</a>
    
  <ul>
  <form name="produtos" action="indexCarrinho.php" method="POST">
  <li><img src="imagens/pacoteserv.jpg" width="32.1%" height="100%" ></li>
  <li><img src="imagens/pacote1serv.jpg" width="32.1%" height="100%"></li>
  <li><img src="imagens/pacote2serv.jpg" width="32.1%" height="100%"></li>
    <input type="submit" value="CONTRATAR" id="pacoteserv">
    <input type="submit" value="CONTRATAR" id="pacote1serv">
    <input type="submit" value="CONTRATAR" id="pacote2serv"></ul></li>

  <li><a href="#">Produtos</a>
  <ul>
    <form name="produtos" action="indexCarrinho.php" method="POST">
    <li><img src="imagens/interna.jpg" height="330" width="18.7%"></li>
    <li><img src="imagens/externa.jpg" height="330" width="18.7%"></li>
    <li><img src="imagens/dome.jpg" height="330" width="18.7%"></li>
    <li><img src="imagens/minidome.jpg" height="330" width="18.7%"></li>
    <li><img src="imagens/ip.jpg" height="330" width="18.7%"></li>
    <input type="submit" value="COMPRAR" id="interna">
    <input type="submit" value="COMPRAR" id="externa">
    <input type="submit" value="COMPRAR" id="dome">
    <input type="submit" value="COMPRAR" id="minidome">
    <input type="submit" value="COMPRAR" id="ip">
    </form>
  </ul></li>

  <li><a href="#" >Manutenção</a>

    <ul><li><select name="perfil" id="perfil">
      <option value="selecione">Selecione seu perfil!</option>
      <option value="cpf">CPF</option>
    <option value="cnpj">CNPJ</option></select></li><br>
    <form name="manutencao" id="manutencao" action="manutencao.php" method="POST">
      <li><input type="text" name="nome_empresa" id="nomeempresa" placeholder="Nome/Razão social" required></li><br>
      <li><input type="text" name="cnpj" id="cnpj" placeholder="CPF/CNPJ" required></li><br>
      <li><input type="text" name="email" id="email" placeholder="E-mail" required></li><br>
      <li><input type="text" name="telefone" id="telefone" width="100%" placeholder="telefone" required></li><br>
      <li><textarea name="descricao" id="tipo" width="100%" placeholder="Descreva a não conformidade..."  required></textarea></li>
      <input type="submit" value="Enviar" name="enviarmanu" id="enviarmanu"></form></ul></li>
      
  <li><a href="#" >Monitoramento</a>
  <ul><li><a href="http://192.168.0.101:80/" target="_blank"><input type="submit" value="Monitorar" name="monitorar" id="monitorar"></a></li></ul>
  </li>
</ul>
</div>
</div>

<br><br><br><br><br><br>   

<div id="rodape">

    <ul>
  
      <li><a href="https://www.facebook.com" target="_blank"><img src="imagens/facebook.png"></a></li>
      <li><a href="https://www.instagram.com" target="_blank"><img src="imagens/instagram.png"></a></li>
      <li><a href="https://www.youtube.com" target="_blank"><img src="imagens/youtube.png"></a></li>
      <li><a href="https://www.whatsapp.com" target="_blank"><img src="imagens/whatsapp.png"></a></li>
  
    </ul>
        <div id="end">
           <img src="imagens/loc.png"> Av.Pereira Barreto, 400 - Baeta Neves<br>
                                       majorse@hotmail.com<br>
                                       Fone: (11) 4362-9700     Whatsapp: (11)9 7211-5907  
        </div>
    
    <div id="Copyright"><p>Copyright 2020 Major Segurança Eletrônica. All rights reserved.</p></div>
  
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
