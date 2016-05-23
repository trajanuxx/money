<?php
include "../../data/mysql.php";
include "../../data/geral.php";
 

  $generico = new Geral();

 //zerando todos os registros
  $data = array (
			    'tipo'=> '0'
		    );

	$generico->updatedir($data,"tarefas", "1=1");

 //Incluindo Nova categorizaçao

  $itens = $generico->listar("tipo_palavras","descricao,tipo","1=1", "descricao");
  foreach($itens as $key ){
        $data = array (
			    'tipo'=> $key["tipo_palavras"]["tipo"]
		    );
	     $generico->updatedir($data,"tarefas", "upper(item) like upper('%".$key["tipo_palavras"]["descricao"]."%')");
	}


$itens = $generico->listar("tipo_tarefas","id,tipo","1=1", "tipo");


 foreach($itens as $key ){
       $data = array (
			  'tipo'=> $key["tipo_tarefas"]["tipo"]
	    	);
	 
	 echo var_dump($data);
	     $generico->updatedir($data,"tarefas", "id ='".$key["tipo_tarefas"]["id"]."'");
	}
	
	



?>