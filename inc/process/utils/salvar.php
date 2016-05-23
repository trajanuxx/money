<?php
$local_sis=$_SERVER[PHP_SELF];
$local_sis = explode("/",$local_sis);
include $_SERVER[DOCUMENT_ROOT].$local_sis[1].'/inc/data/mysql.php';
include $_SERVER[DOCUMENT_ROOT].$local_sis[1].'/inc/data/geral.php';

$generico = new Geral();

 $id="";
 $tabela="";
 
 if (isset($_POST['tabela'])) {
    $tabela = $_POST['tabela'];
	
}
if (isset($_POST['id'])) {
    $id = $_POST['id'];
	
}

$comando= '$data = array(';
foreach($_POST as $nome_campo => $valor){	   
			if ($nome_campo <> "PHPSESSID" &&  $nome_campo <> "tabela" && $nome_campo <> "__utma" && $nome_campo <> "__utmz" && $nome_campo <>"__utmb" && $nome_campo <>"__utmc" && $nome_campo <> "__utmt"){
		  	 $comando = $comando. "'".$nome_campo . "'=>'" . $valor . "',";		
}		   
	    };
$comando=$comando. ');';	
$comando=str_replace("',)", "')", $comando);
eval($comando);	



	 $generico->insert($data,$tabela);

     echo mysql_insert_id($generico->conexao->con);	




?>