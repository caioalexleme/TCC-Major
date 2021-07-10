<?php

include "conexao.php";
//MANUTENCAO PARA EMPRESAS

$nome_empresa=$_POST["nome_empresa"];
$cnpj=$_POST["cnpj"];
$email=$_POST["email"];
$telefone=$_POST["telefone"];
$descricao=$_POST["descricao"];
$perfil=$_POST["perfil"];

if ($perfil == 'cnpj')
{
    try
    {
        $comando=$conexao->prepare("INSERT INTO manutencao_empresa (nome_empresa, cnpj, email, telefone, descricao) VALUES (?,?,?,?,?)");
        $comando->bindParam(1, $nome_empresa);
        $comando->bindParam(2, $cnpj);
        $comando->bindParam(3, $email);
        $comando->bindParam(4, $telefone);
        $comando->bindParam(5, $descricao);

    if($comando->execute())
    {
        if($comando->rowCount()>0)
        {
            echo "<script> alert('Sua solicitação foi enviada com sucesso !!!')</script>";
            echo ('<meta http-equiv="refresh"content=0;"servicos.html">');
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
}

else 
if ($perfil == 'cpf')
{
    try
    {
        $comando=$conexao->prepare("INSERT INTO manutencao_pessoa (nome_pessoa, cpf, email, telefone, descricao) VALUES (?,?,?,?,?)");
        $comando->bindParam(1, $nome_empresa);
        $comando->bindParam(2, $cnpj);
        $comando->bindParam(3, $email);
        $comando->bindParam(4, $telefone);
        $comando->bindParam(5, $descricao);

    if($comando->execute())
    {
        if($comando->rowCount()>0)
        {
            echo "<script> alert('Sua solicitação foi enviada com sucesso !!!')</script>";
            echo ('<meta http-equiv="refresh"content=0;"servicos.html">');
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
}

else
{
    echo "<script> alert('Selecione o perfil !!!')</script>";
    echo ('<meta http-equiv="refresh"content=0;"servicos.html">');
}
?>