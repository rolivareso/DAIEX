<?php
class Empleado{
	private $rut_empleado;
	private $nombre_empleado;

	public function __construct(){
		
		$this->rut_empleado="";
		$this->nombre_empleado="";
	}
	public function get_rut_empleado(){
		return $this->rut_empleado;
	}

	public function set_rut_empleado($valor){
		$this->rut_empleado = $valor;
	}
	public function get_nombre_empleado(){
		return $this->nombre_empleado;
	}

	public function set_nombre_empleado($valor){
		$this->nombre_empleado = $valor;
	}

	public function listar_empleado(){
    $listar = "--Datos del empleado --<br>";
	$listar .= "rut del empleado".$this->get_rut_empleado()."<br>";
	$listar .= "nombre del empleado ".$this->get_nombre_empleado()."<br>";
	echo $listar;
   }


}
?>