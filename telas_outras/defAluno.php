<?php
	$strCon = "host='127.0.0.1' dbname='projetointegrador' port='5432' user='senac' password='senac123'";
	$con = pg_connect($strCon) or die ("Não foi possivel conectar ao servidor PostGreSQL"); 

	$mat = isset($_GET["tMat"]) ? $_GET["tMat"] : null;
	$idg = isset($_GET["nId"]) ? $_GET["nId"] : null;
	$not = isset($_GET["nNota"]) ? $_GET["nNota"] : null;
	
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
			 <h3 class=page-header>Alunos do grupo</h3>
			</div>
			<div id=main class=container-fluid>
				<br/>";
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
								echo "<br/><br/>";
								echo "<h3 class=page-header>&emsp;&emsp;Registro de grupo + aluno jah existe.</h3>";
								echo "<h3 class=page-header>&emsp;&emsp;Tente novamente.</h3>";
							}else{
								$comando= "INSERT INTO participa(matricula, id_grupo, nota) VALUES "  
									. "('" . $mat . "'," 
									. "'" . $idg . "',"
									. "'" . $not . "')";
									
								$resultado = pg_query($con, $comando);
								echo "<br/><br/>";
								echo "<h3 class=page-header><br/><br/>Registro realizado com sucesso!</h3>";
							}
						}else{
							echo "<h3 class=page-header>&emsp;&emsp;&emsp;Id do grupo nao localizada.</h3><br/>";
							echo "<h3 class=page-header>&emsp;&emsp;Tente novamente.</h3>";
						}
					}else{
						echo "<h3 class=page-header>&emsp;&emsp;&emsp;Matricula do aluno nao localizada.</h3><br/>";
						echo "<h3 class=page-header>&emsp;&emsp;Tente novamente.</h3>";
					}
				}else{
					echo "<br/>
					<h3 class=page-header>&emsp;&emsp;<br/><br/>Não foi possível conectar com o banco.</h3>";
				}
				echo "<br/>
				<div id=actions class=row>
					<div class=col-md-12>
						<a href=defAluno.html class='btn btn-default'>Novo Aluno</a>
						<a href=login.html class='btn btn-default'>Pagina Inicial</a>
					</div>
				</div>
			</div>
			<script src='js/jquery.min.js'></script>
			<script src='js/bootstrap.min.js'></script>
		</body>
	</html>";
?>