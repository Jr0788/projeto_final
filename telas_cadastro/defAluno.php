<?php
	$strCon = "host='127.0.0.1' dbname='projetointegrador' port='5432' user='senac' password='senac123'";
	$con = pg_connect($strCon) or die ("Não foi possivel conectar ao servidor PostGreSQL"); 

	$mat = isset($_POST["tMat"]) ? $_POST["tMat"] : null;
	$idg = isset($_POST["nId"]) ? $_POST["nId"] : null;
	$not = isset($_POST["nNota"]) ? $_POST["nNota"] : null;
	
	echo "<!DOCTYPE html>
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
								<li><a class='hvr-shutter-out-horizontal' href='altProjeto.html'>Projeto</a></li>
								<li><a class='hvr-shutter-out-horizontal' href='altDefDisciplina.html'>Disciplina do Projeto</a></li>
								<li><a class='hvr-shutter-out-horizontal' href='altGrupo.html'>Grupo</a></li>
								<li><a class='hvr-shutter-out-horizontal' href='altDefAluno.html'>Aluno do Grupo</a></li>
							</ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
		<div id='page-wrapper'>
            <div class='row'>
                <div class='col-lg-12'>
                    <h1 class='page-header'>Cadastro de Aluno no Grupo</h1>
                </div>
            </div>";
			if($con){
				$veraluno = "SELECT * FROM aluno WHERE matricula = '" .$mat . "' ";
				$okaluno = pg_query($con, $veraluno);
				$caluno = pg_num_rows($okaluno);
				if($caluno > 0){
					$vergrupo = "SELECT * FROM grupo WHERE id = '" .$idg . "' ";
					$okgrupo = pg_query($con, $vergrupo);
					$cgrupo = pg_num_rows($okgrupo);
					if($cgrupo > 0){
						$consulta = "SELECT * FROM participa WHERE matricula = '" . $mat . "' AND id_grupo = '" . $idg . "' ";
						$resultado = pg_query($con, $consulta);
						$num = pg_num_rows($resultado);
						
						if($num > 0){
							echo "
							<div class='row'>
								<div class='col-lg-12'>
									<div class='jumbotron'>
										<center>
											<h1><i class='fa fa-graduation-cap fa-3x'></i></h1>
											<p>	Registro de grupo + aluno já existe.<br/><br/>
												Tente novamente.
											</p>
										</center>
									</div>
								</div>
							</div>";
						}else{
							$contagrupo = "SELECT matricula FROM participa WHERE id_grupo = '" .$idg . "' ";
							$okconta = pg_query($con, $contagrupo);
							$conta = pg_num_rows($okconta);
							if($conta >= 4){
								echo "
								<div class='row'>
									<div class='col-lg-12'>
										<div class='jumbotron'>
											<center>
												<h1><i class='fa fa-graduation-cap fa-3x'></i></h1>
												<p>	Grupo já atingiu limite de 4 participantes.<br/><br/>
													Tente outro grupo.
												</p>
											</center>
										</div>
									</div>
								</div>";
							}else{
								$comando= "INSERT INTO participa(matricula, id_grupo, nota) VALUES "  
									. "('" . $mat . "'," 
									. "'" . $idg . "',"
									. "'" . $not . "')";
									
								$resultado = pg_query($con, $comando);
								echo"
								<div class='row'>
									<div class='col-lg-12'>
										<div class='jumbotron'>
											<center>
												<h1><i class='fa fa-graduation-cap fa-3x'></i></h1>
												<p>	Registro realizado com sucesso!<br/>
												</p>
											</center>
										</div>
									</div>
								</div>";
							}
						}
					}else{
						echo "
						<div class='row'>
							<div class='col-lg-12'>
								<div class='jumbotron'>
									<center>
										<h1><i class='fa fa-graduation-cap fa-3x'></i></h1>
										<p>	Id do grupo nao localizada.<br/><br/>
											Tente novamente.
										</p>
									</center>
								</div>
							</div>
						</div>";
					}
				}else{
					echo "
						<div class='row'>
							<div class='col-lg-12'>
								<div class='jumbotron'>
									<center>
										<h1><i class='fa fa-graduation-cap fa-3x'></i></h1>
										<p>	Matricula do aluno nao localizada.<br/><br/>
											Tente novamente.
										</p>
									</center>
								</div>
							</div>
						</div>";
				}
			}else{
				echo"
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
				</div>";
			}
			echo "
			<div class='row'>
				<div class='col-xs-12'>
					<a class='btn btn-danger btn3d' type='button' href='defAluno.html'>Voltar <i class='fa fa-times'></i></a>
					<a class='btn btn-danger btn3d' type='button' href='login.html'>Cancelar <i class='fa fa-times'></i></a>
				</div>
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