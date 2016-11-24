<?php
	$strCon = "host='127.0.0.1' dbname='projetointegrador' port='5432' user='senac' password='senac123'";
	$con = pg_connect($strCon) or die ("Não foi possivel conectar ao servidor PostGreSQL"); 

	$logi = isset($_POST["tLogin"]) ? $_POST["tLogin"] : null;
	$senh = isset($_POST["tSenha"]) ? $_POST["tSenha"] : null;
	$nome = isset($_POST["tNome"]) ? $_POST["tNome"] : null;
	$cate = isset($_POST["rCat"]) ? $_POST["rCat"] : null;
	$situ = isset($_POST["rSit"]) ? $_POST["rSit"] : null;
	
	$codi = md5($senh);
	
	echo "<!DOCTYPE html>
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
                            <a class='hvr-underline-from-center' href='index.html'><i class='fa fa-home fa-fw'></i> Home</a>
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
        </nav>
        <div id='page-wrapper'>
            <div class='row'>
                <div class='col-lg-12'>
                    <h1 class='page-header'>Alteração de usuario</h1>
                </div>
            </div>";
				if($con){
					$consulta = "SELECT * FROM usuario WHERE login = '" . $logi . "' ";
					$resultado = pg_query($con, $consulta);
					$num = pg_num_rows($resultado);
					
					if($num > 0){
						$comando= "UPDATE usuario SET senha='" 
							. $codi . "', nome='" 
							. $nome . "', categoria='" 
							. $cate . "', situacao='" 
							. $situ . "' WHERE login='" 
							. $logi . "'";
						$resultado = pg_query($con, $comando);
						echo "<br/><br/>
							<div class='row'>
								<div class='col-lg-12'>
									<h1 class='page-header'>Usuário alterado com sucesso!</h1>
								</div>
							</div>
						";						
					}else{
						echo "<br/><br/>
							<div class='row'>
								<div class='col-lg-12'>
									<h1 class='page-header'>Usuário não encontrado.</h1><br/>
									<h1 class='page-header'>Tente novamente.</h1>
								</div>
							</div>
						";
					}
				}else{
					echo "<br/><br/>
							<div class='row'>
								<div class='col-lg-12'>
									<h1 class='page-header'>Não foi possível conectar com o banco.</h1>
								</div>
							</div>
						";
				}
				echo "<br/>
				<div class='row'>
					<div class='col-xs-12'>
						<a class='btn btn-danger btn3d' type='button' href='altDisciplina.html'>Voltar <i class='fa fa-times'></i></a>
						<a class='btn btn-danger btn3d' type='button' href='login.html'>Cancelar <i class='fa fa-times'></i></a>
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
?>