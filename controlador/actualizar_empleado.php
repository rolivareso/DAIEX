<?php
	try{
		include_once("../modelo/UsuarioBD.php");
		include_once("../modelo/Empleado.php");
		include_once("../modelo/EmpleadoBD.php");
		session_start();

		$rut = $_POST["txt-rut"];
		$nombre = $_POST["txt-nombre"];

		$empleado = new Empleado();
		$empleado->set_rut_empleado($rut);
		$empleado->set_nombre_empleado($nombre);

		$empleadobd = new EmpleadoBD();
		if(!$empleadobd->modificar_empleado($empleado)){
			throw new Exception("No se ha logrado modificar los datos");
		}
		echo "<script>
                alert('Éxito');
                location='../vista/perfil_empleado.php';
    		</script>";

	}
	catch (Exception $ex) {
		echo "<script>
                alert('".$ex->getMessage()."');
                location='javascript:history.back()';
    		</script>";
	}


?>