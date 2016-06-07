
		<link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">

<link rel="stylesheet" type="text/css" href="/money/arquivos_pessoais/css/elfinder.min.css">
<link rel="stylesheet" type="text/css" href="/money/arquivos_pessoais/css/theme.css">


<div id="elfinder"></div>
<script>
  
  loadScript("js/elfinder.min.js", function() {
		$('#elfinder').elfinder({
					url : '/money/arquivos_pessoais/php/connector.minimal.php'  // connector URL (REQUIRED)
				});
			});

</script>
