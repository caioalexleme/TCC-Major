<html lang="pt-br">
    <head>
    <meta charset="utf-8">
    <title>Produtos - Consulta</title>

    <link rel="stylesheet" type="text/css" href="estilo.css">

    </head>

    <body>
        <div id="menu">
            <center><div <a href="index.html"><img src="imagens/logoex.png" width="240" height="80"></a></div><br>
            <a id="pag" href="produto.html">Voltar</a></center>
        </div>
    </body>
</html>

<?php

echo '<link rel="stylesheet" type="text/css" href="estilophp.css">';

echo '<body>';

header("Content-type: text/html; charset=utf-8");

include "conexao.php";

if(isset ($_POST["desc_prod"])){$desc_prod=$_POST["desc_prod"];}
if(isset ($_POST["valor"])){$valor=$_POST["valor"];}
if(isset ($_POST["id_forn"])){$id_forn=$_POST["id_forn"];}
if(isset ($_POST["botao"])){$botao=$_POST["botao"];}

$ArquivoAtual = $_FILES['img']['name'];
$ArquivoTmp   = $_FILES['img']['tmp_name'];
$Destino = 'Imagens/'.$ArquivoAtual;

//ADICIONAR PRODUTO-----------------------------------------------

if($botao == 'Adicionar')
{
    move_uploaded_file($ArquivoTmp, $Destino);

    try
    {
        $Comando=$conexao->prepare("insert into produto (desc_prod, valor, img, id_forn) values (?,?,?,?)");
        $Comando->bindParam(1, $desc_prod);
        $Comando->bindParam(2, $valor);
        $Comando->bindParam(3, $ArquivoAtual);
        $Comando->bindParam(4, $id_forn);

        if($Comando->execute())
        {
            if($Comando->rowCount()>0)
            {
                echo "<script> alert('Produto cadastrado com sucesso !!!')</script>";
                echo ('<meta http-equiv="refresh"content=0;"produto.html">');
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


if ($botao == "Excluir")
{
    try
    {   
        $Comando=$conexao->prepare("delete from produto where desc_prod=?");
        $Comando->bindParam(1, $desc_prod);

        if($Comando->execute())
        {
            if($Comando->rowCount()>0)
            {
                echo "<script> alert('Exclusão efetuada com sucesso !!!')</script>";
                echo ('<meta http-equiv="refresh"content=0;"produto.html">');
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

if ($botao == "Consultar")
{
    try
    {
        if ($desc_prod == '')
        {
            $Comando=$conexao->prepare("select * from produto inner join fornecedor on produto.id_forn = fornecedor.id_forn");

            $Comando->execute();

            while ($linha=$Comando->fetch(PDO::FETCH_OBJ))
            {
                echo '<div id=bloco>';
                echo 'Produto : '.$linha->desc_prod.'<br>';
                echo 'Valor : '.$linha->valor.'<br>';
                echo 'Imagem : '.$linha->img.'<br>';
                echo '<img src="Imagens/' . $linha->img.'" width="250px" height="250px">'.'<br><br>';
                echo 'Fornecedor : '.$linha->id_forn.' - '.$linha->nome_forn.'<br>';
                echo '</div>';
            }
        }
        else
        {
            $Comando= $conexao->prepare("select * from produto inner join fornecedor on produto.id_forn = fornecedor.id_forn where desc_prod = ?");
            $Comando->bindParam(1, $desc_prod);
        

            if($Comando->execute())
            {
                while ($linha=$Comando->fetch(PDO::FETCH_OBJ))
                {
                ?>

                    <!-- ====INICIO DO FORMULARIO EM HTML ========== -->
                    <form id="bloco" action="produto.php" method="POST" name="prod" enctype="multipart/form-data">
                    <label>Produto<label> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                    <input type="text" name="desc_prod" value="<?php echo $linha->desc_prod ?>" /><br>

                    <label>Valor<label> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                    <input type="number" name="valor" value="<?php echo $linha->valor ?>" /><br><br>

                    <label>Imagem<label> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                    <input type="file" name="img" value="<?php echo $linha->img ?>" /><br>
                    <?php echo 'Imagem:   	' . $linha->img   	  . '<br>'; 
                    echo '<img src="Imagens/' . $linha->img.'" width="200px" height="200px">'?><br><br>

                    <label>Ident. fornecedor<label> &nbsp &nbsp &nbsp
                    <input type="text" name="id_forn" value="<?php echo $linha->id_forn ?>" /><br>
                    <?php echo 'Dados Fornecedor: '.$linha->id_forn. ' - ' .$linha->nome_forn ?><br><br>

                    <input id="btn" type="Submit" name="botao" value="Incluir" />
                    <input id="btn" type="Submit" name="botao" value="Excluir" />
                    <input id="btn" type="Submit" name="botao" value="Consultar" />
                    <input id="btn" type="Submit" name="botao" value="Alterar" />
        
                    <br>
                    </form>
                    <!-- ====FIM DO FORMULÁRIO ========== -->

                    <?php
                }
            }
            else
            {
                echo "<script> alert('Erro ao tentar efetivar consulta !!!')</script>";
                echo ('<meta http-equiv="refresh"content=0;"produto.html">');  
            }
        }
    }
    catch (PDOException $erro)
    {
        echo "Erro:".$erro->getMessage();
    }
}

if($botao == 'Alterar')
{
    move_uploaded_file($ArquivoTmp, $Destino);

    try
    {
        $Comando=$conexao->prepare("update produto set valor=?, img=?, id_forn=? where desc_prod=?");
        $Comando->bindParam(1, $valor);
        $Comando->bindParam(2, $ArquivoAtual);
        $Comando->bindParam(3, $id_forn);
        $Comando->bindParam(4, $desc_prod);

        if($Comando->execute())
        {
            if($Comando->rowCount()>0)
            {
                echo "<script> alert('Alteração efetuada com sucesso !!!')</script>";
                echo ('<meta http-equiv="refresh"content=0;"produto.html">');
            }
            else
            {
                echo "<script> alert('Erro ao efetivar Alteração !!!')</script>";
                echo ('<meta http-equiv="refresh"content=0;"produto.html">');
            }
        }
        else
        {
            throw new PDOException("Erro: Não foi possivel executar sql");
        }
    }
    catch (PDOException $erro)
    {
        echo "Erro:".$erro->getMessage();
    }
}
echo '</body>';
?>

<html>
    <body>
        <form>
<center><a id="pag" href="produto.html">Voltar</a></center>
</form>
</body>
</html>