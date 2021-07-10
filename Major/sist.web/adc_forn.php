<?php
session_start();

include "conexao.php";

if(isset ($_POST["razao_social"])){$razao_social=$_POST["razao_social"];}
if(isset ($_POST["nome_forn"])){$nome_forn=$_POST["nome_forn"];}
if(isset ($_POST["telefone"])){$telefone=$_POST["telefone"];}
if(isset ($_POST["cnpj"])){$cnpj=$_POST["cnpj"];}
if(isset ($_POST["email"])){$email=$_POST["email"];}

//----------Adicionar Fornecedores------------

    try
    {
        $Comando=$conexao->prepare("INSERT INTO fornecedor (razao_social, nome_forn, telefone, cnpj, email) values (?,?,?,?,?)");
        $Comando->bindParam(1, $razao_social);
        $Comando->bindParam(2, $nome_forn);
        $Comando->bindParam(3, $telefone);
        $Comando->bindParam(4, $cnpj);
        $Comando->bindParam(5, $email);

        $Comando->execute();

        if ($Comando->rowCount() > 0)
        {
            $razao_social = null;
            $nome_forn = null;
            $telefone = null;
            $cnpj = null;
            $email = null;

            $RetornoJSON = "Fornecedor adicionado com sucesso!";
        }
        else
        {
            $RetornoJSON = "Erro ao tentar efetivar o cadastro";
        }
    }
    catch (PDOException $erro)
    {
        $RetornoJSON = "Erro: " .$erro->getMessage();
    }

    echo $RetornoJSON;
?>