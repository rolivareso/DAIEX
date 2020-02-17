<?php
	include_once("../modelo/Usuario.php");
	include_once("../modelo/EmpresaBD.php");
	include_once("../modelo/ContactoBD.php");
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Perfil de usuario</title>
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

	$empresabd = new EmpresaBD();
	$empresa = $empresabd->leer_empresa_rut($usuario->get_rut_usuario());

	$contactobd = new ContactoBD();
	$contacto = $contactobd->buscar_contacto_empresa($empresa->get_codigo_empresa());

?>
<div id="datos-perfil" class="container">
	<h3 class="text-center titulo"><i class="fas fa-user"></i> Mi Perfil</h3>
	<!--Datos empresa-->
	<div class="row">
		<div class="col-md-3">
			<span>Código Empresa</span>
		</div>
		<div class="col-md-6">
			<?php echo "E-".$empresa->get_codigo_empresa(); ?>
		</div>
		<div class="col-md-3"></div>
	</div><br>
	<div class="row">
		<div class="col-md-3">
			<span>Rut Empresa</span>
		</div>
		<div class="col-md-6">
			<?php echo $empresa->get_rut_empresa(); ?>
		</div>
		<div class="col-md-3"></div>
	</div><br>
	<div class="row">
		<div class="col-md-3">
			<span>Nombre Empresa</span>
		</div>
		<div class="col-md-6">
			<?php echo $empresa->get_nombre_empresa(); ?>
		</div>
		<div class="col-md-3"></div>
	</div><br>
	<div class="row">
		<div class="col-md-3">
			<span>Dirección</span>
		</div>
		<div class="col-md-6">
			<?php echo $empresa->get_direccion_empresa(); ?>
		</div>
		<div class="col-md-3">
			<button type="button" class="btn btn-secondary" onclick="location = 'modificar_empresa.php'"> <i class="fas fa-edit"></i>Editar</a>	
		</div>
	</div><br>
	<hr>
	<!--Datos Contacto-->
	<div class="row">
		<div class="col-md-3">
			<span>Rut Cotacto</span>
		</div>
		<div class="col-md-6">
			<?php echo $contacto->get_rut_contacto(); ?>
		</div>
		<div class="col-md-3"></div>
	</div><br>
	<div class="row">
		<div class="col-md-3">
			<span>Nombre Contacto</span>
		</div>
		<div class="col-md-6">
			<?php echo $contacto->get_nombre_contacto(); ?>
		</div>
		<div class="col-md-3"></div>
	</div><br>
	<div class="row">
		<div class="col-md-3">
			<span>Email Contacto</span>
		</div>
		<div class="col-md-6">
			<?php echo $contacto->get_email_contacto(); ?>
		</div>
		<div class="col-md-3"></div>
	</div><br>
	<div class="row">
		<div class="col-md-3">
			<span>Teléfono Contacto</span>
		</div>
		<div class="col-md-6">
			<?php echo $contacto->get_telefono_contacto(); ?>
		</div>
		<div class="col-md-3">
			<button class="btn btn-secondary" onclick="location = 'modificar_contacto.php'"> <i class="fas fa-edit"></i>Editar</a>	
		</div>
	</div><br>
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