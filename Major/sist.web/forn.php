<html lang="pt-br">
    <head>
    <meta charset="utf-8">
    <title>Fornecedores - Consulta</title>

    <link rel="stylesheet" type="text/css" href="estilo.css">

    </head>

    <body>
        <div id="menu">
            <center><div <a href="index.html"><img src="imagens/logoex.png" width="240" height="80"></a></div><br>
            <a id="pag" href="Produto.html">Voltar Produtos</a>
            <a id="pag" href="Pacote.html">Voltar Pacotes</a>
            <a id="pag" href="Fornecedores.html">Voltar Fornecedores</a>
            </center>
        </div>
    </body>
</html>

<?php

echo '<link rel="stylesheet" type="text/css" href="estilophp.css">';

echo '<body>';

include "conexao.php";

    try
    {
        $Comando=$conexao->prepare("SELECT * FROM fornecedor");

    if($Comando->execute())
    {
        while ($linha=$Comando->fetch(PDO::FETCH_OBJ))
        {
            echo '<div id=bloco>';
            echo '<h3><i>'.$linha->nome_forn.'</i></h3>';
            echo 'Identificação do Fornecedor : '.$linha->id_forn.'<br>';
            echo 'Razão Social da Empresa: '.$linha->razao_social.'<br>';
            echo 'Telefone: '.$linha->telefone.'<br>';
            echo 'CNPJ do fornecedor: '.$linha->nome_forn.' = '.$linha->cnpj.'<br>';
            echo 'E-mail '.$linha->email.'<br><br>';
            echo '</div>';
        }
    }
    else
    {
        echo "<script>alert('Não foi possível completar a consulta!')</script>";
        echo ('<meta http-equiv="refresh"content=0;"fornecedores.html">');
    }
    }
    catch (PDOException $erro)
    {
        echo "Erro:".$erro->getMessage();
    }
    echo '</body>';
?>

<html>
    <center>
        <a id="pag" href="Produto.html">Voltar Produtos</a>
        <a id="pag" href="Pacote.html">Voltar Pacotes</a>
        <a id="pag" href="Fornecedores.html">Voltar Fornecedores</a>
    </center>
</html>