<?php
	$strCon = "host='127.0.0.1' dbname='projetointegrador' port='5432' user='senac' password='senac123'";
	$con = pg_connect($strCon) or die ("Não foi possivel conectar ao servidor PostGreSQL"); 

	$matr = isset($_GET["tMat"]) ? $_GET["tMat"] : null;
	$nome = isset($_GET["tNome"]) ? $_GET["tNome"] : null;
	$sexo = isset($_GET["rSex"]) ? $_GET["rSex"] : null;
	$nasc = isset($_GET["dtNasc"]) ? $_GET["dtNasc"] : null;
	$cida = isset($_GET["tCidade"]) ? $_GET["tCidade"] : null;
	$esta = isset($_GET["tUf"]) ? $_GET["tUf"] : null;
	
	echo "<!DOCTYPE html>
	<html lang=pt-br>
		<head>
			<meta http-equiv=X-UA-Compatible content=IE=edge>
			<meta name=viewport content=width=device-width, initial-scale=1>
			<title>projeto final</title>

			<link href=css/bootstrap.min.css rel=stylesheet>
			<link href=css/style.css rel=stylesheet>
		</head>
		<body>
		
			<nav class='navbar navbar-inverse navbar-fixed-top'>
				<div class='container-fluid'>
					<div class='navbar-header'>
						<button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#navbar' aria-expanded='false' aria-controls='navbar'>
							<span class='sr-only'>Toggle navigation</span>
							<span class='icon-bar'></span>
							<span class='icon-bar'></span>
							<span class='icon-bar'></span>
						</button>
						<a class='navbar-brand' href='#'>Projeto Final</a>
					</div>
					<div id='navbar' class='navbar-collapse collapse'>
						<ul class='nav navbar-nav navbar-right'>
							<li><a href='#'>Inicio</a></li>
							<li><a href='#'>Opcoes</a></li>
						</ul>
					</div>
				</div>
			</nav>
			<br/><br/>
			<div id=main class=container-fluid>
			 <h3 class=page-header>Alteracao de Aluno</h3>
			</div>
			<div id=main class=container-fluid>
				<br/>";
				if($con){
					$consulta = "SELECT * FROM aluno WHERE matricula = '" . $matr . "' ";
					$resultado = pg_query($con, $consulta);
					$num = pg_num_rows($resultado);
					
					if($num > 0){
						$comando= "UPDATE aluno SET nome='"  
							. $nome . "', sexo='"
							. $sexo . "', dtnasc='"
							. $nasc . "', cidade='"
							. $cida . "', uf='"
							. $esta . "' WHERE matricula='"
							. $matr . "'"; 
						$resultado = pg_query($con, $comando);
						echo "<br/><br/>";
						echo "<h3 class=page-header><br/><br/>Aluno alterado com sucesso!</h3>";
					}else{
						echo "<br/><br/>";
						echo "<h3 class=page-header>&emsp;&emsp;Aluno nao encontrado.</h3>";
						echo "<h3 class=page-header>&emsp;&emsp;Tente novamente.</h3>";
					}
				}else{
					echo "<br/>
					<h3 class=page-header>&emsp;&emsp;<br/><br/>Não foi possível conectar com o banco.</h3>";
				}
				echo "<br/>
				<div id=actions class=row>
					<div class=col-md-12>
						<a href=altAluno.html class='btn btn-default'>Voltar</a>
						<a href=login.html class='btn btn-default'>Pagina Inicial</a>
					</div>
				</div>
			</div>
			<script src='js/jquery.min.js'></script>
			<script src='js/bootstrap.min.js'></script>
		</body>
	</html>";
?>