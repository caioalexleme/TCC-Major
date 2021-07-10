<?php
session_start();

include "conexao.php";

if(isset ($_POST["razao_social"])){$razao_social=$_POST["razao_social"];}
if(isset ($_POST["nome_forn"])){$nome_forn=$_POST["nome_forn"];}
if(isset ($_POST["telefone"])){$telefone=$_POST["telefone"];}
if(isset ($_POST["cnpj"])){$cnpj=$_POST["cnpj"];}
if(isset ($_POST["email"])){$email=$_POST["email"];}


//Consulta de Fornecedores -------------------------------------------
    try
    {
        $Comando=$conexao->prepare("SELECT * FROM Fornecedor where cnpj = ?");
        $Comando->bindParam(1, $cnpj);

        $Comando->execute();
        $Forn = $Comando->fetchAll();

        $RetornoJSON = json_encode($Forn);
        echo $RetornoJSON;
    }

    catch (PDOException $erro)
    {
        $RetornoJSON = "Erro: " .$erro->getMessage();
    }
?>