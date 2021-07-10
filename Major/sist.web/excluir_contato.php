<html lang="pt-br">
    <head>
    <meta charset="utf-8">
    <title>Excluir Contato</title>

    <link rel="stylesheet" type="text/css" href="estilo.css">

    </head>

    <body>
        <div id="menu">
            <center><div <a href="index.html"><img src="imagens/logoex.png" width="240" height="80"></a></div><br>
            <a id="pag" href="mensagens.html">Voltar</a></center>
        </div>
    </body>
</html>

<?php

echo '<link rel="stylesheet" type="text/css" href="estilophp.css">';

echo '<body>';

include "conexao.php";?>
    <div id="form">
        <form id="excluir_contato" action="excluir.php" method="POST">
            <label>Identificação para exclusão</label>&nbsp
            <input type="text" name="id_contato" id="id_contato">
            <input id="btn" type="submit" name="excluir" id="excluir" value="Excluir">&nbsp &nbsp 
        </form>
    </div>
<?php
 try
    {
        $comando=$conexao->prepare("SELECT * FROM contato");

        if($comando->execute())
        {

            while ($linha=$comando->fetch(PDO::FETCH_OBJ))
            {
                echo '<div id=bloco>';
                echo 'Identificação: '.$linha->id_contato.'<br>';
                echo 'Nome: '.$linha->nome.'<br>';
                echo 'E-mail: '.$linha->email.'<br>';
                echo 'Telefone: '.$linha->telefone.'<br>';
                echo 'Assunto: '.$linha->assunto.'<br>';
                echo 'Observações: '.$linha->observacoes.'<br>';
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
            <center><a id="pag" href="mensagens.html">Voltar</a></center>
            <br>
</html>

