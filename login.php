<?php
  session_start();
	unset($_SESSION['usuario']);
	unset($_SESSION['nome']);
	unset($_SESSION);
	$_SESSION = array();

?>

<html lang="en-us"><head>
		<meta charset="utf-8">
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

		<title>Pagina Inicial</title>
		<meta name="description" content="">
		<meta name="author" content="">

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!-- Basic Styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="css/font-awesome.min.css">

		<!-- SmartAdmin Styles : Caution! DO NOT change the order -->
		<link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-production.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-skins.min.css">

		<!-- SmartAdmin RTL Support is under construction-->
		<link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-rtl.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="css/fileupload.css">

		<!-- We recommend you use "your_style.css" to override SmartAdmin
		     specific styles this will also ensure you retrain your customization with each SmartAdmin update.
		<link rel="stylesheet" type="text/css" media="screen" href="css/your_style.css"> -->

		<link rel="stylesheet" type="text/css" media="screen" href="css/your_style.css">
		<!-- FAVICONS -->
		<link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
		<link rel="icon" href="img/favicon/favicon.ico" type="image/x-icon">

		<!-- GOOGLE FONT -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

		<!-- Specifying a Webpage Icon for Web Clip
			 Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
		<link rel="apple-touch-icon" href="img/splash/sptouch-icon-iphone.png">
		<link rel="apple-touch-icon" sizes="76x76" href="img/splash/touch-icon-ipad.png">
		<link rel="apple-touch-icon" sizes="120x120" href="img/splash/touch-icon-iphone-retina.png">
		<link rel="apple-touch-icon" sizes="152x152" href="img/splash/touch-icon-ipad-retina.png">

		<!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">

		<!-- Startup image for web apps -->
		<link rel="apple-touch-startup-image" href="img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
		<link rel="apple-touch-startup-image" href="img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
		<link rel="apple-touch-startup-image" href="img/splash/iphone.png" media="screen and (max-device-width: 320px)">
	<script type="text/javascript" async="" src="http://www.google-analytics.com/ga.js"></script></head>
	<body class="desktop-detected">
		<!-- POSSIBLE CLASSES: minified, fixed-ribbon, fixed-header, fixed-width
			 You can also add different skin classes such as "smart-skin-1", "smart-skin-2" etc...-->
						<!-- HEADER -->
				
				<!-- END HEADER -->

				<!-- SHORTCUT AREA : With large tiles (activated via clicking user name tag)
				Note: These tiles are completely responsive,
				you can add as many as you like
				-->

				<!-- END SHORTCUT AREA -->

				<!-- Left panel : Navigation area -->
		<!-- Note: This width of the aside area can be adjusted through LESS variables -->
		
		<!-- END NAVIGATION --><!-- ==========================CONTENT STARTS HERE ========================== -->
<!-- MAIN PANEL -->
<div id="main" role="main">
		<!-- RIBBON -->
	
	<!-- END RIBBON -->
	<!-- MAIN CONTENT -->
	<div id="content" style="opacity: 1;">

 

	
		<meta charset="utf-8">
		<title>Trajanux-Finanças <bR>(Meu Porquinho)</title>

		<meta name="description" content="User login page">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- basic styles -->

		<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="../assets/css/font-awesome.min.css">

		<!--[if IE 7]>
		  <link rel="stylesheet" href="../assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!-- page specific plugin styles -->

		<!-- fonts -->

		<link rel="stylesheet" href="../assets/css/ace-fonts.css">

		<!-- ace styles -->

		<link rel="stylesheet" href="../assets/css/ace.min.css">
		<link rel="stylesheet" href="../assets/css/ace-rtl.min.css">

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="../assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="../assets/js/html5shiv.js"></script>
		<script src="../assets/js/respond.min.js"></script>
		<![endif]-->
	

	
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<i class="icon-leaf green"></i>
									<span class="red">Trajanux</span>
									<span class="white">Finanças</span>
								</h1>
								
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="icon-coffee green"></i>
												Informe os dados de acesso
											</h4>

											<div class="space-6"></div>

											<form action="validarUsuario.php" method="POST">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" name="usuario" class="form-control" placeholder="Username">
															<i class="icon-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" name="senha" class="form-control" placeholder="Password">
															<i class="icon-lock"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">
														<label class="inline">
															<input type="checkbox" class="ace">
															<span class="lbl"> Lembre de mim</span>
														</label>

														<button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="icon-key"></i>
															Login
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>

										
										</div><!-- /widget-main -->

									
									</div><!-- /widget-body -->
								</div><!-- /login-box -->

								<!-- /forgot-box -->

								<!-- /signup-box -->
							</div><!-- /position-relative -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div>
		</div><!-- /.main-container -->

	
</div>
	<!-- END MAIN CONTENT -->
	
</div>
<!-- END MAIN PANEL -->

<!-- FOOTER -->
	<!-- PAGE FOOTER -->
<div class="page-footer">
	<div class="row">
		<div class="col-xs-12 col-sm-6">
			<span class="txt-color-white">Trajanux Money</span>
		</div>

	</div>
</div>
<!-- END PAGE FOOTER --><!-- END FOOTER -->

<!-- ==========================CONTENT ENDS HERE ========================== -->

<!--================================================== -->

<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)
		<script data-pace-options='{ "restartOnRequestAfter": true }' src="js/plugin/pace/pace.min.js"></script>-->


























		
		

	

</body></html>