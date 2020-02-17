<?php
	try{		
		include_once("../modelo/TipoAnalisisBD.php");
		session_start();

		$analisis = $_GET["analisis"];

		$listaAnalisis = $_SESSION["listaAnalisis"];

		if($listaAnalisis!=null){
			for ($i=0; $i < count($listaAnalisis); $i++) { 
				if($listaAnalisis[$i]->get_id_tipo_analisis()==$analisis){
					throw new Exception("Ya seleccionó este analisis");
					break;
				}
			}	
		}

		$tipoAnalisisbd = new TipoAnalisisBD();
		$tiposAnalisisEnBd = $tipoAnalisisbd->leer_todo_tipo_analisis();
		for ($i=0; $i < count($tiposAnalisisEnBd); $i++) { 
			if($tiposAnalisisEnBd[$i]->get_id_tipo_analisis() == $analisis){
				$analisisSeleccionado = $tiposAnalisisEnBd[$i];
			}
		}

		$listaAnalisis[] = $analisisSeleccionado;

		$_SESSION["listaAnalisis"] = $listaAnalisis;

		echo "<script>
                location='../vista/recepcion_muestras_analisis.php';
    		</script>";
	}
	catch(Exception $ex){
		echo "<script>
                alert('".$ex->getMessage()."');
                location='javascript:history.back()';
    		</script>";
	}

?>