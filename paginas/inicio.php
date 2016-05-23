<?php require_once("inc/init.php"); 
session_start();


if (!($_SESSION['usuario']=='trajanux')){
	header("Location: login.php"); 
}


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
	<div class="col-sm-12 ">
		<div class="col-sm-2" style="background: #666; color:white"> Itens</div>
		<div class="col-sm-10 itens" style="background: #666; color:white;">
			<div class="col-sm-1" style="color: white;"> JAN</div>
			<div class="col-sm-1" style="color: white;"> FEV</div>
			<div class="col-sm-1" style="color: white;"> MAR</div>
			<div class="col-sm-1" style="color: white;"> ABR</div>
			<div class="col-sm-1" style="color: white;"> MAIO</div>
			<div class="col-sm-1" style="color: white;"> JUN</div>
			<div class="col-sm-1" style="color: white;"> JUL</div>
			<div class="col-sm-1" style="color: white;"> AGO</div>
			<div class="col-sm-1" style="color: white;"> SET</div>
			<div class="col-sm-1" style="color: white;"> OUT</div>
			<div class="col-sm-1" style="color: white;"> NOV</div>
			<div class="col-sm-1" style="color: white;"> DEZ</div>
		</div>


	</div>
	<div class="col-sm-12 meses"></div>
</div>



<script type="text/javascript">
	pageSetUp();
	var pagefunction = function() {
		    carregarSelect_custom('ano', 'LISTAR_ANOS_DISPONIVEIS');
				iniciar();
	
	};



	function iniciar() {

		carregarValores({
			consulta: "LISTAR_CATEGORIAS"
		}, function(obj) {
			$('.meses').html('');
			var color = 'white';
			if (obj) {
				$.each(obj, function(index, value) {
					if (value.tipo == "1") {
						color = "#B0C4DE";
					} else {
						color = 'white';
					}

					var item = '';
					item = item + '<div class="col-xs-2 col-md-2 col-sm-2" style="border: 1px #ccc solid; color: #800000;background: ' + color + ';height: 22px; text-overflow: ellipsis;  text-align:left"> ' + value.descricao + '</div>';
					item = item + '<div class="col-xs-10 col-md-10 col-sm-10 itens" style="border: 1px #ccc solid;background: ' + color + ';height: 22px; text-overflow: ellipsis;">';
					item = item + '		<div class="col-xs-1 col-md-1 col-sm-1 "><a href="#paginas/detalhes.php?mes=01&ano=' + $('#ano').val() + '&tipo=' + value.id + '" class=" item_' + value.id + '_01" > 0</a></div>	<div class="col-sm-1 "><a href="#paginas/detalhes.php?mes=02&ano=' + $('#ano').val() + '&tipo=' + value.id + '" class="item_' + value.id + '_02"> 0 </a></div>';
					item = item + '		<div class="col-xs-1 col-md-1 col-sm-1 "><a href="#paginas/detalhes.php?mes=03&ano=' + $('#ano').val() + '&tipo=' + value.id + '" class=" item_' + value.id + '_03"> 0</a></div>	<div class="col-sm-1 "><a href="#paginas/detalhes.php?mes=04&ano=' + $('#ano').val() + '&tipo=' + value.id + '" class="item_' + value.id + '_04"> 0 </a></div>';
					item = item + '		<div class="col-xs-1 col-md-1 col-sm-1 "><a href="#paginas/detalhes.php?mes=05&ano=' + $('#ano').val() + '&tipo=' + value.id + '" class=" item_' + value.id + '_05"> 0</a></div>	<div class="col-sm-1 "><a href="#paginas/detalhes.php?mes=06&ano=' + $('#ano').val() + '&tipo=' + value.id + '" class="item_' + value.id + '_06"> 0 </a></div>';
					item = item + '		<div class="col-xs-1 col-md-1 col-sm-1 "><a href="#paginas/detalhes.php?mes=07&ano=' + $('#ano').val() + '&tipo=' + value.id + '" class=" item_' + value.id + '_07"> 0</a></div>	<div class="col-sm-1 "><a href="#paginas/detalhes.php?mes=08&ano=' + $('#ano').val() + '&tipo=' + value.id + '" class="item_' + value.id + '_08"> 0 </a></div>';
					item = item + '		<div class="col-xs-1 col-md-1 col-sm-1 "><a href="#paginas/detalhes.php?mes=09&ano=' + $('#ano').val() + '&tipo=' + value.id + '" class=" item_' + value.id + '_09">0</a></div>  	<div class="col-sm-1 "><a href="#paginas/detalhes.php?mes=10&ano=' + $('#ano').val() + '&tipo=' + value.id + '" class="item_' + value.id + '_10"> 0 </a></div>';
					item = item + '		<div class="col-xs-1 col-md-1 col-sm-1 "><a href="#paginas/detalhes.php?mes=11&ano=' + $('#ano').val() + '&tipo=' + value.id + '" class=" item_' + value.id + '_11"> 0</a></div>	<div class="col-sm-1 "><a href="#paginas/detalhes.php?mes=12&ano=' + $('#ano').val() + '&tipo=' + value.id + '" class="item_' + value.id + '_12"> 0 </a></div>';
					item = item + '</div>';

					$('.meses').append(item);
					carregarValores({
						consulta: "LISTAR_VALORES",
						parametro: $('#ano').val() + ',' + value.id
					}, function(obj) {
						numeros(obj, value.id)
					});
				});
			}


		});

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