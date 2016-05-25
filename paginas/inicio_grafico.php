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

		var meses = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
		var categorias = [];
		var categorias_dados = [];
		var i = 0;

				carregarValores({
						consulta: "LISTAR_VALORES_ANO",
						parametro: $('#ano').val() 
					}, function(obj) {	
						$.each(obj, function(index, valor) {
							
							if(!categorias_dados){
								var item={
									name:valor.descricao,
									data:[]
						   	}
							  item.data[valor.mes]=perseFloat(valor.valor);								
								categorias_dados.push(item);
								
							}else{
								$.each(categorias_dados,function(index1,valor1){
									if(valor1.name==valor.descricao){
										valor1.data[valor.mes] =parseFloat(valor1.data[valor.mes])+ valor.valor;								
									}								
							});
							}
							
							console.log(categorias_dados);
							
								/*	
							if(!categorias_dados[parseInt(valor.tipo)]){
								categorias_dados.push({
									name:valor.descricao,
									data:[]
								});
							}
					
							if(!categorias_dados[parseInt(valor.tipo)]["name"]){
								categorias_dados[parseInt(valor.tipo)]["name"] = valor.descricao;
								categorias_dados[parseInt(valor.tipo)]["data"] =[];
							}
													
							if(!categorias_dados[parseInt(valor.tipo)]["data"][parseInt(valor.mes)]){
								categorias_dados[parseInt(valor.tipo)]["data"][parseInt(valor.mes)] = parseFloat(valor.valor);

							}else{
								categorias_dados[parseInt(valor.tipo)]["data"][parseInt(valor.mes)]  =  categorias_dados[parseInt(valor.tipo)]["data"][parseInt(valor.mes)]  + parseFloat(valor.valor);															
							}
						*/
							console.log(categorias_dados);
					    //gerarLinhas('grafico', meses, 'Informação Geral de Gastos', categorias_dados);	
		       
						});
					},true);
	

	}




	function numeros(obj, value) {
		$.each(obj, function(index, valor) {
			var item = parseFloat($(".item_" + value + "_" +valor.mes).html()) + parseFloat(valor.valor);
			$(".item_" + value + "_" + valor.mes).html(item.toFixed(2));;
		});
	} // end pagefunction

	// run pagefunction
	pagefunction();
</script>