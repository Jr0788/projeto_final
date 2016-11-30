<?php
echo "
	<!DOCTYPE html>
	<html lang='pt-br'>
		<head>
			<meta charset='utf-8'>
			<meta http-equiv='X-UA-Compatible' content='IE=edge'>
			<meta name='viewport' content='width=device-width, initial-scale=1'>
			<meta name='description' content=''>
			<meta name='author' content=''>
			<title>Sistema Acadêmico</title>
			<link href='../vendor/bootstrap/css/bootstrap.min.css' rel='stylesheet'>
			<link href='../vendor/metisMenu/metisMenu.min.css' rel='stylesheet'>
			<link href='../dist/css/sb-admin-2.css' rel='stylesheet'>
			<link href='../vendor/font-awesome/css/font-awesome.min.css' rel='stylesheet' type='text/css'>
			<link href='../vendor/bootstrapvalidator/dist/css/bootstrapValidator.css' rel='stylesheet'>
		</head>
		<body> 
			<div class='container'>
				<div class='row'>
					<div class='col-md-4 col-md-offset-4'>
						<!-- <div class='login-panel panel panel-default'>
							<div class='panel-heading'>
								<center>
									<h1><i class='fa fa-graduation-cap fa-3x'></i></h1>
									<h2 class='panel-title'><strong>Sistema Acadêmico</strong></h2>
								</center>
							</div>
						</div> -->
					</div>
				</div>
			</div>
		    <br/><br/>
			<nav class='navbar navbar-default navbar-static-top' role='navigation' style='margin-bottom: 0'>
			<div class='navbar-header'>
				<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-collapse'>
					<span class='sr-only'>Toggle navigation</span>
				</button>
				<a class='navbar-brand' href='login.html'>Sistema Acadêmico</a>
			</div>
			<ul class='nav navbar-top-links navbar-right'>
				<li class='dropdown'>
					<a class='hvr-underline-from-center' class='dropdown-toggle' data-toggle='dropdown' href='#'>
						<i class='fa fa-user fa-fw'></i> <i class='fa fa-caret-down'></i>
					</a>
					<ul class='dropdown-menu dropdown-user'>
						<li><a class='hvr-shutter-out-horizontal' href='#'><i class='fa fa-user fa-fw'></i> Usuário</a></li>
						<li><a class='hvr-shutter-out-horizontal' href='#'><i class='fa fa-gear fa-fw'></i> Ajustes</a></li>
						<li class='divider'></li>
						<li><a class='hvr-shutter-out-horizontal' href='login.html'><i class='fa fa-sign-out fa-fw'></i> Logout</a></li>
					</ul>
				</li>
			</ul>
			</nav>
			
			<div class='navbar-default sidebar' role='navigation'>
							  <div class='sidebar-nav navbar-collapse'>
								  <ul class='nav' id='side-menu'>
									  <li>
										  <a class='hvr-underline-from-center' href='login.html'><i class='fa fa-home fa-fw'></i> Home</a>
									  </li>
									  <li>
										  <a class='hvr-underline-from-center' href='#'><i class='fa fa-edit fa-fw'></i> Lançamento<span class='fa arrow'></span></a>
										  <ul class='nav nav-second-level'>
											  <li><a class='hvr-shutter-out-horizontal' href='lancaFalta.html'>Faltas</a></li>
											  <li><a class='hvr-shutter-out-horizontal' href='lancaNota.html'>Notas</a></li>
										  </ul>
									  </li>
								  </ul>
							  </div>
						    </div>
						    <div id='page-wrapper'>
							  <div class='row'>
								  <div class='col-lg-12'>
									  <div class='jumbotron'>
										  <center>
										  <h1><i class='fa fa-graduation-cap fa-3x'></i></h1>
										  <p>	
											  Esta página ainda não está disponível.
										  </p>
										  <p>
											  <br><br>
											  <strong>Obrigado pela compreensão!</strong>
										  </p>
										  </center>
									  </div>
								  </div>
							  </div>
						    </div>
			";
			
			echo "
				<div id='page-wrapper'>
					<div class='row'>
						<div class='col-xs-12'>
							<a class='btn btn-danger btn3d' type='button' href='login.html'>Login <i class='fa fa-times'></i></a>
						</div>
					</div>
				</div>
			";

			echo "<br/>
			<div class='container'>
			  <div class='row'>
			  <hr>
				<div class='col-lg-12'>
				  <div class='col-md-12'>
					<p class='muted pull-right'>© 2016 Sistema Acadêmico. All rights reserved</p>
				  </div>
				</div>
			  </div>
			</div>

			<script src='../vendor/jquery/jquery.min.js'></script>
			<script src='../vendor/bootstrap/js/bootstrap.min.js'></script>
			<script src='../vendor/metisMenu/metisMenu.min.js'></script>
			<script src='../dist/js/sb-admin-2.js'></script>
			<script src='../vendor/bootstrapvalidator/dist/js/bootstrapValidator.js'></script>
			<script src='../dist/js/bootValidator.js'></script>
	
	    </body>
	</html>";
?>