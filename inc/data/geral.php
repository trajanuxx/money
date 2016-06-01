<?php

class Geral {

	function __construct() {
		$this -> conexao = new mysql();
	}

	public function insert($data, $tabela) {
		$result = $this -> conexao -> insert($tabela, $data);
		return $result;
	}

	public function atualizar($data, $tabela, $id) {
		$this -> conexao -> update($tabela, $data, "id='" . $id."'");
	}

	public function updatedir($data, $tabela, $condicao) {
		return $this -> conexao -> update($tabela, $data, $condicao);
	}

	public function updateall($data, $tabela) {
		$this -> conexao -> update($tabela, $data, '1=1');
	}

	public function listar($table, $colunas,$condicoes, $order) {
		
		$default = array (
			'table' => $table,
			'fields' => $colunas,
			'condition' => $condicoes,
			'order' => $order,
			
		);
		
   	return $this -> conexao -> select($default);
	}
	public function listarDistinc($table, $colunas,$condicoes, $order,$distinct){
		
			$default = array (
			'table' => $table,
			'fields' => $colunas,
			'condition' => $condicoes,
			'order' => $order,
			'distinct'=>$distinct
			
		);
	return $this -> conexao -> selectDistinct($default);
	}


	public function deletar($tabela, $id) {
		return $this->conexao->delete($tabela, 'id="' . $id.'"');
	}

	public function deletardir($tabela, $condicao) {
		$this -> conexao -> delete($tabela, $condicao);
	}
	
	public function retornarConsultaJson($s){
		
  if(is_array($s)){
		$arr = $this -> conexao ->select($s);
	}else{
		$arr = $this -> conexao ->queryL($s);

	}
	
		
		if (function_exists('json_encode')) {
        if (json_encode($arr)) {
            return json_encode($arr);
            //Lastest versions of PHP already has this functionality.
        }
    }
    $parts = array();
    $is_list = false;

    //Find out if the given array is a numerical array
    $keys = array_keys($arr);
    $max_length = count($arr) - 1;
    if (($keys[0] == 0) and ( $keys[$max_length] == $max_length)) {//See if the first key is 0 and last key is length - 1
        $is_list = true;
        for ($i = 0; $i < count($keys); $i++) {//See if each key correspondes to its position
            if ($i != $keys[$i]) {//A key fails at position check.
                $is_list = false;
                //It is an associative array.
                break;
            }
        }
    }

    foreach ($arr as $key => $value) {

        if (is_array($value)) {//Custom handling for arrays
            if ($is_list)
                $parts[] = array2json($value);
            /* :RECURSION: */
            else
                $parts[] = '"' . $key . '":' . array2json($value);
            /* :RECURSION: */
        } else {
            $str = '';
            if (!$is_list)
                $str = '"' . $key . '":';

            //Custom handling for multiple data types
            if (is_numeric($value))
                $str .= $value;
            //Numbers
            elseif ($value === false)
                $str .= 'false';
            //The booleans
            elseif ($value === true)
                $str .= 'true';
            else
                $str .= '"' . addslashes($value) . '"';
            //All other things
            // :TODO: Is there any more datatype we should be in the lookout for? (Object?)

            $parts[] = $str;
        }
    }
    $json = implode(',', $parts);

    if ($is_list)
        return '[' . $json . ']';
    //Return numerical JSON
    return '{' . $json . '}';
    //Return associative JSON
		
	}

}
?>