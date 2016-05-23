<?php require_once("inc/init.php"); 
session_start();


if (!($_SESSION['usuario']=='trajanux')){
	header("Location: login.php"); 
}





?>

<h1 class="page-title txt-color-blueDark">
			
			<!-- PAGE HEADER -->
			<i class="fa-fw fa fa-home"></i> 
				Detalhes
			
		</h1> Informação do registro:
<div id="detalhes">

</div>

Sugestão de Alteração:

<form id="registro">

<input type="hidden" name="tabela" value="tarefas">
<input type="hidden" name="id" value ="<?php echo $_GET["id"] ?>">
<input type="hidden" name="data" value="">
<input type="hidden" name="mes" value="">
<input type="hidden" name="ano" value=""> 
<input type="hidden" name="valor" value=""> 	
<input type="hidden" name="Categoria" value=""> 
<input type="hidden" name="agenciacontacartao" value=""> 	
<input type="hidden" name="tiporegistro" value=""> 	
<input type="hidden" name="identificacao" value=""> 	
	
	
	
	
  <div class="form-group col-xs-12 col-sm-4 col-lg-4">
    <label for="email">Categoria:</label>
    <select class="form-control" name="tipo"></select>
  </div>

  <div class="form-group col-xs-12 col-sm-4 col-lg-4">
    <label for="email">Descrição:</label>
    <input type="text" class="form-control" name="Item" id="Item">
  </div>

  <div class="form-group col-xs-12 col-sm-3 col-lg-4">
    <label for="mes">Mes de Referência:</label>
    <select class="form-control" name="mes">
      <option value="01">Janeiro</option>
      <option value="02">Fevereiro</option>
      <option value="03">Março</option>
      <option value="04">Abril</option>
      <option value="05">Maio</option>    
      <option value="06">Junho</option>    
      <option value="07">Julho</option>   
      <option value="08">Agosto</option>    
      <option value="09">Setembro</option>   
      <option value="10">Outubro</option>    
      <option value="11">Novembro</option>  
      <option value="12">Dezembro</option>
    </select>
  </div>





</form>
  <button class="btn  col-sm-1 col-lg-1 btn-default" onclick="salvarExclusivo()">Salvar</button>


<script type="text/javascript">
  pageSetUp();

  loadScript("js/geral.js", function() {
    iniciar();
    carregarSelect('tipo', 'tipo');
  });

function salvarExclusivo() {
		removery($("[name=id]").val(), 'tarefas',function(){
				salvar('registro',iniciar);
		});
	
	
		removery($("[name=id]").val(), 'tipo_tarefas',function(){
				$.ajax({
					method:'POST',
					url:'inc/process/utils/salvar.php',
					data:{
						tabela:'tipo_tarefas',
						tipo:$("[name=tipo]").val(),
						id : $("[name=id]").val()
					}
				});
		});

}
	
  function iniciar() {
    carregarValores({
      ent: "tarefas",
      condicoes: "id!.<?php echo $_GET["id"] ?>."
    }, function(obj) {
 
      $("[name=Categoria]").val(obj[0].tarefas.Categoria);
			$("[name=mes]").val(obj[0].tarefas.mes);
			$("[name=Item]").val(obj[0].tarefas.Item);
			
$('[name=data]').val(obj[0].tarefas.data);
$('[name=mes]').val(obj[0].tarefas.mes);
$('[name=ano]').val(obj[0].tarefas.ano);
$('[name=valor]').val(obj[0].tarefas.valor); 	
$('[name=Categoria]').val(obj[0].tarefas.Categoria);
$('[name=agenciacontacartao]').val(obj[0].tarefas.agenciacontacartao);	
$('[name=tiporegistro]').val(obj[0].tarefas.tiporegistro);  	
$('[name=identificacao]').val(obj[0].tarefas.identificacao); 
			
			
			
      criarTabela(obj[0], '#detalhes', 'detalhe_item.php');
    }, true, true);
  }
</script>