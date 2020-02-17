<?php
	try{
		include_once ('../modelo/TipoAnalisisBD.php');
		session_start();

		$id = $_POST["txt-id"];
		$nombre = $_POST["txt-nombre"];

		$tipoAnalisis = new TipoAnalisis();
		$tipoAnalisis->set_id_tipo_analisis($id);
		$tipoAnalisis->set_nombre($nombre);

		$tipoAnalisisbd = new TipoAnalisisBD();
		if(!$tipoAnalisisbd->modificar_tipo_analisis($tipoAnalisis)){
			throw new Exception("No se ha logrado modificar los datos");
		}
		echo "<script>
                alert('Éxito');
                location='../vista/mantenedor_tipos_analisis.php';
    		</script>";

	}
	catch (Exception $ex) {
		echo "<script>
                alert('".$ex->getMessage()."');
                location='javascript:history.back()';
    		</script>";
	}

?>