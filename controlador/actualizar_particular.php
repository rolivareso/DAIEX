<?php
	try{
		include_once("../modelo/UsuarioBD.php");
		include_once("../modelo/Particular.php");
		include_once("../modelo/ParticularBD.php");
		session_start();

		$codigo = $_POST["txt-codigo"];
		$rut = $_POST["txt-rut"];
		$nombre = $_POST["txt-nombre"];
		$direccion = $_POST["txt-direccion"];
		$email = $_POST["txt-email"];
		$telefono = $_POST["txt-telefono"];

		$particular = new Particular();
		$particular->set_codigo_particular($codigo);
		$particular->set_rut_particular($rut);
		$particular->set_nombre_particular($nombre);
		$particular->set_direccion_particular($direccion);
		$particular->set_email_particular($email);
		$particular->set_telefono_particular($telefono);

		$particularbd = new ParticularBD();
		if(!$particularbd->modificar_particular($particular)){
			throw new Exception("No se ha logrado modificar los datos");
		}
		echo "<script>
                alert('Éxito');
                location='../vista/perfil_particular.php';
    		</script>";

	}
	catch (Exception $ex) {
		echo "<script>
                alert('".$ex->getMessage()."');
                location='javascript:history.back()';
    		</script>";
	}


?>