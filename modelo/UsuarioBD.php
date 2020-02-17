<?php
	include_once ('Conexion.php');
	include_once ('Usuario.php');
	class UsuarioBD extends Conexion{

	public function registrar_usuario($usuario){
		$this->conectar();
		$query = "INSERT INTO usuario (rut_usuario, clave_usuario, tipo_usuario, estado_usuario) VALUES('".$usuario->get_rut_usuario()."', '".$usuario->get_clave_usuario()."', '".$usuario->get_tipo_usuario()."', 'H' )";
		if(!$this->mysqli->query($query)){
			$res = false;
		}else{
			$res = true;
		}
		$this->desconectar();
		return $res;
	}

	public function modificar_usuario($usuario){
		$this->conectar();
		$query = "UPDATE usuario SET clave_usuario = '".$usuario->get_clave_usuario()."', tipo_usuario = '".$usuario->get_tipo_usuario()."' WHERE rut_usuario = '".$usuario->get_rut_usuario()."'";
		if(!$this->mysqli->query($query)){
			$res = false;
		}else{
			$res = true;
		}
		$this->desconectar();
		return $res;
	}

	public function eliminar_usuario($rut_usuario){
		$this->conectar();
		$query = "DELETE FROM usuario WHERE rut_usuario = $rut_usuario";
		if(!$this->mysqli->query($query)){
			$res = false;
		}else{
			$res = true;
		}
		$this->desconectar();
		return $res;
	}

	public function leer_usuario($rut_usuario){
		$this->conectar();
		$query = "SELECT clave_usuario, tipo_usuario FROM usuario WHERE rut_usuario = $rut_usuario";
   		$objeto = null;

		if ($resultado = $this->mysqli->query($query)) {
			
   			if($fila = $resultado->fetch_row()) {
   				$objeto = new Usuario();
   				$objeto->set_rut_usuario($rut_usuario);
   				$objeto->set_clave_usuario($fila[0]);
   				$objeto->set_tipo_usuario($fila[1]);
    		}
		}
		$this->desconectar();
  		return $objeto;
	}

	public function leer_todo_usuario(){
		$this->conectar();
		$query = "SELECT rut_usuario, clave_usuario, tipo_usuario, estado_usuario FROM usuario ORDER BY estado_usuario DESC, tipo_usuario";
		$lista = null;

		if ($resultado = $this->mysqli->query($query)) {

    		while($fila = $resultado->fetch_row()) {
    			$o = new Usuario();
    			$o->set_rut_usuario($fila[0]);
   				$o->set_clave_usuario($fila[1]);
   				$o->set_tipo_usuario($fila[2]);
   				$o->set_estado_usuario($fila[3]);

		        $lista[] =  $o;
    		}
		}
		$this->desconectar();
    	return $lista;
	}

	public function iniciar_sesion($rut_usuario, $clave_usuario){
		$this->conectar();
		$query = "SELECT tipo_usuario FROM usuario WHERE rut_usuario = $rut_usuario and clave_usuario = $clave_usuario and estado_usuario = 'H'";
   		$objeto = null;

		if ($resultado = $this->mysqli->query($query)) {
			
   			if($fila = $resultado->fetch_row()) {
   				$objeto = new Usuario();
   				$objeto->set_rut_usuario($rut_usuario);
   				$objeto->set_clave_usuario($clave_usuario);
   				$objeto->set_tipo_usuario($fila[0]);
    		}
		}
		$this->desconectar();
  		return $objeto;
	}

	public function deshabilitar_usuario($rut_usuario){
		$this->conectar();
		$query = "UPDATE usuario SET estado_usuario = 'D' WHERE rut_usuario = '".$rut_usuario."'";
		if(!$this->mysqli->query($query)){
			$res = false;
		}else{
			$res = true;
		}
		$this->desconectar();
		return $res;
	}

	public function habilitar_usuario($rut_usuario){
		$this->conectar();
		$query = "UPDATE usuario SET estado_usuario = 'H' WHERE rut_usuario = '".$rut_usuario."'";
		if(!$this->mysqli->query($query)){
			$res = false;
		}else{
			$res = true;
		}
		$this->desconectar();
		return $res;
	}

}
?>