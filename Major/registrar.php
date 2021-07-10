<?php

include "conexao.php";
//CADASTRAR LOGIN

$nome=$_POST["nome"];
$perfil=$_POST["perfil"];
$CNPJ=$_POST["CNPJ"];
$telefone=$_POST["telefone"];
$email=$_POST["email"];
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
$conf_senha = filter_input(INPUT_POST, 'conf_senha', FILTER_SANITIZE_STRING);

if($senha == $conf_senha)
{
    if ($perfil == 'cnpj')
    {
        try
        {
            $senhaSegura = password_hash($senha, PASSWORD_DEFAULT);
            $confSegura = password_hash($conf_senha, PASSWORD_DEFAULT);

            $comando=$conexao->prepare("INSERT INTO registre_empresa (nome, CNPJ, telefone, email, senha, conf_senha) VALUES (?,?,?,?,?,?)");
            $comando->bindParam(1, $nome);
            $comando->bindParam(2, $CNPJ);
            $comando->bindParam(3, $telefone);
            $comando->bindParam(4, $email);
            $comando->bindParam(5, $senhaSegura);
            $comando->bindParam(6, $confSegura);

            if($comando->execute())
            {

                if($comando->rowCount()>0)
                {

                    $comando=$conexao->prepare("insert into login (email, senha) VALUES (?,?)");
                    $comando->bindParam(1, $email);
                    $comando->bindParam(2, $senhaSegura);

                    $comando->execute();
            
                    echo "<script> alert('Cadastro / Login cadastrado !!!')</script>";
                    echo ('<meta http-equiv="refresh"content=0;"entrar.html">');
                }
                else
                {
                    echo "<script> alert('Erro ao efetivar o cadastro!!!')</script>";
                    echo ('<meta http-equiv="refresh"content=0;"registrar.html">');
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
            $senhaSegura = password_hash($senha, PASSWORD_DEFAULT);
            $confSegura = password_hash($conf_senha, PASSWORD_DEFAULT);

            $comando=$conexao->prepare("INSERT INTO registre_pessoa (nome, CPF, telefone, email, senha, conf_senha) VALUES (?,?,?,?,?,?)");
            $comando->bindParam(1, $nome);
            $comando->bindParam(2, $CNPJ);
            $comando->bindParam(3, $telefone);
            $comando->bindParam(4, $email);
            $comando->bindParam(5, $senhaSegura);
            $comando->bindParam(6, $confSegura);

            if($comando->execute())
            {

                if($comando->rowCount()>0)
                {

                    $comando=$conexao->prepare("insert into login (email, senha) VALUES (?,?)");
                    $comando->bindParam(1, $email);
                    $comando->bindParam(2, $senhaSegura);

                    $comando->execute();
            
                    echo "<script> alert('Cadastro / Login cadastrado !!!')</script>";
                    echo ('<meta http-equiv="refresh"content=0;"entrar.html">');
                }
                else
                {
                    echo "<script> alert('Erro ao efetivar o cadastro!!!')</script>";
                    echo ('<meta http-equiv="refresh"content=0;"registrar.html">');
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
        echo ('<meta http-equiv="refresh"content=0;"registrar.html">');
    }
}
else
{
    echo "<script> alert('Senhas não conferem!!!')</script>";
    echo ('<meta http-equiv="refresh"content=0;"registrar.html">');
}
?>