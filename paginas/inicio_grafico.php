<?php require_once("inc/init.php"); 


?>
<style>
	.itens div {
		padding-left: 0;
		padding-right: 0;
		text-align: center;
	}
	
	.meses div {
		border: 0 solid;
		color: #000;
		text-align: right;
	}
</style>
<!-- row -->


	<!-- col -->
	
		<h1 class="page-title txt-color-blueDark">
			
			<!-- PAGE HEADER -->
			<i class="fa-fw fa fa-home"></i> 
				Relatório Sintético 
			<select  class="col-sm-2" onchange="iniciar()" id="ano" name="ano" style="float:right">
	
		  </select>
		</h1>






<!-- end row -->

<!--
	The ID "widget-grid" will start to initialize all widgets below 
	You do not need to use widgets if you dont want to. Simply remove 
	the <section></section> and you can use wells or panels instead 
	-->



<div class="row">

	<div class="col-sm-12" id="grafico"></div>
</div>



<script type="text/javascript">
	pageSetUp();
	var pagefunction = function() {
		    carregarSelect_custom('ano', 'LISTAR_ANOS_DISPONIVEIS');
		    loadScript("js/plugin/highcharts/highcharts.js", function () {
					 loadScript("js/graficos.js", function () {
				     iniciar();
					 });
				});
	
	}



	function iniciar() {

		var meses = [01, 02, 03, 04, 05, 06, 07, 08, 09, 10, 11, 12];
		var categorias = [];
		var categorias_dados = [];
		var i = 0;

				carregarValores({
						consulta: "LISTAR_VALORES_ANO",
						parametro: $('#ano').val() 
					}, function(obj) {
					var item={};
					var dados=[];
					
						$.each(obj, function(index, valor) {
	              dados=[0,0,0,0,0,0,0,0,0,0,0,0];
							  dados.splice(parseInt(valor.mes),0,parseFloat(valor.valor));
                console.log(dados);
							

									     
						});
					
					$.each(categorias_dados,function(index1,categorias){	
						//dados = categorias.data;
						console.log(categorias.name);
					 // valor1.data
					});
								 
			    console.log(categorias_dados);
					gerarLinhas('grafico', meses, 'Gastos no Meses', categorias_dados)
					
					},true)
		
		
	

	}




	pagefunction();
</script>