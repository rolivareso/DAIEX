<?php
	include_once("../modelo/Usuario.php");
	include_once("../modelo/EmpresaBD.php");
	include_once("../modelo/ParticularBD.php");
	include_once("../modelo/TipoAnalisisBD.php");
	session_start();

	$empresabd = new EmpresaBD();
	$particularbd = new ParticularBD();

	$empresas = $empresabd->leer_todo_empresa();
	$particulares = $particularbd->leer_todo_particular();

	for ($i=0; $i < count($empresas); $i++) { 
		$clientes[] = "E-".$empresas[$i]->get_codigo_empresa();
	}

	for ($i=0; $i < count($particulares); $i++) { 
		$clientes[] = "P-".$particulares[$i]->get_codigo_particular();
	}

	//
	$tipoAnalisisbd = new TipoAnalisisBD();
	$tiposAnalisis = $tipoAnalisisbd->leer_todo_tipo_analisis();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Recepción de muestras</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<script type="text/javascript">
		function agregarAnalisis(){
			var analisis = document.formRecepcion.slcTipoAnalisis.value;

			location.href = "../controlador/agregar_analisis.php?analisis="+analisis;
		}
	</script>
</head>
<body>
<!--Nav-->
<?php
	include("nav.php");
?>
<!--Contenido-->
<div class="container">
	<h3 class="text-center titulo">Recepción de muestras</h3>
	<form id="formRecepcion" name="formRecepcion" action="../controlador/recepcionar_datos_muestra.php" method="post">
	<div class="row">
		<div class="col-md-6">
			<strong>Código cliente</strong>
			<select name="slcCodigoCliente" class="form-control">
				<?php
					for ($i=0; $i < count($clientes); $i++) { 
						echo '<option>'.$clientes[$i].'</option>';
					}

				?>
			</select><br>
		</div>
		<div class="col-md-6"></div>
	</div>
	<div class="row">
		<div class="col-md-6"><!--Temperatura-->
			<strong>Temperatura</strong>
			<input type="number" name="txtTemperatura" class="form-control" placeholder="Temperatura muestra" required><br>
		</div>
		<div class="col-md-6"></div>
	</div>
	<div class="row">
		<div class="col-md-6"><!--Cantidad-->
			<strong>Cantidad</strong>
			<input type="number" name="txtCantidad" class="form-control" placeholder="Cantidad muestra" required><br>
		</div>
		<div class="col-md-6"></div>
	</div><br><br>
	<div class="row">
		<div class="col-md-3">
			<button type="submit" class="btn btn-secondary">Continuar</button>
		</div>
		<div class="col-md-3">
			<button type="button" class="btn btn-default" onclick="location = 'inicio.php'">Cancelar</button>
		</div>
		<div class="col-md-6"></div>
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