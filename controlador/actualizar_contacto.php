<?php
	try{
		include_once("../modelo/UsuarioBD.php");
		include_once("../modelo/EmpresaBD.php");
		include_once("../modelo/ContactoBD.php");
		session_start();

		$contactobd = new ContactoBD();

		$rut = $_POST["txt-rut"];
		$nombre = $_POST["txt-nombre"];
		$email = $_POST["txt-email"];
		$telefono = $_POST["txt-telefono"];

		$empresabd = new EmpresaBD();
		$oldContacto = $contactobd->leer_contacto($rut);

		$contacto = new Contacto();
		$contacto->set_rut_contacto($rut);
		$contacto->set_nombre_contacto($nombre);
		$contacto->set_email_contacto($email);
		$contacto->set_telefono_contacto($telefono);
		$contacto->set_codigo_empresa($oldContacto->get_codigo_empresa());

		
		if(!$contactobd->modificar_contacto($contacto)){
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