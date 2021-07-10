<html lang="pt-br">
    <head>
    <meta charset="utf-8">
    <title>Contatos - Consulta</title>

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
include "conexao.php";

if(isset ($_POST["consulta"])){$consulta=$_POST["consulta"];}
if(isset ($_POST["select"])){$select=$_POST["select"];}

//comando de bloco-------------------------------
if ($consulta == "op1")
{
    try
    {
        $comando=$conexao->prepare("SELECT * FROM contato");

        if($comando->execute())
        {
            while ($linha=$comando->fetch(PDO::FETCH_OBJ))
            {
                echo '<div id=bloco>';
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
            echo ('<meta http-equiv="refresh"content=0;"mensagens.html">');  
        }
    }
    catch (PDOException $erro)
    {
        echo "Erro:".$erro->getMessage();
    }
}
else
if ($consulta == "op2")
{
    try
    {
        if ($select == 'Solicitar')
        {
            $comando=$conexao->prepare("SELECT * FROM contato where assunto = 'Solicitar_Orcamento'");
            $comando->bindParam(1, $assunto);
        }
        else
        if ($select == 'Fornecedores')
        {
            $comando=$conexao->prepare("SELECT * FROM contato where assunto = 'fornecedores'");
            $comando->bindParam(1, $assunto);
        }
        else
        {
            echo "<script>alert('Selecione algum item para a sua pesquisa!')</script>";
            echo ('<meta http-equiv="refresh"content=0;"mensagens.html">');    
        }

        if ($comando->execute())
        {
            while ($linha=$comando->fetch(PDO::FETCH_OBJ))
            {
                echo '<div id=bloco>';
                echo 'Pesquisa realizada sobre o assunto: '.'<h4>'.$linha->assunto.'</h4><br>';
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
            echo ('<meta http-equiv="refresh"content=0;"mensagens.html">');
        }
    }
    catch (PDOException $erro)
    {
        echo "Erro:".$erro->getMessage();
    }
}
else
{
    echo "<script>alert('Nenhum item inserido para pesquisa!!')</script>";
    echo ('<meta http-equiv="refresh"content=0;"mensagens.html">');
    
}
echo '</body>';
?>

<html>
            <center><a id="pag" href="mensagens.html">Voltar</a></center>
            <br>
</html>

    