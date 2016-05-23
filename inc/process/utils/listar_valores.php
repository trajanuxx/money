<?php

//error_reporting(0);
$local_sis=$_SERVER[PHP_SELF];
$local_sis = explode("/",$local_sis);
include $_SERVER[DOCUMENT_ROOT].$local_sis[1].'/inc/data/mysql.php';
include $_SERVER[DOCUMENT_ROOT].$local_sis[1].'/inc/data/geral.php';




$mes = "";
$item = "";
$consulta = "";
$parametro = Array("","","","","","","","","","");



foreach ($_REQUEST as $nome_campo => $valor) {
    if ($nome_campo == "mes") {
        $mes = $valor;
    }
    if ($nome_campo == "ano") {
        $ano = $valor;
    }
    if ($nome_campo == "acao") {
        $item = $valor;
    }
    if ($nome_campo == "consulta") {
        $consulta = $valor;
    }
    if ($nome_campo == "parametro") {
        $parametro = explode(",",$valor);
    }
 
}
if(!(isset($_REQUEST["consulta"])||$consulta != "")){
  echo '[]';
  return;
}

include_once $_SERVER[DOCUMENT_ROOT].$local_sis[1].'/inc/data/consultas.php';

$generico = new Geral();


if (isset($_REQUEST["consulta"])) {
    eval('$array=$generico->retornarConsultaJson(' . $consulta . ');');
} else {
    eval('$array=$generico->retornarConsultaJson("$consulta");');
}
 
echo $array;


?>

