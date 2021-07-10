

<?php 	
	require_once "product.php";
	$pdoConnection = require_once "connection.php";
    $linha = getProducts($pdoConnection);
    $linhap = getPacote($pdoConnection);

	

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Carrinho de Compras</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" />

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
	integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>

<div id="cliente">

    <ul id="menu_cliente">
      <li><a href="carrinho.html"> <img src="imagens/carr.png"></a></li>
    </ul>
  </div>

<div id="menu">
<div id="img"><a href="index.html"><img src="imagens/logoex.png" width="300" height="100"></a></div>
<div id="categoria">
  <ul id="menu_categoria">
	<li><a href="servicos.php">Voltar para Serviços</a></li>
  </ul>
</div>
</div>
<br>

    <center><h1> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp PRODUTOS</h1><br></center>
	<div class="container">
		<div class="row">
			<?php foreach($linha as $product) : ?>
				<div class="col-4">
					<div class="card">
						<div class="card-body">
                             <h4 class="card-title"><img src="imagens/" <?php echo $product['img']?>width=60 height=40</h4> 
							 <h4 class="card-title"><?php echo $product['desc_prod']?></h4> 
							 <h6 class="card-subtitle mb-2 text-muted">
							  	R$<?php echo number_format($product['valor'], 2, ',', '.')//php site?>
							 </h6>

							 <a class="btn btn-danger" href="carrinho.php?acao=add&id_prod=<?php echo $product['id_prod']?>" class="card-link">COMPRAR</a>
						</div>
					</div>
				</div>

			<?php endforeach;?>
		</div>
	</div><br><br>

    <center> <h1>PACOTES<h1></center>
	<div class="container">
		<div class="row">
			<?php foreach($linhap as $product) : ?>
				<div class="col-4">
					<div class="card">
						<div class="card-body">
						<h4 class="card-title"><img src="imagens/" <?php echo $product['img']?>width=60 height=40</h4> 
							 <h4 class="card-title"><?php echo $product['desc_pacote']?></h4>
							 <h6 class="card-subtitle mb-2 text-muted">
							  	R$<?php echo number_format($product['valor'], 2, ',', '.')//php site?>
							 </h6>

							 <a class="btn btn-danger" href="carrinho.php?acao=add&id_pacote=<?php echo $product['id_pacote']?>" class="card-link">CONTRATAR</a>
						</div>
					</div>
				</div>

			<?php endforeach;?>
		</div>
	</div> <br> <br>
</body>
</html>