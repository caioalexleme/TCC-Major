


<?php 
	echo '<link rel="stylesheet" type="text/css" href="estilocar.css">';

	echo '<body>';

	session_start();
	require_once "product.php";
	require_once "cart.php";

	$pdoConnection = require_once "connection.php";

	if(!empty($_SESSION['id_login']))
	{
		echo '<div id=msgtopo>';
		echo "Olá  " .$_SESSION['email']. ",  Bem Vindo!<br>";
		echo "<a href='sair.php'>Sair</a>";
		echo '<htmL>
		<div id="menu">
		<div id="categoria">
		  <ul id="menu_categoria">
			<li><a href="servicos.php">Voltar para Serviços</a></li>
		  </ul>
		</div>
		</div>
		</html>';
		echo '</div>';
	}

	if(isset($_GET['acao']) && in_array($_GET['acao'], array('add', 'del', 'up'))) {
		
		if($_GET['acao'] == 'add' && isset($_GET['id_prod']) && preg_match("/^[0-9]+$/", $_GET['id_prod'])){ 
			addCart($_GET['id_prod'], 1);			
		}
		else
		if($_GET['acao'] == 'add' && isset($_GET['id_pacote']) && preg_match("/^[0-9]+$/", $_GET['id_pacote'])){ 
			addCart($_GET['id_pacote'], 1);			
		}

		if($_GET['acao'] == 'del' && isset($_GET['id']) && preg_match("/^[0-9]+$/", $_GET['id'])){ 
			deleteCart($_GET['id']);
		}
		else
		if($_GET['acao'] == 'del' && isset($_GET['id']) && preg_match("/^[0-9]+$/", $_GET['id'])){ 
			deleteCart($_GET['id']);
		}

		if($_GET['acao'] == 'up'){ 
			if(isset($_POST['prod']) && is_array($_POST['prod'])){ 
				foreach($_POST['prod'] as $id => $qtd){
						updateCart($id, $qtd);
				}
			}
		} 
		header('location: carrinho.php');
	}

	$resultsCarts = getContentCart($pdoConnection);
	$totalCarts  = getTotalCart($pdoConnection);
	echo '</body>';
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Carrinho</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" />
	<script type="text/javascript" src="Jquery/jquery-3.1.0.min.js"></script>
	<script type="text/javascript" src="Jquery/jquery.mask.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="estilocar.css">

</head>
<body>


	<div class="container">
		<div class="card mt-5">
			 <div class="card-body">
	    		<center><h3 class="card-title">Carrinho</h3</center>
	    		
	    	</div>
		</div>

		<?php if($resultsCarts) : ?>
			<form id="form" action="carrinho.php?acao=up" method="post">
			<table class="table table-strip">
				<thead>
					<tr>
						<th>Produto</th>
						<th>Quantidade</th>
						<th>Preço</th>
						<th>Subtotal</th>
						<th>Ação</th>

					</tr>				
				</thead>
				<tbody>
				  <?php foreach($resultsCarts as $result) : ?>
					<tr>
						
						<td><?php echo $result['name']?></td>
						<td>
							<input type="text" name="prod[<?php echo $result['id']?>]" value="<?php echo $result['quantity']?>" size="1" />
														
							</td>
						<td>R$<?php echo number_format($result['price'], 2, ',', '.')?></td>
						<td>R$<?php echo number_format($result['subtotal'], 2, ',', '.')?></td>
						<td><a href="carrinho.php?acao=del&id=<?php echo $result['id']?>" class="btn btn-danger">Remover</a></td>
						
					</tr>
				<?php endforeach;?>
				 <tr>
				 	<td colspan="3" class="text-right"><b>Total: </b></td>
				 	<td>R$<?php echo number_format($totalCarts, 2, ',', '.')?></td>
				 	<td></td>
				 </tr>
				</tbody>
				
			</table>
			<div id="btncar">
			<a class="btn btn-info link" href="indexCarrinho.php">Adicionar Mais Produtos</a>
			<button class="btn btn-info link" type="submit">Atualizar Carrinho</button>
			<a class="btn btn-danger" href="finaliza.php?fim=som" class="card-link">Finalizar Compra </a>
				  </div>
			</form>	

	<?php endif?>
		
	</div>

	    
    <form>
        <fieldset>
		<h3>Adicione seu Endereco</h3><br>
        <label for="cep">Cep</label> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
        <input name="cep" type="text" id="cep" value="" size="10" maxlength="9" /><br />
        <label for="rua">Rua</label> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
        <input name="rua" type="text" id="rua" size="40" />,<input name="num" type="text" id="numero" size="5" required /><br />
        <label for="bairro">Bairro</label> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp
        <input name="bairro" type="text" id="bairro" size="40" /><br />
        <label for="cidade">Cidade</label> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp&nbsp&nbsp
        <input name="cidade" type="text" id="cidade" size="40" />-<input name="estado" type="text" id="estado" size="2" /><br />
        <label for="complemento">Complemento</label> &nbsp &nbsp
		<input name="complemento" type="text" id="complemento" size="40" /><br />
		<label for="pagamento"> Pagamento</label> &nbsp &nbsp &nbsp &nbsp
		<input name="pgto" type="radio" value="Boleto"/> Boleto<br>
		<input id="btn" name="salvar" type="submit" value="Salvar"><br>
        </fieldset><br>
	<
    </body>

    <script>
        $(document).ready(function () {
        $("#cep").mask("99999-999");

            var rua = $("#rua");
            var bairro = $("#bairro");
            var cidade = $("#cidade");
            var estado = $("#estado");

            function limpar() {
                rua.val("");
                bairro.val("");
                cidade.val("");
                estado.val("");
            }

            // Ao sair do campo de cep efetua a consulta no web service
            $("#cep").blur(function () {

                var cep = $(this).val().replace(/\D/g, ''); // remove o que nao é numero

                if (cep != "") {

                    var validacep = /^[0-9]{8}$/; // utilizando expressão regular

                    // Verifica se o cep esta no formato correto
                    if (validacep.test(cep)) {

                       rua.val("aguarde ...");
                        bairro.val("aguarde ...");
                        cidade.val("aguarde ...");
                        estado.val("aguarde ...");

                        $.getJSON("http://cep.republicavirtual.com.br/web_cep.php?cep="+ cep +"&formato=json", 
                        function (dados) {

                            if (dados.resultado ==  "1") {
                                rua.val(dados.logradouro);
                                bairro.val(dados.bairro);
                                cidade.val(dados.cidade);
                                estado.val(dados.uf);
                            } 
                            else {
                                limpar();
                                alert("O CEP "+ cep +" não foi encontrado.");
                            }
                        });
                    } 
                    else {
                        limpar();
                        alert("CEP inválido.");
                    }
                } 
                else {
                    limpar();
                }
            });
        });
    
        
	</script>
	
</body>
</html>