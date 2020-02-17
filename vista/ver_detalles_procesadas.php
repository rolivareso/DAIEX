<?php
	include_once("../modelo/Usuario.php");
	include_once("../modelo/AnalisisMuestrasBD.php");
	include_once("../modelo/ResultadoAnalisisBD.php");
	include_once("../modelo/TipoAnalisisBD.php");
	session_start();
	$usuario = $_SESSION["sesionUsuario"];
	$idMuestra = $_GET["idMuestra"];
	
	$analisisMuestrasbd = new AnalisisMuestrasBD();
	$analisisMuestra = $analisisMuestrasbd->leer_analisis_muestras($idMuestra);

	if($analisisMuestra->get_codigo_empresa()!=0){
		$cliente = "E-".$analisisMuestra->get_codigo_empresa();
	}
	else{
		$cliente = "P-".$analisisMuestra->get_codigo_particular();	
	}

	$resultadoAnalisisbd = new ResultadoAnalisisBD();
	$resultadosAnalisis = $resultadoAnalisisbd->leer_resultados_analisis_muestra($idMuestra);

	$tipoAnalisisbd = new TipoAnalisisBD();
	$tiposAnalisis = $tipoAnalisisbd->leer_todo_tipo_analisis();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ver Detalles Muestra</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script type="text/javascript">
$(function () {
    $('#row-grafico').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Resultados del análisis'
        },
        subtitle: {
            text: 'Id Muestra: <?php echo $analisisMuestra->get_id_analisis_muestras(); ?>'
        },
        xAxis: {
            categories: [
            <?php
            	for ($i=0; $i < count($resultadosAnalisis); $i++) { 
					for ($c=0; $c < count($tiposAnalisis); $c++) { 
						if ($resultadosAnalisis[$i]->get_id_tipo_analisis() == $tiposAnalisis[$c]->get_id_tipo_analisis()) {
							$nombreTipoAnalisis = ucfirst($tiposAnalisis[$c]->get_nombre());
							break;
						}
					}
					
					echo "'".$nombreTipoAnalisis."', ";
				}

            ?>],
            
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'PPM (Partes por millón)',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ' ppm'
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'PPM',
            data: [
            <?php
            	for ($i=0; $i < count($resultadosAnalisis); $i++) { 
					
					echo $resultadosAnalisis[$i]->get_ppm().", ";
				}

            ?>
            ]
        }]
    });
});
	</script>
</head>
<body>
<!--js grafico-->
<script src="../js/highcharts.js"></script>
<script src="../js/modules/exporting.js"></script>
<!--Nav-->
<?php
	include("nav.php");
?>
<!--Contenido-->
<div class="container">
	<h3 class="text-center titulo">Resultados de la muestra</h3>
	<div class="row"><!--ID-->
		<div class="col-md-2"></div>
		<div class="col-md-3">
			<strong>Id Muestra</strong>
		</div>
		<div class="col-md-3">
			<?php echo $analisisMuestra->get_id_analisis_muestras(); ?>
		</div>
		<div class="col-md-4"></div>
	</div>
	<div class="row"><!--Fecha de recepción-->
		<div class="col-md-2"></div>
		<div class="col-md-3">
			<strong>Fecha de recepción</strong>
		</div>
		<div class="col-md-3">
			<?php echo $analisisMuestra->get_fecha_recepcion(); ?>
		</div>
		<div class="col-md-4"></div>
	</div>
	<div class="row"><!--Temperatura muestra-->
		<div class="col-md-2"></div>
		<div class="col-md-3">
			<strong>Temperatura muestra</strong>
		</div>
		<div class="col-md-3">
			<?php echo $analisisMuestra->get_temperatura_muestra()."°C"; ?>
		</div>
		<div class="col-md-4"></div>
	</div>
	<div class="row"><!--Cantidad-->
		<div class="col-md-2"></div>
		<div class="col-md-3">
			<strong>Cantidad</strong>
		</div>
		<div class="col-md-3">
			<?php echo $analisisMuestra->get_cantidad_muestra(); ?>
		</div>
		<div class="col-md-4"></div>
	</div>
	<div class="row"><!--Cliente-->
		<div class="col-md-2"></div>
		<div class="col-md-3">
			<strong>Cliente</strong>
		</div>
		<div class="col-md-3">
			<?php echo $cliente; ?>
		</div>
		<div class="col-md-4"></div>
	</div>
	<div class="row"><!--Rut empleado receptor-->
		<div class="col-md-2"></div>
		<div class="col-md-3">
			<strong>Rut empleado receptor</strong>
		</div>
		<div class="col-md-3">
			<?php echo $analisisMuestra->get_rut_empleado_recibe(); ?>
		</div>
		<div class="col-md-4"></div>
	</div><br>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>ID Análisis</th>
						<th>Tipo de Análisis</th>
						<th>Fecha en que se realizó</th>
						<th>PPM (Partes Por Millón)</th>
						<th>Técnico analista</th>
					</tr>
				</thead>
				<tbody>
					<?php
						for ($i=0; $i < count($resultadosAnalisis); $i++) { 
							for ($c=0; $c < count($tiposAnalisis); $c++) { 
								if ($resultadosAnalisis[$i]->get_id_tipo_analisis() == $tiposAnalisis[$c]->get_id_tipo_analisis()) {
									$nombreTipoAnalisis = ucfirst($tiposAnalisis[$c]->get_nombre());
									break;
								}
							}
							
							echo 
							'<tr>
								<td>'.$resultadosAnalisis[$i]->get_id_tipo_analisis().'</td>
								<td>'.$nombreTipoAnalisis.'</td>
								<td>'.$resultadosAnalisis[$i]->get_fecha_registro().'</td>
								<td>'.$resultadosAnalisis[$i]->get_ppm().' 	ppm</td>
								<td>'.$resultadosAnalisis[$i]->get_rut_empleado_analista().'</td>
							</tr>';
						}

					?>
				</tbody>
			</table>
		</div>
	</div><br><br><br>
	<div id="row-grafico" class="row"></div><br><br><br>
	<div class="row text-center">
		<div class="col-md-12">
			<button type="button" class="btn btn-default" onclick="location = 'javascript:history.back()' ">Volver</button>
		</div>
	</div>
</div>
</body>
<!--Footer-->
<?php
	include("footer.php");
?>
</body>
</html>