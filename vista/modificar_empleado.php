<?php
	include_once("../modelo/Usuario.php");
	include_once("../modelo/Empleado.php");
	include_once("../modelo/EmpleadoBD.php");
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Modificar Datos</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<link rel="stylesheet" type="text/css" href="../css/perfil.css">
</head>
<body>
<!--Nav-->
<?php
	include("nav.php");
?>
<!--Contenido-->
<?php
	$usuario = $_SESSION["sesionUsuario"];
	$empleadobd = new EmpleadoBD();
	$empleado = $empleadobd->leer_empleado($usuario->get_rut_usuario());

?>
<div id="datos-perfil" class="container">
	<h3 class="text-center titulo"><i class="fas fa-user-edit"></i> Editar Datos</h3>
	<form action="../controlador/actualizar_empleado.php" method="post">
	<div class="row">
		<div class="col-md-3">
			<span>Rut</span>
		</div>
		<div class="col-md-6">
			<input type="text" name="txt-rut" class="form-control" value="<?php echo $empleado->get_rut_empleado(); ?>" required readonly>
		</div>
		<div class="col-md-3"></div>
	</div><br>
	<div class="row">
		<div class="col-md-3">
			<span>Nombre</span>
		</div>
		<div class="col-md-6">
			<input type="text" name="txt-nombre" class="form-control" required value="<?php echo $empleado->get_nombre_empleado(); ?>" required>
		</div>
		<div class="col-md-3"></div>
	</div><br>
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-3">
			<button type="submit" class="btn btn-secondary">Actualizar</a>	
		</div>
		<div class="col-md-3">
			<button type="button" class="btn btn-default" onclick="location = 'perfil_empleado.php'">Cancelar</a>	
		</div>
	</div>
	</form>
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