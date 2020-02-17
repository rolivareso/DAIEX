<?php
	include_once ('Conexion.php');
	include_once ('TipoAnalisis.php');
	class TipoAnalisisBD extends Conexion{

	public function registrar_tipo_analisis($tipo_analisis){
		$this->conectar();
		$query = "INSERT INTO tipo_analisis (nombre, estado_tipo_analisis) VALUES('".$tipo_analisis->get_nombre()."', 'H')";
		if(!$this->mysqli->query($query)){
			$res = false;
		}else{
			$res = true;
		}
		$this->desconectar();
		return $res;
	}

	public function modificar_tipo_analisis($tipo_analisis){
		$this->conectar();
		$query = "UPDATE tipo_analisis SET nombre = '".$tipo_analisis->get_nombre()."' WHERE id_tipo_analisis = '".$tipo_analisis->get_id_tipo_analisis()."'";
		if(!$this->mysqli->query($query)){
			$res = false;
		}else{
			$res = true;
		}
		$this->desconectar();
		return $res;
	}

	public function leer_tipo_analisis($id_tipo_analisis){
		$this->conectar();
		$query = "SELECT nombre FROM tipo_analisis WHERE id_tipo_analisis = $id_tipo_analisis";
   		$objeto = null;

		if ($resultado = $this->mysqli->query($query)) {
			
   			if($fila = $resultado->fetch_row()) {
   				$objeto = new TipoAnalisis();
   				$objeto->set_id_tipo_analisis($id_tipo_analisis);
   				$objeto->set_nombre($fila[0]);
    		}
		}
		$this->desconectar();
  		return $objeto;
	}

	public function leer_todo_tipo_analisis(){
		$this->conectar();
		$query = "SELECT id_tipo_analisis, nombre, estado_tipo_analisis FROM tipo_analisis ORDER BY estado_tipo_analisis DESC";
		$lista = null;

		if ($resultado = $this->mysqli->query($query)) {

    		while($fila = $resultado->fetch_row()) {
    			$o = new TipoAnalisis();
    			$o->set_id_tipo_analisis($fila[0]);
   				$o->set_nombre($fila[1]);
   				$o->set_estado_tipo_analisis($fila[2]);

		        $lista[] =  $o;
    		}
		}
		$this->desconectar();
    	return $lista;
	}

	public function deshabilitar_tipo_analisis($id_tipo_analisis){
		$this->conectar();
		$query = "UPDATE tipo_analisis SET estado_tipo_analisis = 'D' WHERE id_tipo_analisis = '".$id_tipo_analisis."'";
		if(!$this->mysqli->query($query)){
			$res = false;
		}else{
			$res = true;
		}
		$this->desconectar();
		return $res;
	}

	public function habilitar_tipo_analisis($id_tipo_analisis){
		$this->conectar();
		$query = "UPDATE tipo_analisis SET estado_tipo_analisis = 'H' WHERE id_tipo_analisis = '".$id_tipo_analisis."'";
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