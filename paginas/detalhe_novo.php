<?php require_once("inc/init.php"); 
$now   = new DateTime();
?>
<style>
.modal-body {
    height: 160px;
    padding: 20px;
    position: relative;
}
</style>

<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h3 id="myModalLabel">Inclusão Manual</h3>
</div>
<div class="modal-body">
	<form id="registro">

		<input type="hidden" class="form-control" name="tabela" value="tarefas">
		<input type="hidden" class="form-control" name="id" value="<?php echo $now->format( 'dmYHi' ); ?>">
		<input type="hidden" class="form-control" name="data" value="<?php echo $now->format( 'd/m/Y' ); ?>">
		<input type="hidden" class="form-control" name="Categoria" value="">
		<input type="hidden" class="form-control" name="agenciacontacartao" value="">
		<input type="hidden" class="form-control" name="tiporegistro" value="">
		<input type="hidden" class="form-control" name="identificacao" value="Inclusao Manual">
			<input type="hidden" value="usuario" name="usuario" value="<?php echo $_SESSION["id_usuario"]?>">

		<div class="form-group col-xs-12 col-sm-4 col-lg-4">
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
		<div class="form-group col-xs-12 col-sm-2 col-lg-2">
			<label for="email">ano:</label>
			<input type="text" class="form-control" name="ano" value="<?php echo $now->format( 'Y' ); ?>">
		</div>

		<div class="form-group col-xs-12 col-sm-3 col-lg-3">
			<label for="email">valor:</label>
			<input type="text" class="form-control" name="valor" value="">
		</div>


		<div class="form-group col-xs-12 col-sm-3 col-lg-3">
			<label for="email">tipo:</label>
			<select class="form-control" name="tipo"></select>
		</div>

		<div class="form-group col-xs-8 col-sm-12 col-lg-12">
			<label for="email">Descricao:</label>
			<input type="text" class="form-control" name="Item" id="Item">
		</div>


	</form>
</div>
<div class="modal-footer">
	<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
	<button class="btn btn-primary"  onclick="enviar()">Save changes</button>
</div>

<script type="text/javascript">
	pageSetUp();
  carregarSelect('tipo', 'tipo');
	var d = new Date();
	var id = ''+d.getDate()+d.getMonth()+d.getFullYear()+d.getHours()+d.getMinutes()+d.getSeconds();
	$('[name=id]').val(id);

	
	function enviar(){
		salvar('registro',function(){
			alert('Registro Salvo');
			$('#remoteModal').modal('hide');
      iniciar();
			 
		});
	}

</script>