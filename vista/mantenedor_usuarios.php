<?php
	include_once ('../modelo/UsuarioBD.php');
	session_start();

	$usuariobd = new UsuarioBD();
	$usuarios = $usuariobd->leer_todo_usuario();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Gestión de Usuarios</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<link rel="stylesheet" type="text/css" href="../css/mantenedor_usuarios.css">
</head>
<body>
<!--Nav-->
<?php
	include("nav.php");
?>
<div class="container">
	<h3 class="text-center titulo">Gestión de Usuarios</h3>
	<h4 class="titulo">Registrar Empleado</h4>
	<form action="../controlador/registrar_empleado.php" method="post">
	<div class="row">
		<div class="col-md-6">
			<strong>Rut</strong>
			<input type="text" name="txt-rut" class="form-control" placeholder="Rut Empleado" required><br>
			<strong>Clave</strong>
			<input type="password" name="txt-clave" class="form-control" placeholder="Clave Empleado" required><br>
		</div>
		<div class="col-md-6">
			<strong>Nombre</strong>
			<input type="text" name="txt-nombre" class="form-control" placeholder="Nombre Empleado" required><br>
			<strong>Categoría</strong>
			<select name="slc-categoria" class="form-control">
				<option value="A">Administrador del sitio</option>
				<option value="R">Receptor de muestras</option>
				<option value="T">Técnico de Laboratorio</option>
			</select>
		</div>
	</div>
	<button type="submit" class="btn btn-primary btn-lg">Registrar</button><br>
	</form>
</div>
<div class="container">
	<hr>
	<h4 class="titulo">Usuarios Registrados</h4>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-hover">
				<thead class="thead-dark">
					<tr>
						<th>Rut</th>
						<th>Tipo de Usuario</th>
						<th>Estado</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php
						for ($i=0; $i < count($usuarios); $i++) { 
							switch ($usuarios[$i]->get_tipo_usuario()) {
								case 'A':
									$tipoUsuario = "Administrador del sitio";
									break;
								case 'R':
									$tipoUsuario = "Receptor de muestras";
									break;
								case 'T':
									$tipoUsuario = "Técnico de Laboratorio";
									break;
								case 'C':
									$tipoUsuario = "Cliente";
									break;
								default:
									break;
							}
							switch ($usuarios[$i]->get_estado_usuario()) {
								case 'H':
									$estado = "Habilitado";
									$enlaceAccion = '<form action="../controlador/deshabilitar_usuario.php" method="post">
													<input type="hidden" name="rut" value ="'.$usuarios[$i]->get_rut_usuario().'"/>
													<button type="submit" class="btn btn-des">
														<i class="fas fa-arrow-down"></i> Deshabilitar
													</button>
													</form>';
									break;
								case 'D':
									$estado = "Deshabilitado";
									$enlaceAccion = '<form action="../controlador/habilitar_usuario.php" method="post">
													<input type="hidden" name="rut" value ="'.$usuarios[$i]->get_rut_usuario().'"/>
													<button class="btn btn-hab">
														<i class="fas fa-arrow-up"></i> Habilitar
													</button>
													</form>';
									break;
								default:
									# code...
									break;
							}
							echo 
							'<tr>
								<td>'.$usuarios[$i]->get_rut_usuario().'</td>
								<td>'.$tipoUsuario.'</td>
								<td>'.$estado.'</td>
								<td>
									'.$enlaceAccion.'
								</td>
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