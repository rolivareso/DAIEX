<?php
	try{
		include_once ('../modelo/UsuarioBD.php');
		session_start();

		$rut = $_POST["rut"];

		$usuariobd = new UsuarioBD();
		if(!$usuariobd->deshabilitar_usuario($rut)){
			throw new Exception("No se logró deshabilitar el usuario");
		}
		echo "<script>
                alert('Éxito');
                location='../vista/mantenedor_usuarios.php';
    		</script>";
	}
	catch(Excepction $ex){
		echo "<script>
                alert('".$ex->getMessage()."');
                location='javascript:history.back()';
    		</script>";
	}

?>