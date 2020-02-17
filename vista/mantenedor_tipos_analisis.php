<?php
	include_once ('../modelo/UsuarioBD.php');
	include_once ('../modelo/TipoAnalisisBD.php');
	session_start();

	$tipoAnalisisbd = new TipoAnalisisBD();
	$tiposAnalisis = $tipoAnalisisbd->leer_todo_tipo_analisis();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Gestión de Tipos de Análisis</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<link rel="stylesheet" type="text/css" href="../css/mantenedor_tipos_analisis.css">
</head>
<body>
<!--Nav-->
<?php
	include("nav.php");
?>
<div class="container">
	<h3 class="text-center titulo">Gestión de Tipos de análisis</h3>
	<h4 class="titulo">Registrar Tipo de Análisis</h4>
	<form action="../controlador/registrar_tipo_analisis.php" method="post">
	<div class="row">
		<div class="col-md-6">
			<strong>Nombre</strong>
			<input type="text" name="txt-nombre" class="form-control" placeholder="Nombre tipo de análisis" required><br>
		</div><div class="col-md-6"></div>
	</div>
	<button type="submit" class="btn btn-primary btn-lg">Registrar</button><br>
	</form>
</div>
<div class="container">
	<hr>
	<h4 class="titulo">Tipos de Análisis Registrados</h4>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-hover">
				<thead class="thead-dark">
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>Estado</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php
						for ($i=0; $i < count($tiposAnalisis); $i++) { 
							if($tiposAnalisis[$i]->get_estado_tipo_analisis() == "H"){
								$enlaceAccion = '<form action="../controlador/deshabilitar_tipo_analisis.php" method="post">
													<input type="hidden" name="id" value ="'.$tiposAnalisis[$i]->get_id_tipo_analisis().'"/>
													<button type="submit" class="btn btn-des">
														<i class="fas fa-arrow-down"></i> Deshabilitar
													</button>
												</form>';
							}
							else{
								$enlaceAccion = '<form action="../controlador/habilitar_tipo_analisis.php" method="post">
													<input type="hidden" name="id" value ="'.$tiposAnalisis[$i]->get_id_tipo_analisis().'"/>
													<button type="submit" class="btn btn-hab">
														<i class="fas fa-arrow-up"></i> Habilitar
													</button>
												</form>';
							}
							echo 
							'<tr>
								<td>'.$tiposAnalisis[$i]->get_id_tipo_analisis().'</td>
								<td>'.$tiposAnalisis[$i]->get_nombre().'</td>
								<td>
									<form action="modificar_tipo_analisis.php" method="post">
										<input type="hidden" name="id" value ="'.$tiposAnalisis[$i]->get_id_tipo_analisis().'"/>
										<button type="submit" class="btn btn-modificar">
											<i class="fas fa-edit"></i> Modificar
										</button>
									</form>
								</td>
								<td>'.$enlaceAccion.'</td>
							</tr>';
						}

					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!--Footer-->
<?php
	include("footer.php");
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>