
        <?php
session_start();
if(!empty($_SESSION['id']))
{
	echo "Olá  " .$_SESSION['nome']. ",  Bem Vindo!<br>";
}
?>
