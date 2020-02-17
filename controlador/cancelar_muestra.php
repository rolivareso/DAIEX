<?php
	try{
		session_start();
		$_SESSION["codCliente"] = null;
		$_SESSION["temperatura"] = null;
		$_SESSION["cantidad"] = null;
		$_SESSION["listaAnalisis"] = null;

		header("location: ../vista/recepcion_muestras_datos.php");

	}
	catch(Exception $ex){
		echo "<script>
                alert('".$ex->getMessage()."');
                location='javascript:history.back()';
    		</script>";
	}


?>