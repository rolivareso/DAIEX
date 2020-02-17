<?php
class Usuario {
	private $rut_usuario;
	private $clave_usuario;
	private $tipo_usuario; 
	private $estado_usuario; 

	public function __construct(){
		$this->rut_usuario=0;
		$this->clave_usuario="";
		$this->tipo_usuario=0;
	}
	public function get_rut_usuario(){
		return $this->rut_usuario;
	}

	public function set_rut_usuario($valor){
		$this->rut_usuario = $valor;
	}
	public function get_clave_usuario(){
		return $this->clave_usuario;
	}

	public function set_clave_usuario($valor){
		$this->clave_usuario= $valor;
	}
	public function get_tipo_usuario(){
		return $this->tipo_usuario;
	}

	public function set_tipo_usuario($valor){
		$this->tipo_usuario= $valor;
	}
	public function get_estado_usuario(){
		return $this->estado_usuario;
	}

	public function set_estado_usuario($valor){
		$this->estado_usuario= $valor;
	}
	public function listar_usuario(){
		$listar = "--Datos del usuario --<br>";
		$listar .= "rut: ".$this->get_rut_usuario()."<br>";
		$listar .= "clave: ".$this->get_clave_usuario()."<br>";
		$listar .= "tipo: ".$this->get_tipo_usuario()."<br>";
		echo $listar;


	}
}
?>