<?php
	include_once("../modelo/Usuario.php");
	include_once("../modelo/AnalisisMuestrasBD.php");
	include_once("../modelo/EmpresaBD.php");
	include_once("../modelo/ParticularBD.php");
	include_once("../modelo/ResultadoAnalisisBD.php");
	session_start();
	$usuario = $_SESSION["sesionUsuario"];

	$empresabd = new EmpresaBD();
	$particularbd = new ParticularBD();
	$analisisMuestrasbd = new AnalisisMuestrasBD();

	$empresa = $empresabd->leer_empresa_rut($usuario->get_rut_usuario());

	if($empresa != null){
		$codCliente = $empresa->get_codigo_empresa();
		$analisisMuestras = $analisisMuestrasbd->leer_analisis_muestras_cliente($codCliente);
	}
	else{
		$particular = $particularbd->leer_particular_rut($usuario->get_rut_usuario());
		$codCliente = $particular->get_codigo_particular();
		$analisisMuestras = $analisisMuestrasbd->leer_analisis_muestras_cliente($codCliente);
	}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ver mis muestras procesadas</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<link rel="stylesheet" type="text/css" href="../css/ver_estado_muestras.css">
</head>
<body>
<!--Nav-->
<?php
	include("nav.php");
?>
<!--Contenido-->
<div class="container">
	<h3 class="text-center titulo">Muestras Procesadas</h3>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>ID Muestra</th>
						<th>Fecha de recepción</th>
						<th>Temperatura</th>
						<th>Cantidad</th>
						<th>Cliente</th>
						<th>Receptor</th>
						<th>Estado</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php
						$resultadoAnalisisbd = new ResultadoAnalisisBD();

						for ($i=0; $i < count($analisisMuestras); $i++) { 
							$resultadosAnalisis = $resultadoAnalisisbd->leer_resultados_analisis_muestra($analisisMuestras[$i]->get_id_analisis_muestras());

							if($resultadosAnalisis[0]->get_estado()=="T"){
								$estadoMuestra = '<span class="msj-terminada">Terminada</span>';
								$enlaceDetalles = '<a href="ver_detalles_procesadas.php?idMuestra='.$analisisMuestras[$i]->get_id_analisis_muestras().'"">Ver detalles</a>';
							}
							else{
								$estadoMuestra = '<span class="msj-proceso">En proceso</span>';
								$enlaceDetalles = '';
							}

							if($analisisMuestras[$i]->get_codigo_empresa()!=0){
								$cliente = "E-".$analisisMuestras[$i]->get_codigo_empresa();
							}
							else{
								$cliente = "P-".$analisisMuestras[$i]->get_codigo_particular();	
							}
							echo 
							'<tr>
								<td>'.$analisisMuestras[$i]->get_id_analisis_muestras().'</td>
								<td>'.$analisisMuestras[$i]->get_fecha_recepcion().'</td>
								<td>'.$analisisMuestras[$i]->get_temperatura_muestra().'°C</td>
								<td>'.$analisisMuestras[$i]->get_cantidad_muestra().'</td>
								<td>'.$cliente.'</td>
								<td>'.$analisisMuestras[$i]->get_rut_empleado_recibe().'</td>
								<td>'.$estadoMuestra.'</td>
								<td>'.$enlaceDetalles.'</td>
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