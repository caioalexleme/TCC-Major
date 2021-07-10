<html lang="pt-br">
    <head>
    <meta charset="utf-8">
    <title>Manutenção - Empresa</title>

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
        $Comando=$conexao->prepare("SELECT * FROM manutencao_empresa");

        if($Comando->execute())
        {
            while ($linha=$Comando->fetch(PDO::FETCH_OBJ))
            {
                echo '<div id=bloco>';
                echo 'Empresa: '.$linha->nome_empresa.'<br>';
                echo 'CNPJ: '.$linha->cnpj.'<br>';
                echo 'E-mail: '.$linha->email.'<br>';
                echo 'Telefone: '.$linha->telefone.'<br>';
                echo 'Não conformidade do cliente: '.'<br>'.$linha->descricao.'<br>';
                echo '</div>';
            }
        }
        else
        {
            echo "<script>alert('Não foi possível completar a consulta!')</script>";
            echo ('<meta http-equiv="refresh"content=0;"home.html">');
        }
    }
    catch (PDOException $erro)
    {
        echo "Erro:".$erro->getMessage();
    }
    echo '</body>';
?>

<html>
            <center><a id="pag" href="home.html">Voltar</a></center>
            <br>
</html>