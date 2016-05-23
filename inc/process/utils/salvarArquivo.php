<?php
include '../data/mysql.php';
include '../data/geral.php';
date_default_timezone_set("America/Sao_Paulo");
$generico = new Geral();

$nome_final = strtolower(str_replace(' ', '', date('dmYHis') . $_FILES['file']['name']));
$arquivo = preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities(trim($nome_final)));

$tabela = $_GET['tabela'];
$id = $_GET['id'];
$colatual= $_GET['colatual'];


$data = array('nome' => $arquivo);

$generico -> insert($data, 'Arquivos');
$Arquivo = $generico -> conexao -> ultimo('Arquivos');

$data = array($colatual => $Arquivo[0]['Arquivos']['id']);

$generico -> atualizar($data, $tabela, $id);

move_uploaded_file($_FILES['file']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/sis_arquivosCliente/' . $arquivo);

echo '../sis_arquivosCliente/' . $arquivo;
?>