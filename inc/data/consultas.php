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
define("LISTAR_VALORES","SELECT ta.*, ti.descricao FROM tarefas ta left join tipo ti on ta.tipo = ti.id where ta.ano =trim('".$parametro[0]."') and ta.tipo =trim('".$parametro[1] ."')");
define("LISTAR_VALORES_ANO","SELECT sum(ta.valor) as total, ta.tipo, ta.mes, ta.ano, t.descricao from tarefas ta
                             left join tipo t on t.id=ta.tipo 
                             where ano = '".$parametro[0]."'
                             group by tipo, ano, mes");

define("LISTAR_VALORES_ANO_DETALHES","select 
                                       descricao,
                                       (select sum(valor) from tarefas where mes ='01' and tipo =T.id and   ano = '".$parametro[0]."') as '1',
                                       (select sum(valor) from tarefas where mes ='02' and tipo =T.id and   ano = '".$parametro[0]."' ) as '2',
                                       (select sum(valor) from tarefas where mes ='03' and tipo =T.id and   ano = '".$parametro[0]."') as '3',
                                       (select sum(valor) from tarefas where mes ='04' and tipo =T.id and   ano = '".$parametro[0]."') as '4', 
                                       (select sum(valor) from tarefas where mes ='05' and tipo =T.id and   ano = '".$parametro[0]."') as '5',
                                       (select sum(valor) from tarefas where mes ='06' and tipo =T.id and   ano = '".$parametro[0]."') as '6',
                                       (select sum(valor) from tarefas where mes ='07' and tipo =T.id and   ano = '".$parametro[0]."') as '7',
                                       (select sum(valor) from tarefas where mes ='08' and tipo =T.id and   ano = '".$parametro[0]."') as '8',
                                       (select sum(valor) from tarefas where mes ='09' and tipo =T.id and   ano = '".$parametro[0]."') as '9' ,
                                       (select sum(valor) from tarefas where mes ='10' and tipo =T.id and   ano = '".$parametro[0]."') as '10',
                                       (select sum(valor) from tarefas where mes ='11' and tipo =T.id and   ano = '".$parametro[0]."') as '11',
                                       (select sum(valor) from tarefas where mes ='12' and tipo =T.id and   ano = '".$parametro[0]."') as '12'
                                       from tipo as T
                                      group by T.id");

define("LISTAR_VALORES_DETALHES","SELECT id,data, Item, tiporegistro ,valor FROM tarefas where ano =trim('".$parametro[0]."') and mes=trim('".$parametro[1] ."') and tipo =trim('".$parametro[2] ."')");
define("LISTAR_REGRAS","SELECT tp.id,tp.descricao as regra, t.descricao as categoria, case when t.tipo =1 then 'Entrada' else 'Saida' end as tipo FROM tipo_palavras tp 
                        left join tipo t on t.id = tp.tipo
                        order by t.descricao, tp.descricao ");
define("LISTAR_CATEGORIAS_DETALHES","SELECT id, descricao ,case when tipo =1 then 'Entrada' else 'Saida' end as tipo FROM `tipo` order by tipo");
define("LISTAR_ANOS_DISPONIVEIS","SELECT  distinct ano as id, ano as valor FROM `tarefas` where ano <>0 order by ano desc");