// função geral do sistema. Esse arquivo serve para concentrar funções costumeiramente utilizadas em todo o sistema.
//remover - serve para aremover um registro
//salvar - server para salvar um regisstro
//recuperar - serve para recuperar um registro
//mostrarespera - serve para mostrar uma espera
//procurar foto - serve apra procurarfotos
//listar - serve para criar uma tabela listando o conteudo de uma tabela de banco
//listar_custom - server para criar uma trablea customizada
//paginação - serve para criar uma paginação para tabelas
//objtostring - serve para converter um objeto em uma tring
//inicialização - serve para inicialização de objetivos e componentes

function carregarSelect(name, ent) {

	$.ajax({
		url: "inc/process/utils/listar.php",
		dataType: "html",
		async: false,
		data: {
			ent: ent,
			order: 'descricao'
		},
		success: function(data) {
			var obj = JSON.parse(data);
			$.each(obj, function(id, valor) {
				$("[name='" + name + "']").append("<option value=" + valor[ent].id + ">" + valor[ent].descricao + "</option>");
			});
			removerModal();
		}
	});
}

function carregarSelect_custom(name, consulta) {
	mostrarModal();
	var dados = "";

	if (arguments[2]) {
		dados = {
			consulta: consulta,
			parametro: arguments[2]
		};
	} else {
		dados = {
			consulta: consulta
		};
	}
	$.ajax({
		url: "inc/process/utils/listar_valores.php",
		dataType: "html",
		data: dados,
		async: false,
		success: function(data) {
			var obj = JSON.parse(data);
			var item;
			$.each(obj, function(id, valor) {

				console.log(valor);
				if (valor.valor) {
					item = valor.valor;
				} else {
					item = valor.descricao;
				}
				$("[name='" + name + "']").append("<option value=" + valor.id + ">" + item + "</option>");
			});
			removerModal();
		}
	});
}

function mostrarModal() {
	if ($('.espera').is(':visible')) {
		console.log('Ja aberta');
	} else {
		$(".espera").modal();
	}
}

function removerModal() {
	window.setTimeout(function() {
		$(".espera").modal('hide');
		$(".modal-backdrop").fadeOut('slow');
		$(".espera").fadeOut('slow');
		
		
		
		
	}, 1000);
}




function removery(item, tabela) {
	mostrarModal();
	funcoes = "";
	if (arguments[2]) {
		funcoes = arguments[2];
	}

	$.ajax({
		method: 'POST',
		data: "item=" + item + "&tabela=" + tabela,
		async: false,
		url: 'inc/process/utils/remover.php',
		success: function(e) {
			if(arguments[2]){
				funcoes();
			}
		}

	});
}

function remover(item, tabela) {

	if (!confirm('Deseja realmente remover o registro selecionado?')) {
		return;
	}
	mostrarModal();
	funcoes = "";
	if (arguments[2]) {
		funcoes = arguments[2];
	}

	$.ajax({
		method: 'POST',
		data: "item=" + item + "&tabela=" + tabela,
		url: 'inc/process/utils/remover.php',
		async: false,
		success: function(e) {

			if(arguments[2]){
				funcoes();
			}

		}
	});
}


function salvar(item) {
	mostrarModal();

	formulario = $("#" + item);

	$(formulario).find(".date").each(function(i) {
		item = $(this).val();
		$(this).val($(this).val().split("/")[2] + "-" + $(this).val().split("/")[1] + "-" + $(this).val().split("/")[0]);
	});
	dados = $(formulario).serialize();
	$(formulario).find(".date").each(function(i) {
		item = $(this).val();
		$(this).val($(this).val().split("-")[2] + "/" + $(this).val().split("-")[1] + "/" + $(this).val().split("-")[0]);
	});

	funcoes = "";
	if (arguments[1]) {
		funcoes = arguments[1];
	}


	$.ajax({
		method: 'POST',
		data: dados,
		url: 'inc/process/utils/salvar.php',
		async: false,
		success: function(e) {
			var numero = parseInt(e)
			if ((numero == e)) {
				$("#" + item + " #id").val(e);
		

				removerModal();
				if(arguments[1]){
					funcoes();
				}
				
			} else {
				removerModal();


			}
			removerModal();
		}

	});
}

function mostrarespera(texto) {
	$.smallBox({
		title: "",
		content: "<br><i class='fa fa-clock-o'></i> <i>" + texto + "</i><br><br>",
		color: "orange",
		iconSmall: "fa fa-thumbs-up bounce animated",
		sound: "no"

	});
}

function removerespera(texto) {
	$("#smallbox" + SmallBoxes).remove();
	$.smallBox({
		title: "",
		content: "<br><i class='glyphicon glyphicon-info-sign'></i> <i>" + texto + "</i><br><br>",
		color: "green",
		iconSmall: "fa fa-thumbs-up bounce animated",
		timeout: 4000
	});
}











function objToString(obj) {
	var str = '';
	for (var p in obj) {
		if (obj.hasOwnProperty(p)) {
			str += p + '::' + obj[p] + '\n';
		}
	}
	return str;
}

function setarId(e) {
	if (arguments[1]) {
		$("#" + arguments[1]).val(e);
	} else {
		$("#id").val(e);
	}

}






function carregarValores(data) {
	mostrarModal();
	var funcao = '';
	var assinc = true;
	var urltipo = 'inc/process/utils/listar_valores.php';

	if(arguments[1]) {
		funcao = arguments[1];
	}
	if (arguments[2]) {
		assinc = arguments[2];
	}
	if(arguments[3]){
		urltipo= 'inc/process/utils/listar.php';
	}
	$.ajax({
		url: urltipo,
		data: data,
		async: true,
		success: function(e) {
			var obj = JSON.parse(e);
			if (arguments[1]) {
				funcao(obj);
			}

			removerModal();


		}


	});
}



function criarTabela() {
	var itens = arguments[0];
	
	var body = "<table class='table table-bordered'>";

	for (var k in itens) {
	
		body = body + "<tr>";
		for (var j in itens[k]) {
			if(j!='id'){
					body = body + "<td> <a href='#paginas/" + arguments[2] + "?id=" + itens[k].id + "'>";
          body = body + itens[k][j];
			    body = body + "</a></td>";
			}	
   
		}
		 if (arguments[3]) {
				body = body + "<td style='width:50px'><a class='btn btn-danger btn-sm "+arguments[3]+"' item='" + itens[k].id + "' >"+arguments[3]+"</a></td> ";
			}
		body = body + "</tr>";
	}
	body = body + "</tbody> </table>";
	$(arguments[1]).html(body);
	if(arguments[4]){
		arguments[4]();
	}
}







function salvarItens(dados, callback) {
	$.ajax({
		method: 'POST',
		data: dados,
		url: 'inc/process/utils/salvar.php',
		success: function(e) {
			if (callback) {
				callback(e);
			}

		}
	});
}

function removerItens(dados, callback) {
	$.ajax({
		method: 'POST',
		data: dados,
		url: 'inc/process/utils/remover_itens.php',
		success: callback
	});
}


$.ajaxSetup ({
    // Disable caching of AJAX responses
    cache: false
});
// INIT

