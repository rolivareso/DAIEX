<?php
	session_start();

	$_SESSION["sesionUsuario"] = null;
	echo "<script>
            alert('Se ha cerrado sesión.');
            location='../vista/inicio.php';
    	</script>";

?>