<?php
require_once $_SERVER[DOCUMENT_ROOT].'money/config.php';
require_once $_SERVER[DOCUMENT_ROOT].'money/inc/data/mysql.php';
require_once $_SERVER[DOCUMENT_ROOT].'money/inc/data/geral.php';

$generico = new Geral();
$tabela=$_REQUEST['tabela'];
$id=$_REQUEST['item'];
echo $generico->deletar($tabela, $id);

?>