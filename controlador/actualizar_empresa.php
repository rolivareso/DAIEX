<?php
	try{
		include_once("../modelo/UsuarioBD.php");
		include_once("../modelo/EmpresaBD.php");
		session_start();


		$codigo = $_POST["txt-codigo"];
		$rut = $_POST["txt-rut"];
		$nombre = $_POST["txt-nombre"];
		$direccion = $_POST["txt-direccion"];

		$empresa = new Empresa();
		$empresa->set_codigo_empresa($codigo);
		$empresa->set_rut_empresa($rut);
		$empresa->set_nombre_empresa($nombre);
		$empresa->set_direccion_empresa($direccion);

		$empresabd = new EmpresaBD();
		if(!$empresabd->modificar_empresa($empresa)){
			throw new Exception("No se ha logrado modificar los datos");
		}
		echo "<script>
                alert('Éxito');
                location='../vista/perfil_empresa.php';
    		</script>";

	}
	catch (Exception $ex) {
		echo "<script>
                alert('".$ex->getMessage()."');
                location='javascript:history.back()';
    		</script>";
	}


?>