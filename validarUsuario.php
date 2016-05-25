<?php
session_start();

require_once $_SERVER[DOCUMENT_ROOT].'money/config.php';


if (isset($_REQUEST["usuario"])){
	$_SESSION['usuario'] = $_REQUEST["usuario"];
}
if (isset($_REQUEST["senha"])){
	$_SESSION['senha'] = $_REQUEST["senha"];
}



if(($_SESSION['usuario']==USER)&&($_SESSION['senha']==PASSWORD)){
	
	header("Location: index.php "); 
	
}else{
	header("Location: login.php"); 
}

?>