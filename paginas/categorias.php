<?php require_once("inc/init.php"); 

if (!isset($_SESSION)) {
  session_start();
}

?>

	<h1 class="page-title txt-color-blueDark">
			
			<!-- PAGE HEADER -->
			<i class="fa-fw fa fa-home"></i> 
				Categorias
			
		</h1>

<form id="categoria">
	<input type="hidden" value="tipo" name="tabela">
	<input type="hidden" value="usuario" name="usuario" value="<?php echo $_SESSION["id_usuario"]?>">
<table class="col-sm-12">
	<tr>
		<td class="col-sm-6"><input type="text" class="form-control" name="descricao" placeholder="categoria"></td>
		<td class="col-sm-5"><select class="form-control" name="tipo"><option value="0">Saídas</option><option value="1">Entradas</option></select></td>
		<td class="col-sm-1"><input type="button" class="form-control btn-success" value="Incluir" onclick="salvar('categoria',iniciar)" ></td>
	</tr>
</table>
	
</form>

<br>
<hr>
<div id="detalhes">
	
</div>
<script type="text/javascript">

	pageSetUp();

	loadScript("js/geral.js", function() {
		iniciar()
	});


	function iniciar() {
		carregarValores({
			consulta: "LISTAR_CATEGORIAS_DETALHES"
		}, function(obj) {
			criarTabela(obj, '#detalhes', '', 'x', deletar);
		});
	}

	function deletar() {
		$('.x').unbind();
		$('.x').click(function() {
			id = $(this).attr("item");
			remover($(this).attr("item"), 'tipo',iniciar);
		});
	}
 
</script>