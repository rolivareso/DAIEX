<?php
	include_once ('Conexion.php');
	include_once ('ResultadoAnalisis.php');
	class ResultadoAnalisisBD extends Conexion{

	public function registrar_resultado_analisis_proceso($resultado_analisis){
		$this->conectar();
		$query = "INSERT INTO resultado_analisis (id_tipo_analisis, id_analisis_muestras, estado) VALUES('".$resultado_analisis->get_id_tipo_analisis()."', '".$resultado_analisis->get_id_analisis_muestra()."', 'P')";
		if(!$this->mysqli->query($query)){
			$res = false;
		}else{
			$res = true;
		}
		$this->desconectar();
		return $res;
	}

	public function modificar_resultado_analisis($resultado_analisis){
		$this->conectar();
		$query = "UPDATE resultado_analisis SET ppm = '".$resultado_analisis->get_ppm()."', estado = '".$resultado_analisis->get_estado()."', rut_empleado_analista = '".$resultado_analisis->get_rut_empleado_analista()."' WHERE id_tipo_analisis = '".$resultado_analisis->get_id_tipo_analisis()."' and id_analisis_muestras = '".$resultado_analisis->get_id_analisis_muestra()."' ";
		if(!$this->mysqli->query($query)){
			$res = false;
		}else{
			$res = true;
		}
		$this->desconectar();
		return $res;
	}

	public function leer_resultado_analisis($id_tipo_analisis, $id_analisis_muestras){
		$this->conectar();
		$query = "SELECT fecha_registro, ppm, estado, rut_empleado_analista FROM resultado_analisis WHERE id_tipo_analisis = $id_tipo_analisis and id_analisis_muestras = $id_analisis_muestras ";
   		$objeto = null;

		if ($resultado = $this->mysqli->query($query)) {
			
   			if($fila = $resultado->fetch_row()) {
   				$objeto = new ResultadoAnalisis();
   				$objeto->set_id_tipo_analisis($id_tipo_analisis);
   				$objeto->set_id_analisis_muestra($id_analisis_muestras);
   				$objeto->set_fecha_registro($fila[0]);
   				$objeto->set_ppm($fila[1]);
   				$objeto->set_estado($fila[2]);
   				$objeto->set_rut_empleado_analista($fila[3]);
    		}
		}
		$this->desconectar();
  		return $objeto;
	}

	public function leer_todo_resultado_analisis(){
		$this->conectar();
		$query = "SELECT id_tipo_analisis, id_analisis_muestras, fecha_registro, ppm, estado, rut_empleado_analista FROM resultado_analisis";
		$lista = null;

		if ($resultado = $this->mysqli->query($query)) {

    		while($fila = $resultado->fetch_row()) {
    			$o = new ResultadoAnalisis();
    			$o->set_id_tipo_analisis($fila[0]);
   				$o->set_id_analisis_muestra($fila[1]);
   				$o->set_fecha_registro($fila[2]);
   				$o->set_ppm($fila[3]);
   				$o->set_estado($fila[4]);
   				$o->set_rut_empleado_analista($fila[5]);

		        $lista[] =  $o;
    		}
		}
		$this->desconectar();
    	return $lista;
	}

	public function leer_resultados_analisis_muestra($id_analisis_muestras){
		$this->conectar();
		$query = "SELECT id_tipo_analisis, fecha_registro, ppm, estado, rut_empleado_analista FROM resultado_analisis WHERE id_analisis_muestras = $id_analisis_muestras";
		$lista = null;

		if ($resultado = $this->mysqli->query($query)) {

    		while($fila = $resultado->fetch_row()) {
    			$o = new ResultadoAnalisis();
    			$o->set_id_tipo_analisis($fila[0]);
   				$o->set_id_analisis_muestra($id_analisis_muestras);
   				$o->set_fecha_registro($fila[1]);
   				$o->set_ppm($fila[2]);
   				$o->set_estado($fila[3]);
   				$o->set_rut_empleado_analista($fila[4]);

		        $lista[] =  $o;
    		}
		}
		$this->desconectar();
    	return $lista;
	}

	public function procesar_resultado_analisis($resultado_analisis){
		$this->conectar();
		$query = "UPDATE resultado_analisis SET fecha_registro = NOW(), ppm = '".$resultado_analisis->get_ppm()."', estado = 'T', rut_empleado_analista = '".$resultado_analisis->get_rut_empleado_analista()."' WHERE id_tipo_analisis = '".$resultado_analisis->get_id_tipo_analisis()."' and id_analisis_muestras = '".$resultado_analisis->get_id_analisis_muestra()."' ";
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