<?php

include "conexao.php";

$nome=$_POST["nome"];
$email=$_POST["email"];
$telefone=$_POST["telefone"];
$assunto=$_POST["assunto"];
$observacoes=$_POST["observacoes"];


    try
    {
        $comando=$conexao->prepare("INSERT INTO contato (nome, email, telefone, assunto, observacoes) VALUES (?,?,?,?,?)");
        $comando->bindParam(1, $nome);
        $comando->bindParam(2, $email);
        $comando->bindParam(3, $telefone);
        $comando->bindParam(4, $assunto);
        $comando->bindParam(5, $observacoes);

        if($comando->execute())
        {
            if($comando->rowCount()>0)
            {
                echo "<script> alert('Informações enviadas / Aguarde retorno!!!')</script>";
                echo ('<meta http-equiv="refresh"content=0;"contato.html">');
            }
            else
            {
                echo "Erro ao tentar efetivar cadastro";
            }
        }
        else
        {
            throw new PDOException("Erro:Não foi possivel executar sql");
        }
    }
    catch (PDOException $erro)
    {
        echo "Erro:".$erro->getMessage();
    }
    ?>