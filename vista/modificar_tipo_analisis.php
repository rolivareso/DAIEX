<?php
	include_once ('../modelo/UsuarioBD.php');
	include_once ('../modelo/TipoAnalisisBD.php');
	session_start();

	$id = $_POST["id"];

	$tipoAnalisisbd = new TipoAnalisisBD();
	$tipoAnalisis = $tipoAnalisisbd->leer_tipo_analisis($id);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Modificar Tipo de Análisis</title>
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
	<form action="../controlador/actualizar_tipo_analisis.php" method="post">
	<div class="row">
		<div class="col-md-6">
			<strong>ID</strong>
			<input type="text" name="txt-id" class="form-control" value="<?php echo $tipoAnalisis->get_id_tipo_analisis(); ?>" required readonly><br>
		</div><div class="col-md-6"></div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<strong>Nombre</strong>
			<input type="text" name="txt-nombre" class="form-control" value="<?php echo $tipoAnalisis->get_nombre(); ?>" required><br>
		</div><div class="col-md-6"></div>
	</div>
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-3">
			<button type="submit" class="btn btn-primary">Actualizar</button>
		</div>
		<div class="col-md-3">
			<button type="button" class="btn btn-default" onclick="location = 'mantenedor_tipos_analisis.php'">Cancelar</a>	
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