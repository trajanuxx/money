<?php require_once("inc/init.php"); 


?> <style>
	.itens div {
		padding - left: 0;
		padding - right: 0;
		text - align: center;
	}

.meses div {
	border: 0 solid;
	color: #000;
		text-align: right;
	}
</style>
<!-- row -->


	<!-- col -->
	
		<h1 class= "page-title txt-color-blueDark" >

		<!-- PAGE HEADER -->
		<i class = "fa-fw fa fa-home" > </i> 
	Relatório Sintético <select class = "col-sm-2"
	onchange = "iniciar()"
	id = "ano"
	name = "ano"
	style = "float:right" >

	</select> </h1>






	<!-- end row -->

	<!--
	The ID "widget-grid"
	will start to initialize all widgets below
	You do not need to use widgets
	if
	you dont want to.Simply remove
	the < section > < /section> and you can use wells or panels instead 
	-->



	<div class = "row" >

	<div class = "col-sm-12" id="grafico" > </div> 
</div>
	<div class = "row" >

	<div class = "col-sm-6"  > 
	 <h2>
		 Top 10 Valores
		</h2>
		<div id="valores">
			
		</div>
	</div>
		<div class = "col-sm-6"  > 
	 <h2>
		 Top 10 Ocorrencias
		</h2>
			<div id="ocorrencias">
				
			</div>
	</div>	
</div>


	<script type = "text/javascript" >
	
	pageSetUp();
	var pagefunction = function() {
		carregarSelect_custom('ano', 'LISTAR_ANOS_DISPONIVEIS');
		loadScript("js/plugin/highcharts/highcharts.js", function() {
			loadScript("js/graficos.js", function() {
				iniciar();
			});
		});

	}



	function iniciar() {
		$("#label_status").html("<img src='/money/img/popup.gif' width='20px'>Aguarde... Atualizando registros!!");

	var meses = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
	var categorias = [];
	var categorias_dados = [];
	var i = 0;

	carregarValores({
		consulta: "LISTAR_VALORES_ANO_DETALHES",
		parametro: $('#ano').val() 
	}, function(obj) {
		var item = {};

		$.each(obj, function(i, valor) {
			var descricao = valor.descricao;
			delete valor.descricao;
			
			  Vitem=[];
			
				$.each(valor, function(i, item) {	
					if(!item){
						item=0;
					}
					if(item<0){
						 item = parseFloat(item)*(-1);
						 }
					console.log(i);
					if(i!='media'){
							Vitem.push(parseFloat(parseFloat(item).toFixed(2)));
					}
	      });
			
			

			item = {
				name: descricao,
				data: Vitem
			}
			

			categorias_dados.push(item);

		});

	

		gerarLinhas("grafico", meses, 'Informações Gerais de Gastos ', categorias_dados)
		$("#label_status").html("Registros Atualizados!");

	}, false);

}




		pagefunction(); 
		
		</script>