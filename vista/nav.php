<a class="navbar-brand isp-logo" href="inicio.php"><strong>Instituto de Salud Pública</strong></a>
<!--Nav-->
<nav class="navbar navbar-expand-sm">
	<div class="container">
  	<ul class="navbar-nav">
	    <li class="nav-item">
      	<a class="nav-link" href="inicio.php">Inicio</a>
    	</li>
    	<?php
    		if(isset($_SESSION["sesionUsuario"]) == null){
    			echo 
    			'<li class="nav-item dropdown">
    			<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
	        		Iniciar Sesión
      			</a>
      			<div class="dropdown-menu text-center">
	        		<form id="form-login" action="../controlador/iniciar_sesion.php" method="post">
						    <input type="text" name="txt-rut" placeholder="Rut" class="form-control form-control-sm" required><br>
						    <input type="password" name="txt-clave" placeholder="Clave" class="form-control form-control-sm" required><br>
						    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-sign-in-alt"></i> Iniciar Sesión</button>
						    <a href="registro_cliente_particular.php">Registrarse</a>
					    </form>
      			</div>
      			</li>';
    		}else{
          $tipoUsuario = null;
          $usuario = $_SESSION["sesionUsuario"];

          switch ($usuario->get_tipo_usuario()) {
            case 'A'://Administrador
              echo 
            '<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                Administrador
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="perfil_empleado.php">Mi Perfil</a>
                <hr>
                <a class="dropdown-item" href="mantenedor_tipos_analisis.php">Gestión de Tipos de análisis</a>
                <a class="dropdown-item" href="mantenedor_usuarios.php">Gestión de Usuarios</a>
              </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../controlador/cerrar_sesion.php"><i class="fas fa-power-off"></i> Cerrar Sesión</a>
              </li>';
              break;
            case 'R'://Recepcionista
              echo 
            '<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                Recepcionista
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="perfil_empleado.php">Mi Perfil</a>
                <a class="dropdown-item" href="recepcion_muestras_datos.php">Recibir una muestra</a>
                <a class="dropdown-item" href="ver_muestras_recibidas.php">Ver muestras recibidas</a>
              </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../controlador/cerrar_sesion.php"><i class="fas fa-power-off"></i> Cerrar Sesión</a>
              </li>';
              break;
            case 'T'://Técnico
                echo 
            '<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                Técnico
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="perfil_empleado.php">Mi Perfil</a>
                <a class="dropdown-item" href="ver_muestras_no_procesadas.php">Procesar muestras</a>
                <a class="dropdown-item" href="ver_muestras_procesadas.php">Ver mis muestras procesadas</a>
              </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../controlador/cerrar_sesion.php"><i class="fas fa-power-off"></i> Cerrar Sesión</a>
              </li>';
              break;
            case 'C'://Cliente
              $empresabd = new EmpresaBD();
              if($empresabd->leer_empresa_rut($usuario->get_rut_usuario()) != null){
                $enlacePerfil = "perfil_empresa.php";
              }else{
                $enlacePerfil = "perfil_particular.php";
              }
                echo 
            '<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                Cliente
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="'.$enlacePerfil.'">Mi Perfil</a>
                <a class="dropdown-item" href="ver_estado_muestras_cliente.php">Ver mis muestras</a>
              </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../controlador/cerrar_sesion.php"><i class="fas fa-power-off"></i> Cerrar Sesión</a>
              </li>';
              break;
            default:
              break;
          }
    		}
    	?>
  	</ul>
	</div>
</nav><!--Fin nav-->
<br><br>