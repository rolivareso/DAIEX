<?php
	include_once("../modelo/Usuario.php");
	include_once("../modelo/AnalisisMuestrasBD.php");
	include_once("../modelo/ResultadoAnalisisBD.php");
	include_once("../modelo/TipoAnalisisBD.php");
	session_start();

	$codigoCliente = $_GET["codigoCliente"];
	$idMuestra = $_GET["idMuestra"];

	$analisisMuestrasbd = new AnalisisMuestrasBD();
	$resultadoAnalisisbd = new ResultadoAnalisisBD();
	$resultadosAnalisis = $resultadoAnalisisbd->leer_resultados_analisis_muestra($idMuestra);

	$tipoAnalisisbd = new TipoAnalisisBD();

	for ($i=0; $i < count($resultadosAnalisis); $i++) { 
		$tiposAnalisis[] = $tipoAnalisisbd->leer_tipo_analisis($resultadosAnalisis[$i]->get_id_tipo_analisis());
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registro de resultado de análisis de una muestra</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>
<body>
<!--Nav-->
<?php
	include("nav.php");
?>
<!--Contenido-->
<div class="container">
	<h3 class="text-center titulo">Registro de resultado de análisis de una muestra</h3><br><br>
	<div class="row">
		<div class="col-md-3">
			<strong>Código de Cliente:</strong>
		</div>
		<div class="col-md-3">
			<?php echo $codigoCliente; ?>
		</div>
		<div class="col-md-6"></div>
	</div><br>
	<div class="row">
		<div class="col-md-3">
			<strong>Código de muestra:</strong>
		</div>
		<div class="col-md-3">
			<?php echo $idMuestra; ?>
		</div>
		<div class="col-md-6"></div>
	</div><br>
	<form action="../controlador/procesar_muestras.php" method="post">
	<input type="hidden" name="txt-id-muestra" value="<?php echo $idMuestra; ?>">
	<div class="row">
	<table class="table">
		<thead>
			<tr>
				<th>Tipo de Análisis</th>
				<th>PPM de muestra</th>
			</tr>
		</thead>
		<tbody>
			<?php
				for ($i=0; $i < count($tiposAnalisis); $i++) { 
					echo '<tr>
							<td>'.ucfirst($tiposAnalisis[$i]->get_nombre()).'</td>
							<td>
								<input type="number" name="txt-ppm-'.$tiposAnalisis[$i]->get_id_tipo_analisis().'" class="form-control">
							</td>
						</tr>';
				}

			?>
		</tbody>
	</table>
	</div><br><br><br>
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-3">
			<button type="submit" class="btn btn-secondary">Guardar Análisis</button>
		</div>
		<div class="col-md-3">
			<button type="button" class="btn btn-default" onclick="location = 'ver_muestras_no_procesadas.php' ">Cancelar</button>
		</div>
		<div class="col-md-2"></div>
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

