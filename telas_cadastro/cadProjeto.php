<?php
	$strCon = "host='127.0.0.1' dbname='projetointegrador' port='5432' user='senac' password='senac123'";
	$con = pg_connect($strCon) or die ("Não foi possivel conectar ao servidor PostGreSQL"); 

	$num = isset($_GET["nNum"]) ? $_GET["nNum"] : null;
	$ano = isset($_GET["nAno"]) ? $_GET["nAno"] : null;
	$sem = isset($_GET["nSem"]) ? $_GET["nSem"] : null;
	$mod = isset($_GET["tMod"]) ? $_GET["tMod"] : null;
	$dti = isset($_GET["dtIni"]) ? $_GET["dtIni"] : null;
	$dtf = isset($_GET["dtFim"]) ? $_GET["dtFim"] : null;
	$tem = isset($_GET["tTema"]) ? $_GET["tTema"] : null;
	$des = isset($_GET["tDesc"]) ? $_GET["tDesc"] : null;
	$ncu = isset($_GET["nCcurso"]) ? $_GET["nCcurso"] : null;
	
	echo "<!DOCTYPE html>
	<html lang=pt-br>
		<head>
			<meta http-equiv=X-UA-Compatible content=IE=edge>
			<meta name=viewport content=width=device-width, initial-scale=1>
			<title>projeto final</title>

			<link href=css/bootstrap.min.css rel=stylesheet>
		</head>
		<body>
			<nav class='navbar navbar-inverse navbar-fixed-top'>
				<div class='container-fluid'>
					<div class='navbar-header'>
						<button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#navbar' aria-expanded='false' aria-controls='navbar'>
							<span class='sr-only'>Toggle navigation</span>
						</button>
						<a class='navbar-brand' href='#'>Projeto Final</a>
					</div>
				</div>
			</nav>
			<br/><br/>
			<div id=main class=container-fluid>
			 <h3 class=page-header>Cadastro de Projeto</h3>
			</div>
			<div id=main class=container-fluid>
				<br/>";
				if($con){
					$consulta = "SELECT * FROM projeto WHERE numero = '" . $num . "' ";
					$resultado = pg_query($con, $consulta);
					$sel = pg_num_rows($resultado);
				
					if($sel > 0){
						echo "<br/><br/>";
						echo "<h3 class=page-header>&emsp;&emsp;Numero jah cadastrado.</h3>";
						echo "<h3 class=page-header>&emsp;&emsp;Tente novamente.</h3>";
					}else{
						$novaconsulta = "SELECT * FROM curso WHERE numero = '" . $ncu . "'";
						$novoresultado = pg_query($con, $novaconsulta);
						$novosel = pg_num_rows($novoresultado);
						if($novosel == 0){
							echo "<br/>";
							echo "<h3 class=page-header>&emsp;&emsp;Numero de curso informado nao foi localizado.</h3>";
							echo "<h3 class=page-header>&emsp;&emsp;Tente novamente.</h3>";
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
							echo "<br/>";
							echo "<h3 class=page-header><br/>Projeto cadastrado com sucesso!</h3>";
						}
					}
				}else{
					echo "<br/>
					<h3 class=page-header>&emsp;&emsp;<br/><br/>Não foi possível conectar com o banco.</h3>";
				}
				echo "<br/>
				<div id=actions class=row>
					<div class=col-md-12>
						<a href=cadProjeto.html class='btn btn-default'>Novo Projeto</a>
						<a href=login.html class='btn btn-default'>Pagina Inicial</a>
					</div>
				</div>
			</div>
			<script src='js/jquery.min.js'></script>
			<script src='js/bootstrap.min.js'></script>
		</body>
	</html>";
?>