<?php
if (!isset($_SESSION)) {
  session_start();
}
require_once $_SERVER[DOCUMENT_ROOT].'money/config.php';
require_once $_SERVER[DOCUMENT_ROOT].'money/inc/data/mysql.php';
require_once $_SERVER[DOCUMENT_ROOT].'money/inc/data/geral.php';

$geral = new Geral();
$usuario = $geral->listar('usuario', 'id,nome,grupo,login', 'upper(login)=upper("' . addslashes($_REQUEST["usuario"]) . '") and senha= md5("' . addslashes($_REQUEST["senha"]) . '") and status<>0', 'nome');

if (count($usuario) === 1){
			$_SESSION['login'] = $usuario[0]['usuario']['login'];
			$_SESSION['nome'] = $usuario[0]['usuario']['nome'];
		  $_SESSION['id_usuario'] = $usuario[0]['usuario']['id'];	
			header("Location: index.php "); 
	
}else{   
      header("Location: login.php");
} 