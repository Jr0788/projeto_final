<?php
	$strCon = "host='127.0.0.1' dbname='projetointegrador' port='5432' user='senac' password='senac123'";
	$con = pg_connect($strCon) or die ("Não foi possivel conectar ao servidor PostGreSQL"); 

	$logi = isset($_GET["tLogin"]) ? $_GET["tLogin"] : null;
	$senh = isset($_GET["tSenha"]) ? $_GET["tSenha"] : null;
	
	$codi = md5($senh);
	echo "
	<!DOCTYPE html>
	  <html lang='pt-br'>
		<head>
			<meta http-equiv='X-UA-Compatible' content='IE=edge'>
			<meta name='viewport' content='width=device-width, initial-scale=1'>
			<title>projeto final</title>
			<link href='css/bootstrap.min.css' rel='stylesheet'>
		</head>
		<body> 
		  <nav class='navbar navbar-inverse navbar-fixed-top'>
			<div class='container-fluid'>
				<div class='navbar-header'>
					<button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#navbar' aria-expanded='false' 
							aria-controls='navbar'>
						<span class='sr-only'>Toggle navigation</span>
					</button>
					<a class='navbar-brand' href='#'>Sistema de Gerenciamento do Projeto Integrador</a>
				</div>
			</div>
		  </nav>
		  <br/><br/>
	";
	
		if($con){
			$consulta = "SELECT * FROM usuario WHERE login = '" . $logi . "'";
			$resultado = pg_query($con, $consulta);
			$row=pg_fetch_row($resultado);
					
			if($row[1]==$codi){
				if($row[4]=='A'){
					if($row[3]=='C'){
						echo"
						<div id='main' class='container-fluid'>
							<h3 class='page-header'>Coordenador</h3>
						</div>
						<div id='actions' class='row'>
						    <div class='col-md-12'>
							    &emsp;&emsp;&emsp;<a href='cadUsuario.html' class='btn btn-default'>Cadastro de Usuario</a>&emsp;&emsp;
							    &emsp;&emsp;&emsp;<a href='cadAluno.html' class='btn btn-default'>Cadastro de Aluno</a>&emsp;&emsp;
							    &emsp;&emsp;&emsp;<a href='cadCurso.html' class='btn btn-default'>Cadastro de Curso</a>&emsp;&emsp;
							    &emsp;&emsp;&emsp;<a href='cadDisciplina.html' class='btn btn-default'>Cadastro de Disciplina</a><br/><br/>
							</div>
						</div>
						";
					}else{
						if($row[3]=='G'){
						  echo"
						  <div id='main' class='container-fluid'>
							<h3 class='page-header'>Gerente de Projeto Integrador</h3>
						  </div>
						  <div id='actions' class='row'>
						    <div class='col-md-12'>
							    &emsp;&emsp;&emsp;<a href='cadProjeto.html' class='btn btn-default'>Cadastro de Projeto</a>&emsp;&emsp;
							    &emsp;&emsp;&emsp;<a href='defDisciplina.html' class='btn btn-default'>Definir Disciplinas</a>&emsp;&emsp;
							    &emsp;&emsp;&emsp;<a href='cadGrupo.html' class='btn btn-default'>Cadastro de Grupo</a>&emsp;&emsp;
							    &emsp;&emsp;&emsp;<a href='defAluno.html' class='btn btn-default'>Definir Alunos</a><br/><br/>
							</div>
						  </div>
						  ";
						}else{
							$resultado = pg_query ($con , "select * from aluno order by 2");
							echo"
							<div id='main' class='container-fluid'>
								<h3 class='page-header'>Professor</h3>
							</div>
							<div id='actions' class='row'>
								<div class='col-md-12'>";
								  echo "&emsp;&emsp; <h3>&emsp; Lancar nota de alunos: </h3><br/><br/>
								  <table border='1'>
								  <tr><th>Matricula</th><th>Nome</th><th>Nota</th></tr>";
								  while ($row=pg_fetch_row($resultado)) {
									echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td><input type='number' name='nNota' id='nNota' min='0' max='10'><br/></td></tr>";
								  }
								  echo "</table>
								  <br/><br/>
								</div>
							</div>
							";
						}
					}
				}else{
					echo "
					<div class=col-md-12>
				      <h3 calss=page-header>&emsp;&emsp;&emsp; Usuario Inativo.</h3>
					</div>";
				}
			}else{
				echo "<br/><br/>";
				echo "
				  <div class=col-md-12>
				    <h3 class=page-header>&emsp;&emsp;Dados Incorretos. <br/> &emsp;&emsp;Acesso negado!! <br/><br/> &emsp;&emsp;Tente novamente.</h3>
				  </div>";
			}
		}else{
			echo "<br/>
			<div class=col-md-12>
			    <h3 class=page-header>&emsp;&emsp;<br/><br/>Não foi possível conectar com o banco.</h3>
			</div>";
		}
				echo "<br/>
				<div id=actions class=row>
					<div class=col-md-12>
						<a href=login.html class='btn btn-default'>Voltar</a>
						<a href=login.html class='btn btn-default'>Pagina Inicial</a>
					</div>
				</div>
		  <script src='js/jquery.min.js'></script>
		  <script src='js/bootstrap.min.js'></script>
	    </body>
	  </html>";						
?>