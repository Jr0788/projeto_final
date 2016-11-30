<?php
	$strCon = "host='127.0.0.1' dbname='projetointegrador' port='5432' user='senac' password='senac123'";
	$con = pg_connect($strCon) or die ("Não foi possivel conectar ao servidor PostGreSQL"); 

	$num = isset($_POST["nNum"]) ? $_POST["nNum"] : null;
	$ano = isset($_POST["nAno"]) ? $_POST["nAno"] : null;
	$sem = isset($_POST["nSem"]) ? $_POST["nSem"] : null;
	$mod = isset($_POST["tMod"]) ? $_POST["tMod"] : null;
	$dti = isset($_POST["dtIni"]) ? $_POST["dtIni"] : null;
	$dtf = isset($_POST["dtFim"]) ? $_POST["dtFim"] : null;
	$tem = isset($_POST["tTema"]) ? $_POST["tTema"] : null;
	$des = isset($_POST["tDesc"]) ? $_POST["tDesc"] : null;
	$ncu = isset($_POST["nCcurso"]) ? $_POST["nCcurso"] : null;
	
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
                    <h1 class='page-header'>Cadastro de Projeto</h1>
                </div>
            </div>
			";
			if($con){
				$consulta = "SELECT * FROM projeto WHERE numero = '" . $num . "' ";
				$resultado = pg_query($con, $consulta);
				$sel = pg_num_rows($resultado);
				if($sel > 0){
					echo "
					<div class='row'>
						<div class='col-lg-12'>
							<div class='jumbotron'>
								<center>
									<h1><i class='fa fa-graduation-cap fa-3x'></i></h1>
									<p>	Projeto já cadastrado.<br/><br/>
										Tente novamente.
									</p>
								</center>
							</div>
						</div>
					</div>
					";
				}else{
					$novaconsulta = "SELECT * FROM curso WHERE numero = '" . $ncu . "'";
					$novoresultado = pg_query($con, $novaconsulta);
					$novosel = pg_num_rows($novoresultado);
					if($novosel == 0){
						echo "
						<div class='row'>
							<div class='col-lg-12'>
								<div class='jumbotron'>
									<center>
										<h1><i class='fa fa-graduation-cap fa-3x'></i></h1>
										<p>	Número de curso informado não foi localizado.<br/><br/>
											Tente novamente.
										</p>
									</center>
								</div>
							</div>
						</div>
						";
					}else{
						$comando= "INSERT INTO projeto(numero, ano, semestre, modulo, dt_inicio, dt_termino, tema, descricao, num_curso) VALUES "  
							. "('" . $num . "'," 
							. "'" . $ano . "',"
							. "'" . $sem . "',"
							. "'" . $mod . "',"
							. "'" . $dti . "',"
							. "'" . $dtf . "',"
							. "'" . $tem . "',"
							. "'" . $des . "',"
							. "'" . $ncu . "')";
							
						$registro = pg_query($con, $comando);
						echo "
						<div class='row'>
							<div class='col-lg-12'>
								<div class='jumbotron'>
									<center>
										<h1><i class='fa fa-graduation-cap fa-3x'></i></h1>
										<p>	Projeto cadastrado com sucesso!<br/>
										</p>
									</center>
								</div>
							</div>
						</div>
						";
					}
				}
			}else{
				echo "
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
				";
			}
			echo "
			<div class='row'>
				<div class='col-xs-12'>
					<a class='btn btn-danger btn3d' type='button' href='cadProjeto.html'>Voltar <i class='fa fa-times'></i></a>
					<a class='btn btn-danger btn3d' type='button' href='login.html'>Cancelar <i class='fa fa-times'></i></a>
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