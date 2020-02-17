<?php
	include_once ('Conexion.php');
	include_once ('Empresa.php');
	class EmpresaBD extends Conexion{

	public function registrar_empresa($empresa){
		$this->conectar();
		$query = "INSERT INTO empresa (rut_empresa, nombre_empresa, direccion_empresa) VALUES('".$empresa->get_rut_empresa()."', '".$empresa->get_nombre_empresa()."', '".$empresa->get_direccion_empresa()."' )";
		if(!$this->mysqli->query($query)){
			$res = false;
		}else{
			$res = true;
		}
		$this->desconectar();
		return $res;
	}

	public function modificar_empresa($empresa){
		$this->conectar();
		$query = "UPDATE empresa SET rut_empresa = '".$empresa->get_rut_empresa()."', nombre_empresa = '".$empresa->get_nombre_empresa()."', direccion_empresa = '".$empresa->get_direccion_empresa()."' WHERE codigo_empresa = '".$empresa->get_codigo_empresa()."'";
		if(!$this->mysqli->query($query)){
			$res = false;
		}else{
			$res = true;
		}
		$this->desconectar();
		return $res;
	}

	public function eliminar_empresa($codigo_empresa){
		$this->conectar();
		$query = "DELETE FROM empresa WHERE codigo_empresa = $codigo_empresa";
		if(!$this->mysqli->query($query)){
			$res = false;
		}else{
			$res = true;
		}
		$this->desconectar();
		return $res;
	}

	public function leer_empresa($codigo_empresa){
		$this->conectar();
		$query = "SELECT rut_empresa, nombre_empresa, direccion_empresa FROM empresa WHERE codigo_empresa = $codigo_empresa";
   		$objeto = null;

		if ($resultado = $this->mysqli->query($query)) {
			
   			if($fila = $resultado->fetch_row()) {
   				$objeto = new Empresa();
   				$objeto->set_codigo_empresa($codigo_empresa);
   				$objeto->set_rut_empresa($fila[0]);
   				$objeto->set_nombre_empresa($fila[1]);
   				$objeto->set_direccion_empresa($fila[2]);
    		}
		}
		$this->desconectar();
  		return $objeto;
	}

	public function leer_todo_empresa(){
		$this->conectar();
		$query = "SELECT codigo_empresa, rut_empresa, nombre_empresa, direccion_empresa FROM empresa";
		$lista = null;

		if ($resultado = $this->mysqli->query($query)) {

    		while($fila = $resultado->fetch_row()) {
    			$o = new Empresa();
    			$o->set_codigo_empresa($fila[0]);
   				$o->set_rut_empresa($fila[1]);
   				$o->set_nombre_empresa($fila[2]);
   				$o->set_direccion_empresa($fila[3]);

		        $lista[] =  $o;
    		}
		}
		$this->desconectar();
    	return $lista;
	}

	public function obtener_codigo_empresa($rut_empresa){
		$this->conectar();
		$query = "SELECT codigo_empresa FROM empresa WHERE rut_empresa = $rut_empresa";
   		$objeto = null;

		if ($resultado = $this->mysqli->query($query)) {
			
   			if($fila = $resultado->fetch_row()) {
   				$objeto = $fila[0];
    		}
		}
		$this->desconectar();
  		return $objeto;
	}

	public function leer_empresa_rut($rut_empresa){
		$this->conectar();
		$query = "SELECT codigo_empresa, nombre_empresa, direccion_empresa FROM empresa WHERE rut_empresa = $rut_empresa";
   		$objeto = null;

		if ($resultado = $this->mysqli->query($query)) {
			
   			if($fila = $resultado->fetch_row()) {
   				$objeto = new Empresa();
   				$objeto->set_codigo_empresa($fila[0]);
   				$objeto->set_rut_empresa($rut_empresa);
   				$objeto->set_nombre_empresa($fila[1]);
   				$objeto->set_direccion_empresa($fila[2]);
    		}
		}
		$this->desconectar();
  		return $objeto;
	}

	}
?>