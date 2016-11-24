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
			 <h3 class=page-header>Cadastro de Usuario</h3>
			</div>
			<div id=main class=container-fluid>
				<br/>";
				if($con){
					$consulta = "SELECT * FROM usuario WHERE login = '" . $logi . "' ";
					$resultado = pg_query($con, $consulta);
					$num = pg_num_rows($resultado);
					
					if($num > 0){
						echo "<br/><br/>";
						echo "<h3 class=page-header>&emsp;&emsp;Usuario jah cadastrado.</h3>";
						echo "<h3 class=page-header>&emsp;&emsp;Tente novamente.</h3>";
					}else{
						$comando= "INSERT INTO usuario(login, senha, nome, categoria, situacao) VALUES "  
							. "('" . $logi . "'," 
							. "'" . $codi . "',"
							. "'" . $nome . "',"
							. "'" . $cate . "',"
							. "'" . $situ . "')";
						$resultado = pg_query($con, $comando);
						echo "<br/><br/>";
						echo "<h3 class=page-header><br/><br/>Usuario cadastrado com sucesso!</h3>";
					}
				}else{
					echo "<br/>
					<h3 class=page-header>&emsp;&emsp;<br/><br/>Não foi possível conectar com o banco.</h3>";
				}
				echo "<br/>
				<div id=actions class=row>
					<div class=col-md-12>
						<a href=cadUsuario.html class='btn btn-default'>Voltar</a>
						<a href=login.html class='btn btn-default'>Pagina Inicial</a>
					</div>
				</div>
			</div>
			<script src='js/jquery.min.js'></script>
			<script src='js/bootstrap.min.js'></script>
		</body>
	</html>";
?>