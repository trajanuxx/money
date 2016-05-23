<?php



$local_sis=$_SERVER[PHP_SELF];
$local_sis = explode("/",$local_sis);
include $_SERVER[DOCUMENT_ROOT].$local_sis[1].'/inc/data/mysql.php';
include $_SERVER[DOCUMENT_ROOT].$local_sis[1].'/inc/data/geral.php';

$generico = new Geral();
$tabela=$_REQUEST['tabela'];
$id=$_REQUEST['item'];
echo $generico->deletar($tabela, $id);

?>