<?php
	$strCon = "host='127.0.0.1' dbname='projetointegrador' port='5432' user='senac' password='senac123'";
	$con = pg_connect($strCon) or die ("Não foi possivel conectar ao servidor PostGreSQL"); 

	$mat = isset($_GET["tMat"]) ? $_GET["tMat"] : null;

	echo "<!DOCTYPE html>
	<html lang=pt-br>
		<head>
			<meta http-equiv='X-UA-Compatible' content='IE=edge'>
			<meta name='viewport' content='width=device-width, initial-scale=1'>
			<title>projeto final</title>
			<link href='css/bootstrap.min.css' rel='stylesheet'>
		</head>
		<script language=javascript src=func_java.js></script>
		<body>
			<nav class='navbar navbar-inverse navbar-fixed-top'>
				<div class='container-fluid'>
					<div class='navbar-header'>
						<button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#navbar' aria-expanded='false' aria-controls='navbar'>
							<span class='sr-only'>Toggle navigation</span>
						</button>
						<a class='navbar-brand' href='#'>Tela Exclusao</a>
					</div>
				</div>
			</nav>
			<br/><br/>
			<div id='main' class='container-fluid'>
				<h3 class='page-header'>Excluir Aluno</h3>
			</div>
			<div class='form-group col-md-4'>";
				if($con){
					$consulta = "SELECT * FROM aluno WHERE matricula = '" . $mat . "'";
					$resultado = pg_query($con, $consulta);
					$num = pg_num_rows($resultado);
							
					if ($num > 0){
						$consulta = "DELETE FROM aluno WHERE matricula = '" . $mat ."'";
						$resultado = pg_query($con, $consulta);
						echo "Aluno excluido com sucesso!<br/>";
					}else{
						echo "Aluno nao localizado!</br>";
						echo "Tente novamente.";
					}
				}else{
					echo "<br/>";
					echo "&emsp;&emsp;Não foi possível conectar com o banco.</br>";
				}
				pg_close($con);
				echo "<br/>";
			echo "</div>
			<div id='actions' class='row'>
				<div class='col-md-12'>
					&emsp;&emsp;&emsp;&emsp;<a href=excAluno.html class='btn btn-default'> Voltar</a>
					&emsp;&emsp;&emsp;&emsp;<a href=login.html class='btn btn-default'> Pagina Inicial</a><br/><br/>
				</div>
			</div>
			<script src='js/jquery.min.js'></script>
			<script src='js/bootstrap.min.js'></script>
		</body>
	</html>";
?>