<?php
	include_once ('Conexion.php');
	include_once ('Particular.php');
	class ParticularBD extends Conexion{

	public function registrar_particular($particular){
		$this->conectar();
		$query = "INSERT INTO particular (rut_particular, nombre_particular, direccion_particular, email_particular, telefono_particular) VALUES('".$particular->get_rut_particular()."', '".$particular->get_nombre_particular()."', '".$particular->get_direccion_particular()."', '".$particular->get_email_particular()."', '".$particular->get_telefono_particular()."'  )";
		if(!$this->mysqli->query($query)){
			$res = false;
		}else{
			$res = true;
		}
		$this->desconectar();
		return $res;
	}

	public function modificar_particular($particular){
		$this->conectar();
		$query = "UPDATE particular SET rut_particular = '".$particular->get_rut_particular()."', nombre_particular = '".$particular->get_nombre_particular()."', direccion_particular = '".$particular->get_direccion_particular()."', email_particular = '".$particular->get_email_particular()."', telefono_particular = '".$particular->get_telefono_particular()."' WHERE codigo_particular = '".$particular->get_codigo_particular()."'";
		if(!$this->mysqli->query($query)){
			$res = false;
		}else{
			$res = true;
		}
		$this->desconectar();
		return $res;
	}

	public function leer_particular($codigo_particular){
		$this->conectar();
		$query = "SELECT rut_particular, nombre_particular, direccion_particular, email_particular, telefono_particular FROM particular WHERE codigo_particular = $codigo_particular";
   		$objeto = null;

		if ($resultado = $this->mysqli->query($query)) {
			
   			if($fila = $resultado->fetch_row()) {
   				$objeto = new Particular();
   				$objeto->set_codigo_particular($codigo_particular);
   				$objeto->set_rut_particular($fila[0]);
   				$objeto->set_nombre_particular($fila[1]);
   				$objeto->set_direccion_particular($fila[2]);
   				$objeto->set_email_particular($fila[3]);
   				$objeto->set_telefono_particular($fila[4]);
    		}
		}
		$this->desconectar();
  		return $objeto;
	}

	public function leer_todo_particular(){
		$this->conectar();
		$query = "SELECT codigo_particular, rut_particular, nombre_particular, direccion_particular, email_particular, telefono_particular FROM particular";
		$lista = null;

		if ($resultado = $this->mysqli->query($query)) {

    		while($fila = $resultado->fetch_row()) {
    			$o = new Particular();
    			$o->set_codigo_particular($fila[0]);
   				$o->set_rut_particular($fila[1]);
   				$o->set_nombre_particular($fila[2]);
   				$o->set_direccion_particular($fila[3]);
   				$o->set_email_particular($fila[4]);
   				$o->set_telefono_particular($fila[5]);

		        $lista[] =  $o;
    		}
		}
		$this->desconectar();
    	return $lista;
	}

	public function leer_particular_rut($rut_particular){
		$this->conectar();
		$query = "SELECT codigo_particular, nombre_particular, direccion_particular, email_particular, telefono_particular FROM particular WHERE rut_particular = $rut_particular";
   		$objeto = null;

		if ($resultado = $this->mysqli->query($query)) {
			
   			if($fila = $resultado->fetch_row()) {
   				$objeto = new Particular();
   				$objeto->set_codigo_particular($fila[0]);
   				$objeto->set_rut_particular($rut_particular);
   				$objeto->set_nombre_particular($fila[1]);
   				$objeto->set_direccion_particular($fila[2]);
   				$objeto->set_email_particular($fila[3]);
   				$objeto->set_telefono_particular($fila[4]);
    		}
		}
		$this->desconectar();
  		return $objeto;

	}

}
?>