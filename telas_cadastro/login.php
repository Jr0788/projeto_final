<<<<<<< HEAD
﻿<?php
	$strCon = "host='127.0.0.1' dbname='projetointegrador' port='5432' user='senac' password='senac123'";
	$con = pg_connect($strCon) or die ("Não foi possivel conectar ao servidor PostGreSQL"); 

	$logi = isset($_POST["tLogin"]) ? $_POST["tLogin"] : null;
	$senh = isset($_POST["pSenha"]) ? $_POST["pSenha"] : null;
=======
<?php
	$strCon = "host='127.0.0.1' dbname='projetointegrador' port='5432' user='senac' password='senac123'";
	$con = pg_connect($strCon) or die ("N�o foi possivel conectar ao servidor PostGreSQL"); 

	$logi = isset($_GET["tLogin"]) ? $_GET["tLogin"] : null;
	$senh = isset($_GET["tSenha"]) ? $_GET["tSenha"] : null;
>>>>>>> origin/master
	
	$codi = md5($senh);
	echo "
	<!DOCTYPE html>
<<<<<<< HEAD
	<html lang='pt-br'>
		<head>
			<meta charset='utf-8'>
			<meta http-equiv='X-UA-Compatible' content='IE=edge'>
			<meta name='viewport' content='width=device-width, initial-scale=1'>
			<meta name='description' content=''>
			<meta name='author' content=''>
			<title>Sistema Acadêmico</title>
			<link href='../projeto/vendor/bootstrap/css/bootstrap.min.css' rel='stylesheet'>
			<link href='../projeto/vendor/metisMenu/metisMenu.min.css' rel='stylesheet'>
			<link href='../projeto/dist/css/sb-admin-2.css' rel='stylesheet'>
			<link href='../projeto/vendor/font-awesome/css/font-awesome.min.css' rel='stylesheet' type='text/css'>
			<link href='../projeto/vendor/bootstrapvalidator/dist/css/bootstrapValidator.css' rel='stylesheet'>
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
=======
	  <html lang='pt-br'>
		<head>
			<meta http-equiv='X-UA-Compatible' content='IE=edge'>
			<meta name='viewport' content='width=device-width, initial-scale=1'>
			<title>projeto final</title>
			<link href='css/bootstrap.min.css' rel='stylesheet'>
		</head>
		<body> 
		  <nav class='navbar navbar-inverse navbar-fixed-top'>
			<div class='container-fluid'>
				<div class='navbar-header'>
					<button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#navbar' aria-expanded='false' 
							aria-controls='navbar'>
						<span class='sr-only'>Toggle navigation</span>
					</button>
					<a class='navbar-brand' href='#'>Sistema de Gerenciamento do Projeto Integrador</a>
				</div>
			</div>
		  </nav>
		  <br/><br/>
	";
