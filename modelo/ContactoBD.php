<?php
	include_once ('Conexion.php');
	include_once ('Contacto.php');
	class ContactoBD extends Conexion{

	public function registrar_contacto($contacto){
		$this->conectar();
		$query = "INSERT INTO contacto (rut_contacto, nombre_contacto, email_contacto, telefono_contacto, codigo_empresa) VALUES('".$contacto->get_rut_contacto()."', '".$contacto->get_nombre_contacto()."', '".$contacto->get_email_contacto()."', ".$contacto->get_telefono_contacto().", ".$contacto->get_codigo_empresa()." )";
		if(!$this->mysqli->query($query)){
			$res = false;
		}else{
			$res = true;
		}
		$this->desconectar();
		return $res;
	}

	public function modificar_contacto($contacto){
		$this->conectar();
		$query = "UPDATE contacto SET nombre_contacto = '".$contacto->get_nombre_contacto()."', email_contacto = '".$contacto->get_email_contacto()."', telefono_contacto = '".$contacto->get_telefono_contacto()."', codigo_empresa = ".$contacto->get_codigo_empresa()." WHERE rut_contacto = '".$contacto->get_rut_contacto()."'";
		if(!$this->mysqli->query($query)){
			$res = false;
		}else{
			$res = true;
		}
		$this->desconectar();
		return $res;
	}

	public function leer_contacto($rut_contacto){
		$this->conectar();
		$query = "SELECT nombre_contacto, email_contacto, telefono_contacto, codigo_empresa FROM contacto WHERE rut_contacto = $rut_contacto";
   		$contacto = null;

		if ($resultado = $this->mysqli->query($query)) {
			
   			if($fila = $resultado->fetch_row()) {
   				$contacto = new Contacto();
   				$contacto->set_rut_contacto($rut_contacto);
   				$contacto->set_nombre_contacto($fila[0]);
   				$contacto->set_email_contacto($fila[1]);
   				$contacto->set_telefono_contacto($fila[2]);
   				$contacto->set_codigo_empresa($fila[3]);
    		}
		}
		$this->desconectar();
  		return $contacto;
	}

	public function leer_todo_contacto(){
		$this->conectar();
		$query = "SELECT rut_contacto, nombre_contacto, email_contacto, telefono_contacto, codigo_empresa FROM contacto";
		$lista = null;

		if ($resultado = $this->mysqli->query($query)) {

    		while($fila = $resultado->fetch_row()) {
    			$c = new Contacto();
    			$c->set_rut_contacto($fila[0]);
   				$c->set_nombre_contacto($fila[1]);
   				$c->set_email_contacto($fila[2]);
   				$c->set_telefono_contacto($fila[3]);
   				$c->set_codigo_empresa($fila[4]);

		        $lista[] =  $c;
    		}
		}
		$this->desconectar();
    	return $lista;
	}

	public function buscar_contacto_empresa($codigo_empresa){
		$this->conectar();
		$query = "SELECT rut_contacto, nombre_contacto, email_contacto, telefono_contacto FROM contacto WHERE codigo_empresa = $codigo_empresa";
   		$contacto = null;

		if ($resultado = $this->mysqli->query($query)) {
			
   			if($fila = $resultado->fetch_row()) {
   				$contacto = new Contacto();
   				$contacto->set_rut_contacto($fila[0]);
   				$contacto->set_nombre_contacto($fila[1]);
   				$contacto->set_email_contacto($fila[2]);
   				$contacto->set_telefono_contacto($fila[3]);
   				$contacto->set_codigo_empresa($codigo_empresa);
    		}
		}
		$this->desconectar();
  		return $contacto;
	}

}
?>