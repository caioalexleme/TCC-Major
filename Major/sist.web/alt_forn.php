<?php
session_start();

include "conexao.php";

if(isset ($_POST["razao_social"])){$razao_social=$_POST["razao_social"];}
if(isset ($_POST["nome_forn"])){$nome_forn=$_POST["nome_forn"];}
if(isset ($_POST["telefone"])){$telefone=$_POST["telefone"];}
if(isset ($_POST["cnpj"])){$cnpj=$_POST["cnpj"];}
if(isset ($_POST["email"])){$email=$_POST["email"];}

//Alterar cadastro do Fornecedor -------------------------------------------

    try
    {
        $Comando=$conexao->prepare("UPDATE fornecedor SET razao_social=?, nome_forn=?, telefone=?, email=? WHERE cnpj=?");
        $Comando->bindParam(1, $razao_social);
        $Comando->bindParam(2, $nome_forn);
        $Comando->bindParam(3, $telefone);
        $Comando->bindParam(4, $email);
        $Comando->bindParam(5, $cnpj);

        $Comando->execute();

        if($Comando->rowCount()>0)
        {
            $RetornoJSON = "Alteração efetuada com sucesso!";
        }
        else
        {
            $RetornoJSON = "Não foi possível executar o comando SQL";
        }
    }
    catch (PDOException $erro)
    {
        echo "Erro:".$erro->getMessage();
    }

    echo $RetornoJSON;
?>