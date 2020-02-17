<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Registro Cliente</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<link rel="stylesheet" type="text/css" href="../css/registro.css">
</head>
<body>
<?php
	include("nav.php");
?>
<!--Contenido-->
<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
			Tipo de cliente
		</div>
		<div class="col-md-3">
			<select id="ddlTipoCliente" name="ddlTipoCliente" class="form-control" onchange="cambiarTipoCliente()">
				<option>Particular</option>
				<option selected>Empresa</option>
			</select>
		</div>
		<div class="col-md-6"></div>
	</div><hr>
	<div class="row">
		<div id="img-registro" class="col-md-6 hidden-sm">
			<img src="../imagenes/img-registro-empresa.jpg">
		</div>
		<div id="formulario-registro" class="col-md-12 col-lg-6 text-center">
			<form id="form-registro" action="../controlador/registrar_cliente_empresa.php" method="post">
				<h2 class="text-center titulo"><strong>Registro</strong> de cliente</h2>
				<input type="text" name="txt-rut-empresa" class="form-control" placeholder="Rut Empresa" required><br>
				<input type="text" name="txt-nombre-empresa" class="form-control" placeholder="Nombre Empresa" required><br>
				<input type="password" name="txt-clave" class="form-control" placeholder="Clave" required><br>
				<input type="text" name="txt-direccion" class="form-control" placeholder="Dirección Empresa" required><br>
				<hr>
				<input type="text" name="txt-rut-contacto" class="form-control" placeholder="Rut persona de contacto" required><br>
				<input type="text" name="txt-nombre-contacto" class="form-control" placeholder="Nombre de contacto" required><br>
				<input type="email" name="txt-email" class="form-control" placeholder="Email de contacto" required><br>
				<input type="tel" name="txt-telefono" class="form-control" placeholder="Teléfono de contacto" required><br>
				<input type="checkbox" name="chkTerminos" class="form-check-input" value="" required>Acepto los <a href="#">Términos y condiciones</a><br>
				<button type="submit" class="btn btn-primary btn-lg">Registrarse</button><br>

			</form>
			<span>¿Ya tienes una cuenta? <a href="">Inicia Sesión acá</a>.</span>
		</div>
	</div>
</div>
<!--Footer-->
<?php
	include("footer.php");
?>
<script src="../js/cambiarTipoCliente.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>