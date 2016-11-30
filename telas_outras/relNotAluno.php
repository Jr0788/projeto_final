<?php
	$strCon = "host='127.0.0.1' dbname='projetointegrador' port='5432' user='senac' password='senac123'";
	$con = pg_connect($strCon) or die ("Não foi possivel conectar ao servidor PostGreSQL"); 
	
	$num = isset($_POST["nNum"]) ? $_POST["nNum"] : null;
	$ano = isset($_POST["nAno"]) ? $_POST["nAno"] : null;
	$sem = isset($_POST["nSem"]) ? $_POST["nSem"] : null;
		
echo"
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
		<div id='wrapper'>
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
				<div class='navbar-default sidebar' role='navigation'>
					<div class='sidebar-nav navbar-collapse'>
						<ul class='nav' id='side-menu'>
							<li><a class='hvr-underline-from-center' href='index.html'><i class='fa fa-home fa-fw'></i> Home</a></li>
							<li><a class='hvr-underline-from-center' href='#'><i class='fa fa-edit fa-fw'></i> Cadastro<span class='fa arrow'></span></a>
								<ul class='nav nav-second-level'>
									<li><a class='hvr-shutter-out-horizontal' href='cadUsuario.html'>Usuário</a></li>
									<li><a class='hvr-shutter-out-horizontal' href='cadAluno.html'>Aluno</a></li>
									<li><a class='hvr-shutter-out-horizontal' href='cadCurso.html'>Curso</a></li>
									<li><a class='hvr-shutter-out-horizontal' href='cadDisciplina.html'>Disciplina</a></li>
								</ul>
							</li>
							<li><a class='hvr-underline-from-center' href='#'><i class='fa fa-wrench fa-fw'></i> Alteração<span class='fa arrow'></span></a>
								<ul class='nav nav-second-level'>
									<li><a class='hvr-shutter-out-horizontal' href='altUsuario.html'>Usuário</a></li>
									<li><a class='hvr-shutter-out-horizontal' href='altAluno.html'>Aluno</a></li>
									<li><a class='hvr-shutter-out-horizontal' href='altCurso.html'>Curso</a></li>
									<li><a class='hvr-shutter-out-horizontal' href='altDisciplina.html'>Disciplina</a></li>
								</ul>
							</li>
							<li><a class='hvr-underline-from-center' href='#'><i class='fa fa-wrench fa-fw'></i> Relatórios<span class='fa arrow'></span></a>
								<ul class='nav nav-second-level'>
									<li><a class='hvr-shutter-out-horizontal' href='relNotAluno.html'>Nota/Aluno</a></li>
									<li><a class='hvr-shutter-out-horizontal' href='relProjSem.html'>Projeto/Semestre</a></li>
									<li><a class='hvr-shutter-out-horizontal' href='relGrupo.html'>Grupo/Curso</a></li>
									<li><a class='hvr-shutter-out-horizontal' href='relProjAluno.html'>Projeto/Aluno</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</nav>			
			<div id='page-wrapper'>
				<div class='row'>
					<div class='col-lg-12'>
						<h1 class='page-header'>Relação de alunos e notas por curso</h1>
					</div>
				</div>
				
				<!-- Emitir relação de aluno de um curso com sua respectiva nota. 
				É necessário escolher o curso, o ano e o semestre para imprimir o relatório. 
				No relatório devem ser mostrados esses dados, a matrícula do aluno, nome do aluno e nota do aluno. 
				Exibir em ordem alfabética.-->	
				
				<div class='row'>
	";
	
				if($con){
					$consulta = "SELECT a.matricula, a.nome, p.nota FROM aluno a, participa p, grupo g, projeto pj WHERE p.matricula = a.matricula AND g.id = p.id_grupo AND pj.numero = g.num_proj AND pj.ano=" . $ano . " AND pj.semestre=" . $sem . " AND pj.num_curso=" . $num . " ORDER BY 2";
					$resultado = pg_query($con, $consulta);
					$num = pg_num_rows($resultado);
					echo"
				    <div class='col-lg-12'>
					    <div class='panel panel-default'>
							<div class='panel-body'>
								<form id='table'>
									<table width='100%' class='table table-striped table-bordered table-hover' id='dataTables-example'>
										<thead>
											<tr>
												<th>Matrícula</th><th>Aluno</th><th>Nota</th>
											</tr>
										</thead>
										<tbody>";
											while ($row=pg_fetch_row($resultado)){
												echo "<tr class='odd gradeX'>";
												echo "<td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td>";
												echo "</tr>";
											}
											pg_close($con);
											echo "<br/>
										</tbody>
									</table>
								</form>
							</div>
						</div>
					</div>
				
					
					<div class='row'>
						<div class='col-xs-12'>
							<a class='btn btn-info btn3d' type='button' href='login.html'>Voltar </a> <!-- <i class='fa fa-times'></i> -->
						</div>
					</div>
				";
					
					
				}else{
					echo "
					<div id='page-wrapper'>
						<div class='row'>
							<div class='col-lg-12'>
								<div class='jumbotron'>
									<center>
									  <h1><i class='fa fa-graduation-cap fa-3x'></i></h1>
									  <p>	Não foi possível conectar com o banco.<br/><br/>
											Tente novamente.
									  </p>
									</center>
								</div>
							</div>
						</div>
					</div>";
				}
				echo"
				</div>
			</div>
			
		</div>
		
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