>>>>>>> origin/master
	
		if($con){
			$consulta = "SELECT * FROM usuario WHERE login = '" . $logi . "'";
			$resultado = pg_query($con, $consulta);
			$row=pg_fetch_row($resultado);
					
			if($row[1]==$codi){
				if($row[4]=='A'){
					if($row[3]=='C'){
						echo"
<<<<<<< HEAD
						  <div class='navbar-default sidebar' role='navigation'>
							<div class='sidebar-nav navbar-collapse'>
								<ul class='nav' id='side-menu'>
									<li>
										<a class='hvr-underline-from-center' href='login.html'><i class='fa fa-home fa-fw'></i> Home</a>
									</li>
									<li>
										<a class='hvr-underline-from-center' href='#'><i class='fa fa-edit fa-fw'></i> Cadastro<span class='fa arrow'></span></a>
										<ul class='nav nav-second-level'>
											<li><a class='hvr-shutter-out-horizontal' href='cadUsuario.html'>Usuário</a></li>
											<li><a class='hvr-shutter-out-horizontal' href='cadAluno.html'>Aluno</a></li>
											<li><a class='hvr-shutter-out-horizontal' href='cadCurso.html'>Curso</a></li>
											<li><a class='hvr-shutter-out-horizontal' href='cadDisciplina.html'>Disciplina</a></li>
										</ul>
									</li>
									<li>
										<a class='hvr-underline-from-center' href='#'><i class='fa fa-wrench fa-fw'></i> Alteração<span class='fa arrow'></span></a>
										<ul class='nav nav-second-level'>
											<li><a class='hvr-shutter-out-horizontal' href='altUsuario.html'>Usuário</a></li>
											<li><a class='hvr-shutter-out-horizontal' href='altAluno.html'>Aluno</a></li>
											<li><a class='hvr-shutter-out-horizontal' href='altCurso.html'>Curso</a></li>
											<li><a class='hvr-shutter-out-horizontal' href='altDisciplina.html'>Disciplina</a></li>
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
										<p>	Perfil Coordenador!<br/><br/>
											Selecione no menu a esquerda uma das opções disponíveis.
										</p>
										<p>
											<br><br>
											<strong>Boa navegação e volte sempre!</strong> <i class='fa fa-smile-o fa-2x'></i>
										</p>
										</center>
									</div>
								</div>
							</div>
						  </div>
=======
						<div id='main' class='container-fluid'>
							<h3 class='page-header'>Coordenador</h3>
						</div>
						<div id='actions' class='row'>
						    <div class='col-md-12'>
							    &emsp;&emsp;&emsp;<a href='cadUsuario.html' class='btn btn-default'>Cadastro de Usuario</a>&emsp;&emsp;
							    &emsp;&emsp;&emsp;<a href='cadAluno.html' class='btn btn-default'>Cadastro de Aluno</a>&emsp;&emsp;
							    &emsp;&emsp;&emsp;<a href='cadCurso.html' class='btn btn-default'>Cadastro de Curso</a>&emsp;&emsp;
							    &emsp;&emsp;&emsp;<a href='cadDisciplina.html' class='btn btn-default'>Cadastro de Disciplina</a><br/><br/>
							</div>
						</div>
>>>>>>> origin/master
						";
					}else{
						if($row[3]=='G'){
						  echo"
<<<<<<< HEAD
						    <div class='navbar-default sidebar' role='navigation'>
							  <div class='sidebar-nav navbar-collapse'>
								  <ul class='nav' id='side-menu'>
									  <li>
										  <a class='hvr-underline-from-center' href='login.html'><i class='fa fa-home fa-fw'></i> Home</a>
									  </li>
									  <li>
										  <a class='hvr-underline-from-center' href='#'><i class='fa fa-edit fa-fw'></i> Cadastro<span class='fa arrow'></span></a>
										  <ul class='nav nav-second-level'>
											  <li><a class='hvr-shutter-out-horizontal' href='cadProjeto.html'>Projeto</a></li>
											  <li><a class='hvr-shutter-out-horizontal' href='defDisciplina.html'>Definir Disciplina</a></li>
											  <li><a class='hvr-shutter-out-horizontal' href='cadGrupo.html'>Grupo</a></li>
											  <li><a class='hvr-shutter-out-horizontal' href='defAluno.html'>Definir Alunos</a></li>
										  </ul>
									  </li>
									  <li>
										  <a class='hvr-underline-from-center' href='#'><i class='fa fa-wrench fa-fw'></i> Alteração<span class='fa arrow'></span></a>
										  <ul class='nav nav-second-level'>
											  <li><a class='hvr-shutter-out-horizontal' href='altProjeto.html'>Usuário</a></li>
											  <li><a class='hvr-shutter-out-horizontal' href='altDefDisciplina.html'>Aluno</a></li>
											  <li><a class='hvr-shutter-out-horizontal' href='altGrupo.html'>Curso</a></li>
											  <li><a class='hvr-shutter-out-horizontal' href='altDefAluno.html'>Disciplina</a></li>
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
										  <p>	Perfil Gerente de Projeto Integrador!<br/><br/>
											  Selecione no menu a esquerda uma das opções disponíveis.
										  </p>
										  <p>
											  <br><br>
											  <strong>Boa navegação e volte sempre!</strong> <i class='fa fa-smile-o fa-2x'></i>
										  </p>
										  </center>
									  </div>
								  </div>
							  </div>
						    </div>
=======
						  <div id='main' class='container-fluid'>
							<h3 class='page-header'>Gerente de Projeto Integrador</h3>
						  </div>
						  <div id='actions' class='row'>
						    <div class='col-md-12'>
							    &emsp;&emsp;&emsp;<a href='cadProjeto.html' class='btn btn-default'>Cadastro de Projeto</a>&emsp;&emsp;
							    &emsp;&emsp;&emsp;<a href='defDisciplina.html' class='btn btn-default'>Definir Disciplinas</a>&emsp;&emsp;
							    &emsp;&emsp;&emsp;<a href='cadGrupo.html' class='btn btn-default'>Cadastro de Grupo</a>&emsp;&emsp;
							    &emsp;&emsp;&emsp;<a href='defAluno.html' class='btn btn-default'>Definir Alunos</a><br/><br/>
							</div>
						  </div>
>>>>>>> origin/master
						  ";
						}else{
							$resultado = pg_query ($con , "select * from aluno order by 2");
							echo"
							<div id='main' class='container-fluid'>
								<h3 class='page-header'>Professor</h3>
							</div>
							<div id='actions' class='row'>
								<div class='col-md-12'>";
								  echo "&emsp;&emsp; <h3>&emsp; Lancar nota de alunos: </h3><br/><br/>
								  <table border='1'>
								  <tr><th>Matricula</th><th>Nome</th><th>Nota</th></tr>";
								  while ($row=pg_fetch_row($resultado)) {
									echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td><input type='number' name='nNota' id='nNota' min='0' max='10'><br/></td></tr>";
								  }
								  echo "</table>
								  <br/><br/>
								</div>
							</div>
							";
						}
					}
				}else{
					echo "
					<div class=col-md-12>
				      <h3 calss=page-header>&emsp;&emsp;&emsp; Usuario Inativo.</h3>
					</div>";
				}
			}else{
				echo "<br/><br/>";
				echo "
				  <div class=col-md-12>
				    <h3 class=page-header>&emsp;&emsp;Dados Incorretos. <br/> &emsp;&emsp;Acesso negado!! <br/><br/> &emsp;&emsp;Tente novamente.</h3>
				  </div>";
			}
		}else{
			echo "<br/>
			<div class=col-md-12>
<<<<<<< HEAD
			    <h3 class=page-header>&emsp;&emsp;<br/><br/>Não foi possível conectar com o banco.</h3>
			</div>";
		}
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

			<script src='../projeto/vendor/jquery/jquery.min.js'></script>
			<script src='../projeto/vendor/bootstrap/js/bootstrap.min.js'></script>
			<script src='../projeto/vendor/metisMenu/metisMenu.min.js'></script>
			<script src='../projeto/dist/js/sb-admin-2.js'></script>
			<script src='../projeto/vendor/bootstrapvalidator/dist/js/bootstrapValidator.js'></script>
			<script src='../projeto/dist/js/bootValidator.js'></script>
	
	    </body>
	</html>";
=======
			    <h3 class=page-header>&emsp;&emsp;<br/><br/>N�o foi poss�vel conectar com o banco.</h3>
			</div>";
		}
				echo "<br/>
				<div id=actions class=row>
					<div class=col-md-12>
						<a href=login.html class='btn btn-default'>Voltar</a>
						<a href=login.html class='btn btn-default'>Pagina Inicial</a>
					</div>
				</div>
		  <script src='js/jquery.min.js'></script>
		  <script src='js/bootstrap.min.js'></script>
	    </body>
	  </html>";						
>>>>>>> origin/master
?>