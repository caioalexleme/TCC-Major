<?php
session_start();
include "conexao.php";

empty($_SESSION['id_login']);
//$_SESSION['id_login'];

$cep=$_POST["cep"];
$rua=$_POST["rua"];
$num=$_POST["num"];
$bairro=$_POST["bairro"];
$cidade=$_POST["cidade"];
$estado=$_POST["estado"];
$complemento=$_POST["complemento"];
$pgto=$_POST["pgto"];
if(isset ($_POST["id_login"])){$id_login=$_POST["id_login"];}


    try
    {
        $Comando=$conexao->prepare("insert into endereco (cep, rua, num, bairro, cidade, uf, complemento, id_login) values (?,?,?,?,?,?,?,?)");
        $Comando->bindParam(1, $cep);
        $Comando->bindParam(2, $rua);
        $Comando->bindParam(3, $num);
        $Comando->bindParam(4, $bairro);
        $Comando->bindParam(5, $cidade);
        $Comando->bindParam(6, $estado);
        $Comando->bindParam(7, $complemento);
        $Comando->bindParam(8, $id_login);

        if($Comando->execute())
        {
            if($Comando->rowCount()>0)
            {
                echo "<script> alert('Seu endereco foi adicionado !!!')</script>";
                echo ('<meta http-equiv="refresh"content=0;"carrinho.php">');
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