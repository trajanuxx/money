<?php
//error_reporting(0);

$local_sis=$_SERVER[PHP_SELF];
$local_sis = explode("/",$local_sis);
include $_SERVER[DOCUMENT_ROOT].$local_sis[1].'/inc/data/mysql.php';
include $_SERVER[DOCUMENT_ROOT].$local_sis[1].'/inc/data/geral.php';
 

//if(!(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')) {
//	 	header("Location: ../../login.php");		 
//}

	

$tabela = "";
$colunas = "*";
$start = "0";
$icones = "0";
$codicoes = "1";
$iconini = "";
$comtitulo = true;
$order = "1";
$limit = "1000000";

foreach ($_REQUEST as $nome_campo => $valor) {
	if ($nome_campo == "ent") {
		$table = $valor;
	}
	if ($nome_campo == "col") {
		$colunas = $valor;

	}
	if ($nome_campo == "order") {
		$order = $valor;
	}
	if ($nome_campo == "limit") {
		$limit = $valor;
	}
	if ($nome_campo == "condicoes") {
		
		$codicoes = str_replace("!", "=", $valor);
		$codicoes = str_replace("^", " and ", $codicoes);
		$codicoes = str_replace("~", " like ", $codicoes);
		$codicoes = str_replace("-", " <> ", $codicoes);
		$codicoes = str_replace(".", "'", $codicoes);
		$codicoes = str_replace("||", " or ", $codicoes);
		$codicoes = str_replace("*", ".", $codicoes);
		$codicoes = str_replace("@", "%", $codicoes);
	
		
	}

};

$array = array (
			'table' => $table,
			'fields' => $colunas,
			'condition' => $codicoes,
			'order' => $order,
			'limit' => $limit
		);
//echo var_dump($array);

$generico = new Geral();

$array = $generico->retornarConsultaJson($array);

echo $array;


?>

