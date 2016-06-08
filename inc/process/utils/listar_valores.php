<?php

require_once $_SERVER[DOCUMENT_ROOT].'money/config.php';
require_once $_SERVER[DOCUMENT_ROOT].'money/inc/data/mysql.php';
require_once $_SERVER[DOCUMENT_ROOT].'money/inc/data/geral.php';



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
require_once $_SERVER[DOCUMENT_ROOT].'/money/inc/data/consultas.php';
$generico = new Geral();


if (isset($_REQUEST["consulta"])) {
    eval('$array=$generico->retornarConsultaJson(' . $consulta . ');');
} else {
    eval('$array=$generico->retornarConsultaJson("$consulta");');
}
 
echo $array;


?>

