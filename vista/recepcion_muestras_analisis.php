<?php
	include_once("../modelo/Usuario.php");
	include_once("../modelo/EmpresaBD.php");
	include_once("../modelo/ParticularBD.php");
	include_once("../modelo/TipoAnalisisBD.php");
	session_start();

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
	<div class="row">
		<div class="col-md-3">
			<strong>Código cliente:</strong>
		</div>
		<div class="col-md-3">
			<?php echo $_SESSION["codCliente"]; ?>
		</div>
		<div class="col-md-6"></div>
	</div><br>
	<div class="row">
		<div class="col-md-3">
			<strong>Temperatura:</strong>
		</div>
		<div class="col-md-3">
			<?php echo $_SESSION["temperatura"]; ?>°C
		</div>
		<div class="col-md-6"></div>
	</div><br>
	<div class="row">
		<div class="col-md-3">
			<strong>Cantidad:</strong>
		</div>
		<div class="col-md-3">
			<?php echo $_SESSION["cantidad"]; ?>
		</div>
		<div class="col-md-6"></div>
	</div><br><hr><br>
	<form id="formRecepcion" name="formRecepcion" action="../controlador/recepcionar_muestra.php" method="post">
	<div class="row">
		<div class="col-md-8">
			<strong>Tipo de análisis a realizar</strong>
			<select name="slcTipoAnalisis" class="form-control">
				<?php 
					for ($i=0; $i < count($tiposAnalisis); $i++) { 
						echo '<option value="'.$tiposAnalisis[$i]->get_id_tipo_analisis().'">'.ucfirst($tiposAnalisis[$i]->get_nombre()).'</option>';
					}

				?>
			</select>
		</div>
		<div class="col-md-4">
			<br><button type="button" class="btn btn-secondary" onclick="agregarAnalisis()">Agregar</button>
		</div>
	</div><br>
	<div class="row">
		<div class="col-md-12">
			<?php 

				if(isset($_SESSION["listaAnalisis"])){
					$cant_analisis = count($_SESSION["listaAnalisis"]);
				}else{
					$cant_analisis = 0;
				}


			?>
			<h5 class="titulo">Análisis Seleccionados: <?php echo $cant_analisis; ?></h5>

			<?php
				$listaAnalisis = $_SESSION["listaAnalisis"];

				if($cant_analisis!=0){
					echo 
					'<table class="table table-hover">
						<thead>
							<tr>
								<th>ID</th>
								<th>Tipo de análisis</th>
								<th></th>
							</tr>
						</thead>
						<tbody>';
						for ($i=0; $i < count($listaAnalisis); $i++) { 
							echo '<tr>
									<td>'.$listaAnalisis[$i]->get_id_tipo_analisis().'</td>
									<td>'.ucfirst($listaAnalisis[$i]->get_nombre()).'</td>
									<td>
										<a href="../controlador/quitar_analisis.php?id='.$listaAnalisis[$i]->get_id_tipo_analisis().'">
											Quitar
										</a>
									</td>
								</tr>';
						}

					echo '</tbody>
					</table>';

				}

			?>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-3">
			<button type="submit" class="btn btn-secondary" <?php if($cant_analisis == 0) echo "disabled"; ?>>Guardar</button>
		</div>
		<div class="col-md-3">
			<button type="button" class="btn btn-default" onclick="location = '../controlador/cancelar_muestra.php'">Cancelar</button>
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