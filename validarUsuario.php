<?php
session_start();

if (isset($_POST["usuario"])){
	$_SESSION['usuario'] = $_POST["usuario"];
}
if (isset($_POST["senha"])){
	$_SESSION['senha'] = $_POST["senha"];
}

if (isset($_GET["usuario"])){
	$_SESSION['usuario'] = $_GET["usuario"];
}
if (isset($_GET["senha"])){
	$_SESSION['senha'] = $_GET["senha"];
}

if(($_SESSION['usuario']=="trajanux")||($_SESSION['senha']=="18maioneast")){
	
	header("Location: /dinheiro "); 
	
}else{
	header("Location: http://trajanux.com.br/dinheiro/#paginas/login.php"); 
}

?>