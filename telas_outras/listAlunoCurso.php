﻿<?php
	$strCon = "host='127.0.0.1' dbname='projetointegrador' port='5432' user='senac' password='senac123'";
	$con = pg_connect($strCon) or die ("Não foi possivel conectar ao servidor PostGreSQL"); 
	
	$resultado = pg_query ($con , "SELECT c.nome, a.nome FROM aluno a, participa p, grupo g, projeto pj, curso c WHERE a.matricula = p.matricula AND p.id_grupo = g.id AND g.num_proj = pj.numero AND pj.num_curso = c.numero GROUP BY c.nome, a.nome ORDER BY 1,2;");

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
			";
			
			echo"
			<div id='main' class='container-fluid'>
				<h3 class='page-header'>Lista Alunos/Curso</h3>
			</div>
			<div class='form-group col-md-4'>
				Veja abaixo a Lista:<br/><br/>
				<table border='1'>
					<tr><th>Curso&emsp;</th><th>Nome Aluno&emsp;</th></tr>";
					while ($row=pg_fetch_row($resultado)) {
					  echo "<tr>";
					  echo "<td>".$row[0]."&emsp;</td><td>".$row[1]."&emsp;</td>";
					  echo "</tr>";
					}
				echo "</table>";
				pg_close($con);
				echo "<br/>
			</div>
				<div class='row'>
					<div class='col-xs-12'>
						<a class='btn btn-info btn3d' type='button' href='login.html'>Voltar </a> <!-- <i class='fa fa-times'></i> -->
					</div>
				</div>

			<br/>
			<div class='container'>
			  <div class='row'>
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