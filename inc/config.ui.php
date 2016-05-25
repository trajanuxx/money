<?php

//CONFIGURATION for SmartAdmin UI

//ribbon breadcrumbs config
//array("Display Name" => "URL");
$breadcrumbs = array(
	"Home" => APP_URL
);

/*navigation array config

ex:
"dashboard" => array(
	"title" => "Display Title",
	"url" => "http://yoururl.com",
	"url_target" => "_blank",
	"icon" => "fa-home",
	"label_htm" => "<span>Add your custom label/badge html here</span>",
	"sub" => array() //contains array of sub items with the same format as the parent
)

*/
$page_nav = array(
	"dashboard" => array(
		"title" => "Dashboard",
		"url" => "paginas/inicio_grafico.php",
		"icon" => "fa-home"
	)	,
		"dashboard_inicio" => array(
		"title" => "Pagina Inicial",
		"url" => "paginas/inicio.php",
		"icon" => "fa-home"
	)	,
	"novo" => array(
		"title" => "Registro Manual",
		"url" => "paginas/detalhe_novo.php",
		"icon" => "fa-home"
	),"adm" => array(
		"title" => "Adminstrativo",
		"icon" => "fa-home",
		"sub" => array(
					"regras" => array(
					"title" => "Regras",
					"url" => "paginas/regras.php",
					"icon" => "fa-home"
				),
				  "Categorias" => array(
					"title" => "Categorias",
					"url" => "paginas/categorias.php",
					"icon" => "fa-home"
				),
			  
		)
	)
);

//configuration variables
$page_title = "";
$page_css = array();
$no_main_header = false; //set true for lock.php and login.php
$page_body_prop = array(); //optional properties for <body>
$page_html_prop = array(); //optional properties for <html>
?>