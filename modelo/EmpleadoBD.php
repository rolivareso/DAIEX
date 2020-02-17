<?php
	include_once ('Conexion.php');
	include_once ('Empleado.php');
	class EmpleadoBD extends Conexion{

	public function registrar_empleado($empleado){
		$this->conectar();
		$query = "INSERT INTO empleado (rut_empleado, nombre_empleado) VALUES('".$empleado->get_rut_empleado()."', '".$empleado->get_nombre_empleado()."' )";
		if(!$this->mysqli->query($query)){
			$res = false;
		}else{
			$res = true;
		}
		$this->desconectar();
		return $res;
	}

	public function modificar_empleado($empleado){
		$this->conectar();
		$query = "UPDATE empleado SET nombre_empleado = '".$empleado->get_nombre_empleado()."' WHERE rut_empleado = '".$empleado->get_rut_empleado()."'";
		if(!$this->mysqli->query($query)){
			$res = false;
		}else{
			$res = true;
		}
		$this->desconectar();
		return $res;
	}

	public function leer_empleado($rut_empleado){
		$this->conectar();
		$query = "SELECT nombre_empleado FROM empleado WHERE rut_empleado = $rut_empleado";
   		$empleado = null;

		if ($resultado = $this->mysqli->query($query)) {
			
   			if($fila = $resultado->fetch_row()) {
   				$empleado = new Empleado();
   				$empleado->set_rut_empleado($rut_empleado);
   				$empleado->set_nombre_empleado($fila[0]);
    		}
		}
		$this->desconectar();
  		return $empleado;
	}

	public function leer_todo_empleado(){
		$this->conectar();
		$query = "SELECT rut_empleado, nombre_empleado FROM empleado";
		$lista = null;

		if ($resultado = $this->mysqli->query($query)) {

    		while($fila = $resultado->fetch_row()) {
    			$e = new Empleado();
    			$e->set_rut_empleado($fila[0]);
   				$e->set_nombre_empleado($fila[1]);

		        $lista[] =  $e;
    		}
		}
		$this->desconectar();
    	return $lista;
	}

	}
?>