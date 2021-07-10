<?php

include "conexao.php";

$id_contato=$_POST['id_contato'];

//Exclusão de contato enviado -------------------------------------------
    try
    {
        $comando=$conexao->prepare("DELETE FROM contato where id_contato=?");
        $comando->bindParam(1, $id_contato);

        if($comando->execute())
        {
            if($comando->rowCount()>0)
            {
                echo "<script> alert('Exclusão efetuada com sucesso !!!')</script>";
                echo ('<meta http-equiv="refresh"content=0;"excluir_contato">');
            }
            else
            {
                echo "<script> alert('Erro ao tentar efetivar cadastro!!!')</script>";
                echo ('<meta http-equiv="refresh"content=0;"excluir_contato">');
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