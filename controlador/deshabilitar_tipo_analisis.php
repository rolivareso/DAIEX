<?php
	try{
		include_once ('../modelo/TipoAnalisisBD.php');

		$id = $_POST["id"];

		$tipoAnalisisbd = new TipoAnalisisBD();
		if(!$tipoAnalisisbd->deshabilitar_tipo_analisis($id)){
			throw new Exception("No se ha logrado deshabilitar el tipo de análisis");
		}
		echo "<script>
                alert('Éxito');
                location='../vista/mantenedor_tipos_analisis.php';
    		</script>";

	}
	catch(Exception $ex){
		echo "<script>
                alert('".$ex->getMessage()."');
                location='javascript:history.back()';
    		</script>";
	}

?>