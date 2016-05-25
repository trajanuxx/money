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
			consulta: "LISTAR_CATEGORIAS"
		}, function(obj) {

			if (obj) {
				$.each(obj, function(index, value) {
					categorias_dados[i] = [];
					categorias[i] = value.descricao;
					categorias_dados[i][0] = value.id
					carregarValores({
						consulta: "LISTAR_VALORES",
						parametro: $('#ano').val() + ',' + value.id
					}, function(obj) {
						$.each(obj, function(index, valor) {
							if(categorias_dados[i][0]==valor.tipo){
								if(!categorias_dados[i][valor.mes]){
									categorias_dados[i][parseInt(valor.mes)]=0;
								}
								console.log(parseInt(valor.mes));
								categorias_dados[i][parseInt(valor.mes)] = categorias_dados[i][parseInt(valor.mes)]+parseFloat(valor.valor);
							}
						});
					});
						i++;
				});
			
			}
			console.log(categorias);
			console.log(categorias_dados);

		});


			
			
			
 var series = [{
            name: categorias[1],
            data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
        }, {
            name: categorias[2],
            data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
        }, {
            name: categorias[2],
            data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
        }, {
            name: categorias[2],
            data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
        }];			

gerarLinhas('grafico', meses, 'Informação Geral de Gastos', series);
			
			
	

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