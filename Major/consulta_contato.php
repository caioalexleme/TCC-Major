<?php

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
                echo 'Nome: '.$linha->nome.'<br>';
                echo 'E-mail: '.$linha->email.'<br>';
                echo 'Telefone: '.$linha->telefone.'<br>';
                echo 'Assunto: '.$linha->assunto.'<br>';
                echo 'Observações: '.$linha->observacoes.'<br>';
                echo '================================================================='.'<br><br>';
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
                echo 'Pesquisa realizada sobre o assunto: '.'<h4>'.$linha->assunto.'</h4><br>';
                echo 'Nome: '.$linha->nome.'<br>';
                echo 'E-mail: '.$linha->email.'<br>';
                echo 'Telefone: '.$linha->telefone.'<br>';
                echo 'Assunto: '.$linha->assunto.'<br>';
                echo 'Observações: '.$linha->observacoes.'<br>';
                echo '================================================================='.'<br><br>';
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
?>

    