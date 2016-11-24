<?php
	$strCon = "host='127.0.0.1' dbname='projetointegrador' port='5432' user='senac' password='senac123'";
	$con = pg_connect($strCon) or die ("Não foi possivel conectar ao servidor PostGreSQL"); 

	$nump = isset($_GET["nNump"]) ? $_GET["nNump"] : null;
	$codd = isset($_GET["nNumd"]) ? $_GET["nNumd"] : null;
	$desc = isset($_GET["tDesc"]) ? $_GET["tDesc"] : null;
	
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
			 <h3 class=page-header>Disciplinas do modulo/projeto</h3>
			</div>
			<div id=main class=container-fluid>
				<br/>";
				if($con){
					$verproj = "SELECT * FROM projeto WHERE numero = '" .$nump . "' ";
					$okproj = pg_query($con, $verproj);
					$cproj = pg_num_rows($okproj);
					if($cproj > 0){
						$verdisc = "SELECT * FROM disciplina WHERE codigo = '" .$codd . "' ";
						$okdisc = pg_query($con, $verdisc);
						$cdisc = pg_num_rows($okdisc);
						if($cdisc > 0){
							$consulta = "SELECT * FROM composto WHERE num_proj = '" . $nump . "' AND cod_disc = '" . $codd . "' " ;
							$resultado = pg_query($con, $consulta);
							$num = pg_num_rows($resultado);
							if($num > 0){
								echo "<br/><br/>";
								echo "<h3 class=page-header>&emsp;&emsp;Registro de projeto + disciplina jah existe.</h3>";
								echo "<h3 class=page-header>&emsp;&emsp;Tente novamente.</h3>";
							}else{
								$comando= "INSERT INTO composto(num_proj, cod_disc, desc_atividade) VALUES "  
									. "('" . $nump . "'," 
									. "'" . $codd . "',"
									. "'" . $desc . "')";
									
								$resultado = pg_query($con, $comando);
								echo "<br/><br/>";
								echo "<h3 class=page-header><br/><br/>Registro realizado com sucesso!</h3>";
							}
						}else{
							echo "<h3 class=page-header>&emsp;&emsp;&emsp;Codigo de disciplina nao localizado.</h3><br/>";
							echo "<h3 class=page-header>&emsp;&emsp;Tente novamente.</h3>";
						}
					}else{
						echo "<h3 class=page-header>&emsp;&emsp;&emsp;Numero de projeto nao localizado.</h3><br/>";
						echo "<h3 class=page-header>&emsp;&emsp;Tente novamente.</h3>";
					}
				}else{
					echo "<br/>
					<h3 class=page-header>&emsp;&emsp;<br/><br/>Não foi possível conectar com o banco.</h3>";
				}
				echo "<br/>
				<div id=actions class=row>
					<div class=col-md-12>
						<a href=defDisciplina.html class='btn btn-default'>Nova Disciplina</a>
						<a href=login.html class='btn btn-default'>Pagina Inicial</a>
					</div>
				</div>
			</div>
			<script src='js/jquery.min.js'></script>
			<script src='js/bootstrap.min.js'></script>
		</body>
	</html>";
?>