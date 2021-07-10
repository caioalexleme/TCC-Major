<html lang="pt-br">
    <head>
    <meta charset="utf-8">
    <title>Vendas</title>

    <link rel="stylesheet" type="text/css" href="estilo.css">

    </head>

    <body>
        <div id="menu">
            <center><div <a href="index.html"><img src="imagens/logoex.png" width="240" height="80"></a></div><br>
            <a id="pag" href="home.html">Voltar</a></center>
        </div>
    </body>
</html>

<?php

echo '<link rel="stylesheet" type="text/css" href="estilophp.css">';

echo '<body>';

include "conexao.php";

    try
    {
        $Comando=$conexao->prepare("select * from login inner join pedido_venda on login.id_login = pedido_venda.id_login");

        $Comando->execute();

            while ($linha=$Comando->fetch(PDO::FETCH_OBJ))
            {
                echo '<center>';
                echo '<div id=bloco>';
                echo 'Usuário: '.$linha->email.'<br>';
                echo 'Data da Compra: '.$linha->data_ped_venda.'<br>'; 
                echo 'Valor da Compra: '.$linha->valor_ped_venda.'<br>';
                //$_SESSION['id_login'] = $linha->id_login;
                //$_SESSION["email"] = $linha->email;
                echo '</div>';
                echo '</center>';
            } 
    }
    catch (PDOException $erro)
    {
        echo "Erro:".$erro->getMessage();
    }
?>

<html>
            <center><a id="pag" href="home.html">Voltar</a></center>
            <br>
</html>



