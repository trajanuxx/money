<?php
require_once $_SERVER[DOCUMENT_ROOT].'money/config.php';
require_once $_SERVER[DOCUMENT_ROOT].'money/inc/data/mysql.php';
require_once $_SERVER[DOCUMENT_ROOT].'money/inc/data/geral.php';

if (!isset($_SESSION)) {
  session_start();
}


date_default_timezone_set("America/Sao_Paulo");
$generico = new Geral();

$nome_final = $_SESSION["id_usuario"].'_'.strtolower(str_replace(' ', '', date('dmYHis') . $_FILES['file']['name']));

$arquivo = preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities(trim($nome_final)));


move_uploaded_file($_FILES['file']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/money/arquivos/' . $arquivo);


?>
