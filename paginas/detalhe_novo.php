<?php require_once("inc/init.php"); 
session_start();


if (!($_SESSION['usuario']=='trajanux')){
	header("Location: login.php"); 
}
$now   = new DateTime;


?>

<h1 class="page-title txt-color-blueDark">
			
			<!-- PAGE HEADER -->
			<i class="fa-fw fa fa-home"></i> 
				Detalhes
	
	</h1>	


<form id="registro">

<input type="hidden" class="form-control" name="tabela" value="tarefas">
<input type="hidden" class="form-control" name="id" value="<?php echo $now->format( 'dmYHi' ); ?>">
<div class="form-group col-xs-12 col-sm-2 col-lg-2">
	<label for="email">data:</label>
	<input type="text" class="form-control" name="data" value="">
</div>
	<div class="form-group col-xs-12 col-sm-2 col-lg-2">
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
	<input type="text" class="form-control" name="ano" value="">
</div>

<div class="form-group col-xs-12 col-sm-3 col-lg-3">
	<label for="email">valor:</label>
	<input type="text" class="form-control" name="valor" value="">
</div>


	<input type="hidden" class="form-control" name="Categoria" value="">
	<input type="hidden" class="form-control" name="agenciacontacartao" value="">
	<input type="hidden" class="form-control" name="tiporegistro" value="">
	<input type="hidden" class="form-control" name="identificacao" value="Inclusao Manual">





	<div class="form-group col-xs-12 col-sm-3 col-lg-3">
		<label for="email">tipo:</label>
		<select class="form-control" name="tipo"></select>
	</div>

	<div class="form-group col-xs-12 col-sm-12 col-lg-12">
		<label for="email">Descricao:</label>
		<input type="text" class="form-control" name="Item" id="Item">
	</div>


</form>
<div class="form-group col-xs-12 col-sm-10 col-lg-10"></div>
<div class="form-group col-xs-12 col-sm-4 col-lg-4">
	
	<div class="btn  btn-success" onclick="salvar('registro',function(){alert('Registro Salvo')})">Salvar</div>



<hr>
<bR>



<script type="text/javascript">
	pageSetUp();
  carregarSelect('tipo', 'tipo');

</script>