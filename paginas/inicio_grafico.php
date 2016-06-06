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
	
.alert {
  border-radius: 0;
  border-width: 0 0 0 5px;
  color: #675100;
  margin-bottom: 5px;
  margin-top: 0;
  padding: 4px;
}
	.alert-info {
  background-color: #ededed;
  border-color: #c2c2c2;
  color: #305d8c;
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



<div class="row">

	<div class="col-sm-12" id="grafico"> </div>
</div>
<br>
		<div class="row">
			<div class="col-sm-4">

				<div class="well well-sm well-light">
					
					<select class="fcol-sm-4 form-control" name="mes_gastos" style="float: right;" onchange="iniciar()">
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
						<br>						<br>

				</div>
			</div>
		
</div>

<div class="row">

	<div class="col-sm-6">


		<div class="row">
			<div class="col-sm-12">

				<div class="well well-sm well-light">
					<h4>
							 <b> Top 10 Valores </b>

							</h4>
					<br>
					<div id="valores">



					</div>
				</div>

			</div>
		</div>
	</div>
	<div class="col-sm-6">


		<div class="row">
			<div class="col-sm-12">

				<div class="well well-sm well-light">
					<h4>
							 <b> Top 10 Gastos </b>							    	
			
							</h4>
					<br>
					<div id="valores_gastos">
						<div class="alert alert-info alert-block ">
							item.
						</div>
					</div>
				</div>

			</div>
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
		
	// Criando o grafico ///////////////////////////////////////////////////////////////////////////////////////////
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

				Vitem = [];

				$.each(valor, function(i, item) {
					if (!item) {
						item = 0;
					}
					if (item < 0) {
						item = parseFloat(item) * (-1);
					}

					if (i != 'media') {
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

	// Carregando valores de maior quantidade ///////////////////////////////////////////////////////////////////////////////////////////

		carregarValores({
			consulta: "MAIOR_QTD_GASTO_CATEGORIA",
			parametro: $('#ano').val()+','+$('[name=mes_gastos]').val()
		}, function(obj) {
			$('#valores').html('');
			$.each(obj, function(i, valor) {
				  if (i<10){
						$('#valores').append('<div class="alert alert-info alert-block ">'+valor.descricao+'<span style="float: right;">'+valor.qtd+'</span></div>');		
					}
			 });
		});
	// Carregando valores de maior gasto ///////////////////////////////////////////////////////////////////////////////////////////

		carregarValores({
			consulta: "MAIOR_VALOR_GASTO_CATEGORIA",
			parametro: $('#ano').val()+','+$('[name=mes_gastos]').val()
		}, function(obj) {
			$('#valores_gastos').html('');
			$.each(obj, function(i, valor) {
				if (i<10){
					$('#valores_gastos').append('<div class="alert alert-info alert-block ">'+valor.descricao+'<span style="float: right;">R$ '+valor.valor+'</span></div>');		
				}
			});
		});

	}




	pagefunction();
		</script>