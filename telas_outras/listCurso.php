<?php
	$strCon = "host='127.0.0.1' dbname='projetointegrador' port='5432' user='senac' password='senac123'";
	$con = pg_connect($strCon) or die ("N�o foi possivel conectar ao servidor PostGreSQL"); 

	$ordem = isset($_GET["rOrdem"]) ? $_GET["rOrdem"] : null;
	
	if($ordem == 'U'){
		$resultado = pg_query ($con , "select * from curso order by 1");
	}
	elseif($ordem == 'N'){
		$resultado = pg_query ($con , "select * from curso order by 2");
	}
	else{
		$resultado = pg_query ($con , "select * from curso order by 3");
	}

	echo "<!DOCTYPE html>
	<html lang=pt-br>
		<head>
			<meta http-equiv='X-UA-Compatible' content='IE=edge'>
			<meta name='viewport' content='width=device-width, initial-scale=1'>
			<title>projeto final</title>
			<link href='css/bootstrap.min.css' rel='stylesheet'>
			<link href='css/style.css' rel='stylesheet'>
		</head>
		<script language=javascript src=func_java.js></script>
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
						<a class='navbar-brand' href='#'>Tela Consulta</a>
					</div>
					<div id='navbar' class='navbar-collapse collapse'>
						<ul class='nav navbar-nav navbar-right'>
						<li><a href='#'>In�cio</a></li>
						<li><a href='#'>Op��es</a></li>
						</ul>
					</div>
				</div>
			</nav>
			<br/><br/>
			<div id='main' class='container-fluid'>
				<h3 class='page-header'>Consulta Curso</h3>
			</div>
			<div class='form-group col-md-4'>
				Veja abaixo a Lista:<br/><br/>
				<table border='1'>
					<tr><th>Numero&emsp;</th><th>Nome&emsp;</th><th>Sigla&emsp;</th></tr>";
					while ($row=pg_fetch_row($resultado)) {
					  echo "<tr>";
					  echo "<td>".$row[0]."&emsp;</td><td>".$row[1]."&emsp;</td><td>".$row[2]."&emsp;</td>";
					  echo "</tr>";
					}
				echo "</table>";
				pg_close($con);
				echo "<br/>";
			echo "</div>
			  			  
			<div id='actions' class='row'>
				<div class='col-md-12'>
					&emsp;&emsp;&emsp;&emsp;<a href=listCurso.html class='btn btn-default'> Voltar</a>
					&emsp;&emsp;&emsp;&emsp;<a href=login.html class='btn btn-default'> Pagina Inicial</a><br/><br/>
				</div>
			</div>
			<script src='js/jquery.min.js'></script>
			<script src='js/bootstrap.min.js'></script>
		</body>
	</html>";
?>