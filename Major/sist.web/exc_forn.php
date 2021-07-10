<?php
session_start();

include "conexao.php";

if(isset ($_POST["razao_social"])){$razao_social=$_POST["razao_social"];}
if(isset ($_POST["nome_forn"])){$nome_forn=$_POST["nome_forn"];}
if(isset ($_POST["telefone"])){$telefone=$_POST["telefone"];}
if(isset ($_POST["cnpj"])){$cnpj=$_POST["cnpj"];}
if(isset ($_POST["email"])){$email=$_POST["email"];}

//Exclusão de Fornecedores -------------------------------------------

    try
    {
        $Comando=$conexao->prepare("DELETE FROM Fornecedor where cnpj = ?");
        $Comando->bindParam(1, $cnpj);

        $Comando->execute();

        if ($Comando->rowCount() > 0)
        {
            $RetornoJSON = "Exclusão efetuada com sucesso!";
        }
        else
        {
            $RetornoJSON = "Não foi possível executar o comando SQL";
        }
    }
    catch (PDOException $erro)
    {
        $RetornoJSON = "Erro: " .$erro->getMessage();
    }

    echo $RetornoJSON;
?>