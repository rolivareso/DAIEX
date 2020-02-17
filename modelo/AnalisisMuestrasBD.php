<?php
	include_once('Conexion.php');
	include_once('AnalisisMuestras.php');
	include_once('EmpresaBD.php');
	class AnalisisMuestrasBD extends Conexion{

	public function registrar_analisis_muestras_empresa($analisis_muestras){
		$this->conectar();
		$query = "INSERT INTO analisis_muestras (fecha_recepcion, temperatura_muestra, cantidad_muestra, codigo_empresa, rut_empleado_recibe) VALUES( NOW(), '".$analisis_muestras->get_temperatura_muestra()."', '".$analisis_muestras->get_cantidad_muestra()."', '".$analisis_muestras->get_codigo_empresa()."', '".$analisis_muestras->get_rut_empleado_recibe()."' )";
		if(!$this->mysqli->query($query)){
			$res = null;
			
		}else{
			$query2 = "SELECT MAX(id_analisis_muestras) FROM analisis_muestras";
			
			if($resultado = $this->mysqli->query($query2)){
				
				if($fila = $resultado->fetch_row()){
					$res = $fila[0];
				}
			}
		}
		$this->desconectar();
		return $res;
	}

	public function registrar_analisis_muestras_particular($analisis_muestras){
		$this->conectar();
		$query = "INSERT INTO analisis_muestras (fecha_recepcion, temperatura_muestra, cantidad_muestra, codigo_particular, rut_empleado_recibe) VALUES( NOW(), '".$analisis_muestras->get_temperatura_muestra()."', '".$analisis_muestras->get_cantidad_muestra()."', '".$analisis_muestras->get_codigo_particular()."', '".$analisis_muestras->get_rut_empleado_recibe()."' )";
		if(!$this->mysqli->query($query)){
			$res = null;
		}else{
			$query2 = "SELECT MAX(id_analisis_muestras) FROM analisis_muestras";
			
			if($resultado = $this->mysqli->query($query2)){
				
				if($fila = $resultado->fetch_row()){
					$res = $fila[0];
				}
			}
		}
		$this->desconectar();
		return $res;
	}

	public function modificar_analisis_muestras($analisis_muestras){
		$this->conectar();
		$query = "UPDATE analisis_muestras SET temperatura_muestra = '".$analisis_muestras->get_temperatura_muestra()."', cantidad_muestra = '".$analisis_muestras->get_cantidad_muestra()."', codigo_empresa = '".$analisis_muestras->get_codigo_empresa()."', codigo_particular = '".$analisis_muestras->get_codigo_particular()."', rut_empleado_recibe = '".$analisis_muestras->get_rut_empleado_recibe()."' WHERE id_analisis_muestras = '".$analisis_muestras->get_id_analisis_muestras()."'";
		if(!$this->mysqli->query($query)){
			$mensaje = "Error";
		}else{
			$mensaje = "Éxito";
		}
		$this->desconectar();
		return $mensaje;
	}

	public function leer_analisis_muestras($id_analisis_muestras){
		$this->conectar();
		$query = "SELECT fecha_recepcion, temperatura_muestra, cantidad_muestra, codigo_empresa, codigo_particular, rut_empleado_recibe FROM analisis_muestras WHERE id_analisis_muestras = $id_analisis_muestras";
   		$objeto = null;

		if ($resultado = $this->mysqli->query($query)) {
			
   			if($fila = $resultado->fetch_row()) {
   				$objeto = new AnalisisMuestras();
   				$objeto->set_id_analisis_muestras($id_analisis_muestras);
   				$objeto->set_fecha_recepcion($fila[0]);
   				$objeto->set_temperatura_muestra($fila[1]);
   				$objeto->set_cantidad_muestra($fila[2]);
   				$objeto->set_codigo_empresa($fila[3]);
   				$objeto->set_codigo_particular($fila[4]);
   				$objeto->set_rut_empleado_recibe($fila[5]);
    		}
		}
		$this->desconectar();
  		return $objeto;
	}

	public function leer_todo_analisis_muestras(){
		$this->conectar();
		$query = "SELECT id_analisis_muestras, fecha_recepcion, temperatura_muestra, cantidad_muestra, codigo_empresa, codigo_particular, rut_empleado_recibe FROM analisis_muestras";
		$lista = null;

		if ($resultado = $this->mysqli->query($query)) {

    		while($fila = $resultado->fetch_row()) {
    			$o = new AnalisisMuestras();
    			$o->set_id_analisis_muestras($fila[0]);
   				$o->set_fecha_recepcion($fila[1]);
   				$o->set_temperatura_muestra($fila[2]);
   				$o->set_cantidad_muestra($fila[3]);
   				$o->set_codigo_empresa($fila[4]);
   				$o->set_codigo_particular($fila[5]);
   				$o->set_rut_empleado_recibe($fila[6]);

		        $lista[] =  $o;
    		}
		}
		$this->desconectar();
    	return $lista;
	}

	public function leer_todo_analisis_muestras_rut($rut_empleado_recibe){
		$this->conectar();
		$query = "SELECT id_analisis_muestras, fecha_recepcion, temperatura_muestra, cantidad_muestra, codigo_empresa, codigo_particular FROM analisis_muestras WHERE rut_empleado_recibe = $rut_empleado_recibe ORDER BY fecha_recepcion";
		$lista = null;

		if ($resultado = $this->mysqli->query($query)) {

    		while($fila = $resultado->fetch_row()) {
    			$o = new AnalisisMuestras();
    			$o->set_id_analisis_muestras($fila[0]);
   				$o->set_fecha_recepcion($fila[1]);
   				$o->set_temperatura_muestra($fila[2]);
   				$o->set_cantidad_muestra($fila[3]);
   				$o->set_codigo_empresa($fila[4]);
   				$o->set_codigo_particular($fila[5]);
   				$o->set_rut_empleado_recibe($rut_empleado_recibe);

		        $lista[] =  $o;
    		}
		}
		$this->desconectar();
    	return $lista;
	}

	public function leer_analisis_muestras_no_procesadas(){
		$this->conectar();
		$query = "SELECT DISTINCT a.id_analisis_muestras, a.fecha_recepcion, a.temperatura_muestra, a.cantidad_muestra, a.codigo_empresa, a.codigo_particular, a.rut_empleado_recibe FROM analisis_muestras a JOIN resultado_analisis r ON a.id_analisis_muestras = r.id_analisis_muestras WHERE r.estado = 'P'";
		$lista = null;

		if ($resultado = $this->mysqli->query($query)) {

    		while($fila = $resultado->fetch_row()) {
    			$o = new AnalisisMuestras();
    			$o->set_id_analisis_muestras($fila[0]);
   				$o->set_fecha_recepcion($fila[1]);
   				$o->set_temperatura_muestra($fila[2]);
   				$o->set_cantidad_muestra($fila[3]);
   				$o->set_codigo_empresa($fila[4]);
   				$o->set_codigo_particular($fila[5]);
   				$o->set_rut_empleado_recibe($fila[6]);

		        $lista[] =  $o;
    		}
		}
		$this->desconectar();
    	return $lista;
	}

	public function leer_analisis_muestras_procesadas_tecnico($rut_empleado_analista){
		$this->conectar();
		$query = "SELECT DISTINCT a.id_analisis_muestras, a.fecha_recepcion, a.temperatura_muestra, a.cantidad_muestra, a.codigo_empresa, a.codigo_particular, a.rut_empleado_recibe FROM analisis_muestras a JOIN resultado_analisis r ON a.id_analisis_muestras = r.id_analisis_muestras WHERE r.estado = 'T' AND r.rut_empleado_analista = $rut_empleado_analista";
		$lista = null;

		if ($resultado = $this->mysqli->query($query)) {

    		while($fila = $resultado->fetch_row()) {
    			$o = new AnalisisMuestras();
    			$o->set_id_analisis_muestras($fila[0]);
   				$o->set_fecha_recepcion($fila[1]);
   				$o->set_temperatura_muestra($fila[2]);
   				$o->set_cantidad_muestra($fila[3]);
   				$o->set_codigo_empresa($fila[4]);
   				$o->set_codigo_particular($fila[5]);
   				$o->set_rut_empleado_recibe($fila[6]);

		        $lista[] =  $o;
    		}
		}
		$this->desconectar();
    	return $lista;
	}

	public function leer_analisis_muestras_cliente($cod_cliente){
		$this->conectar();
		$lista = null;

		$empresabd = new EmpresaBD();
		if($empresabd->leer_empresa($cod_cliente)!=null){
			$query = "SELECT id_analisis_muestras, fecha_recepcion, temperatura_muestra, cantidad_muestra, rut_empleado_recibe FROM analisis_muestras WHERE codigo_empresa = '$cod_cliente' ";

			if ($resultado = $this->mysqli->query($query)) {

    			while($fila = $resultado->fetch_row()) {
    				$o = new AnalisisMuestras();
    				$o->set_id_analisis_muestras($fila[0]);
   					$o->set_fecha_recepcion($fila[1]);
   					$o->set_temperatura_muestra($fila[2]);
   					$o->set_cantidad_muestra($fila[3]);
   					$o->set_codigo_empresa($cod_cliente);
	   				$o->set_rut_empleado_recibe($fila[4]);

			        $lista[] =  $o;
    			}
			}
		}
		else{
			$query = "SELECT id_analisis_muestras, fecha_recepcion, temperatura_muestra, cantidad_muestra, rut_empleado_recibe FROM analisis_muestras WHERE codigo_particular = '$cod_cliente' ";

			if ($resultado = $this->mysqli->query($query)) {

    			while($fila = $resultado->fetch_row()) {
	    			$o = new AnalisisMuestras();
    				$o->set_id_analisis_muestras($fila[0]);
   					$o->set_fecha_recepcion($fila[1]);
   					$o->set_temperatura_muestra($fila[2]);
   					$o->set_cantidad_muestra($fila[3]);
   					$o->set_codigo_particular($cod_cliente);
   					$o->set_rut_empleado_recibe($fila[4]);

		        	$lista[] =  $o;
    			}
			}
		}
		
		$this->desconectar();
    	return $lista;
	}

}
?>