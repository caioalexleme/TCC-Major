<html lang="pt-br">
    <head>
    <meta charset="utf-8">
    <title>Registros - Empresa</title>

    <link rel="stylesheet" type="text/css" href="estilo.css">

    </head>

    <body>
        <div id="menu">
            <center><div <a href="index.html"><img src="imagens/logoex.png" width="240" height="80"></a></div><br>
            <a id="pag" href="home.html">Voltar</a></center>
        </div>
    </body>
</html>

<?php

echo '<link rel="stylesheet" type="text/css" href="estilophp.css">';

echo '<body>';

include "conexao.php";

    try
    {
        $Comando=$conexao->prepare("SELECT * FROM registre_empresa");

        if($Comando->execute())
        {
            echo '<center>';
            echo '<div id=tab>';
            echo '<table border=1>';
            echo '<th> CNPJ </th>';
            echo '<th> Nome </th>';
            echo '<th> Telefone </th>';
            echo '<th> E-mail / Usuário </th>';

            while ($linha=$Comando->fetch(PDO::FETCH_OBJ))
            { 
                echo '<tr>';
                    echo '<td>'.$linha->CNPJ.'</td>';
                    echo '<td>'.$linha->nome.'</td>';
                    echo '<td>'.$linha->telefone.'</td>';
                    echo '<td>'.$linha->email.'</td>'; //tr = linha
                echo '</tr>';
            }
            echo '</table>';
            echo '</div>';
            echo '</center>';
        }
        else
        {
            echo "<script>alert('Não foi possível completar a consulta!')</script>";
            echo ('<meta http-equiv="refresh"content=0;"home.html">');
        }
    }
    catch (PDOException $erro)
    {
        echo "Erro:".$erro->getMessage();
    }
    echo '</body>';
?>

<html>
            <center><a id="pag" href="home.html">Voltar</a></center>
            <br>
</html>