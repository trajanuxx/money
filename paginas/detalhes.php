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
			
		</h1>
<div id="detalhes">

</div>
<script type="text/javascript">
	pageSetUp();

	loadScript("js/geral.js", function() {
		iniciar()
	});


	function iniciar() {
		carregarValores({
			consulta: "LISTAR_VALORES_DETALHES",
			parametro: "<?php echo $_GET["ano"] ?>,<?php echo $_GET["mes"] ?>,<?php echo $_GET["tipo"] ?>"
		}, function(obj) {
			criarTabela(obj, '#detalhes', 'detalhe_item.php', 'x', deletar);
		});
	}

	function deletar() {
		$('.x').unbind();
		$('.x').click(function() {
			id = $(this).attr("item");
			remover($(this).attr("item"), 'tarefas',function(){iniciar();});
		});
	}
</script>