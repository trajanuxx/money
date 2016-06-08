<?php

require_once $_SERVER[DOCUMENT_ROOT].'money/config.php';
require_once $_SERVER[DOCUMENT_ROOT].'money/inc/data/mysql.php';
require_once $_SERVER[DOCUMENT_ROOT].'money/inc/data/geral.php';
if (!isset($_SESSION)) {
  session_start();
}

$path = $_SERVER['DOCUMENT_ROOT'] . 'money/arquivos/';
$diretorio = dir($path);
  while($arquivo = $diretorio -> read()){
	   if(($arquivo<>"undefined")&&($arquivo<>"..")&&($arquivo<>".")){
					echo "processando arquivo ".$arquivo." ...<br>";	
				//	$item = explode("_",$arquivo);
				//	if ($item[0]==$_SESSION["id_usuario"]){
						processarArquivo($path."/".$arquivo);
				//	}	 			
       }  
 echo $arquivo." processado...<br>";	   
	  
   
   } 
   
function removerAcentos ($texto){
    $array1 = array( "á", "à", "â", "ã", "ä", "é", "è", "ê", "ë", "í", "ì", "î", "ï", "ó", "ò", "ô", "õ", "ö", "ú", "ù", "û", "ü", "ç"
    , "Á", "À", "Â", "Ã", "Ä", "É", "È", "Ê", "Ë", "Í", "Ì", "Î", "Ï", "Ó", "Ò", "Ô", "Õ", "Ö", "Ú", "Ù", "Û", "Ü", "Ç" );
    $array2 = array( "a", "a", "a", "a", "a", "e", "e", "e", "e", "i", "i", "i", "i", "o", "o", "o", "o", "o", "u", "u", "u", "u", "c"
    , "A", "A", "A", "A", "A", "E", "E", "E", "E", "I", "I", "I", "I", "O", "O", "O", "O", "O", "U", "U", "U", "U", "C" );
    return str_replace( $array1, $array2, $texto); 
}
   
function processarArquivo($arquivo) {  
	$data = file_get_contents($arquivo);
	
	$generico = new Geral();
	
	foreach (getValores($data) as $value) {
	try{

		$item = array (
				"item" => getDescricao($value),
				"data" => getData($value),
				"mes" =>  getMes($value),
				"ano" =>  getAno($value),
				"valor"=> getValor($value),
				"id"=>  md5(getValor($value).getData($value)."-".getId($value).getBanco($value)),
			  "banco"=> getBanco($data),
			  "agenciacontacartao"=>getAgenciaContaCartao($data),
			  "tiporegistro"=>getCartao($data),
			  "identificacao"=>getId($value),
			  "usuario"=>$_SESSION["id_usuario"],
			
		);
               // echo 'id--->';
               // echo getId($value);
		
	        echo $generico->conexao->insert("tarefas",$item);
		




		
	}catch (Exception $e) {}
	}
}

function getCartao($value){
	if(strchr($value,"CREDITCARDMSGSRSV1")){
		return "Cartão de Crédito"; // cartão de credito
	}
	else{
		return "Débito em Conta"; // cartão de debito
	}
}

function getBanco($value){
        $value = removerAcentos($value);
    	$a = remover($value);
        $b = remover($value);
        
        $b = split("<BANKID>",$b);
	$b =$b[1];
        $b = split("<BRANCHID>",$b);
        $b = trim(str_replace("</BANKID>", "", $b[0]));
        
        
        
        $b = split("<ACCTID>",$b);
        $b = trim(str_replace("</BANKID>", "", $b[0]));
        
        $a = split("<ORG>",$a);
	$a =$a[1];
	$a = split("<FID>",$a);
	$a = trim(str_replace("</ORG>", "", $a[0]));
        return $b." - ".$a;
}

function getAgenciaContaCartao($value){
	$agencia ="";
	$conta_cartao="";

	
		$a = split("<BRANCHID>",remover($value));
		$a =$a[1];
		$a = split("<ACCTID>",$a);
		$agencia = trim(str_replace("</BRANCHID>", "", $a[0]));
	
		$a = split("<ACCTID>",remover($value));
		$a = split("</ACCTID>",$a[1]);
		$a = split("<ACCTTYPE>",$a[0]);
		$conta_cartao = trim(str_replace("</ACCTID>", "", $a[0]));
	
	return $agencia."#".$conta_cartao;
	
	
}
function getContaCartao($value){
	$a = remover($value);
	$a = split("<ACCTID>",$a);
	$a =$a[1];
	$a = split("</ACCTID>",$a);
	echo $a[0];
}

function getMes($value){
	
	if(getCartao($value)=="Cartão de Crédito"){
			$a = remover($value);
			$a = split("<DTASOF>",$a);
			$a =$a[1];
			$a = split("</DTASOF>",$a);
		  $a =  $a[0];
	}else{
		  	$a = split("<TRNTYPE>",$value);
				$a=$a[1];
				$a=split("<DTPOSTED>",$a);
				$a=$a[1];
				$a=split("<TRNAMT>",$a);
				$a=$a[0];
	}
	
  $mes = substr(trim($a), 4, 2);	
	return $mes;
}

function getAno($value){
	$a = split("<TRNTYPE>",$value);
	$a=$a[1];
	$a=split("<DTPOSTED>",$a);
	$a=$a[1];
	$a=split("<TRNAMT>",$a);
	$a=$a[0];
	$data = trim($a);
	return substr($data,0,4);
}


function remover($variavel){
        $variavel = str_replace("\r", "", $variavel);
		$variavel = str_replace("\n", "", $variavel);
		$variavel = str_replace("\r\n", "", $variavel);
		$variavel = str_replace("\t", "", $variavel);
		$variavel = str_replace(",", ".", $variavel);
		return $variavel;
}
function getValores($data){
	$a = split("<OFX>",$data);
	$a =$a[1];
	return str_replace("</STMTTRN>","",split("<STMTTRN>",remover(str_replace("</OFX>","",$a))));
}
function getData($value){
		$a = split("<TRNTYPE>",$value);
		$a=$a[1];
		$a=split("<DTPOSTED>",$a);
		$a=$a[1];
		$a=split("<TRNAMT>",$a);
		$a=$a[0];
		$data = trim($a);
	 return substr($data,6,2)."/".substr($data,4,2)."/".substr($data,0,4);
}
function getId($value){
		$a = split("<FITID>",$value);
		$a=$a[1];
                 $a = split("<CHECKNUM>",$a);
                 $a=$a[0];
		$a = split("</FITID>",$a);
		
	       
		$a=$a[0];
	   	
               

                
                $b ="";
                $b = split("<CHECKNUM>",$value);
		$b=$b[1];  
                $b = split("</CHECKNUM>",$b);
                $b=$b[0];
                $b = split("<MEMO>",$b);
                $b=$b[0];
               
                
                $id = $a.$b;
                
                return $id;
                
                
}
function getDescricao($value){
    $value = removerAcentos($value);
		$a = str_replace("</MEMO>","",split("<MEMO>",$value));
		$a=$a[1];
		$a = split("</BANKTRANLIST>",$a);
		$a=$a[0];
		return trim($a);
}
function getValor($value){
        $a = split("<FITID>",$value);
		$a=$a[0];
		$a = $a = str_replace("</TRNAMT>","",split("<TRNAMT>",$a));
		$a=$a[1];
       
		return trim( str_replace(",",".",$a));

}


