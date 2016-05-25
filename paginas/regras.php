<?php require_once("inc/init.php"); 



?>

	<h1 class="page-title txt-color-blueDark">
			
			<!-- PAGE HEADER -->
			<i class="fa-fw fa fa-home"></i> 
				Regras
			
		</h1>


<form id="categoria">
	<input type="hidden" value="tipo_palavras" name="tabela">
<table class="col-sm-12">
	<tr>
		<td class="col-sm-6"><input type="text" class="form-control" name="descricao" placeholder="categoria"></td>
		<td class="col-sm-5"><select class="form-control" name="tipo"></select></td>
		<td class="col-sm-1"><input type="button" class="form-control btn-success" value="Incluir" onclick="salvar('categoria',iniciar)" ></td>
	</tr>
</table>
	
</form>

<br>
<hr>
<div id="detalhes">
	
</div>
<script type="text/javascript">


	loadScript("js/geral.js", function() {
		iniciar();
		carregarSelect('tipo', 'tipo');
	});


	function iniciar() {
		carregarValores({
			consulta: "LISTAR_REGRAS"
		}, function(obj) {
			criarTabela(obj, '#detalhes', '', 'x', deletar);
		});
	}

	function deletar() {
		$('.x').unbind();
		$('.x').click(function() {
			id = $(this).attr("item");
			remover($(this).attr("item"), 'tipo_palavras',function(){iniciar();});
		});
	}
 
</script>