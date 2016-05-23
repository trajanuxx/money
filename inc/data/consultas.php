<?php
date_default_timezone_set("America/Sao_Paulo");
//error_reporting(0);

if (!isset($_SESSION)) {
  session_start();
}
if(!isset($mes)){
   $mes = date("m");  
}
if(!isset($ano)){
   $ano = date("Y");  
}
if(!isset($parametro)){
   $parametro = Array("","","","","","","","","","");  
}



// FINANCEIRO ///////////////

define("LISTAR_CATEGORIAS","  (SELECT * FROM tipo  order by tipo desc,descricao )");
define("LISTAR_VALORES","SELECT * FROM tarefas where ano =trim('".$parametro[0]."') and tipo =trim('".$parametro[1] ."')");
define("LISTAR_VALORES_DETALHES","SELECT id,data, Item, tiporegistro ,valor FROM tarefas where ano =trim('".$parametro[0]."') and mes=trim('".$parametro[1] ."') and tipo =trim('".$parametro[2] ."')");
define("LISTAR_REGRAS","SELECT tp.id,tp.descricao as regra, t.descricao as categoria, case when t.tipo =1 then 'Entrada' else 'Saida' end as tipo FROM tipo_palavras tp 
                        left join tipo t on t.id = tp.tipo
                        order by t.descricao, tp.descricao ");
define("LISTAR_CATEGORIAS_DETALHES","SELECT id, descricao ,case when tipo =1 then 'Entrada' else 'Saida' end as tipo FROM `tipo` order by tipo");
define("LISTAR_ANOS_DISPONIVEIS","SELECT  distinct ano as id, ano as valor FROM `tarefas` where ano <>0 order by ano desc");