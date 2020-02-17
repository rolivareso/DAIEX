<?php
class Particular{
	private $codigo_particular;
	private $rut_particular;
	private $nombre_particular;
	private $direccion_particular;
	private $email_particular; 
	private $telefono_particular; 

	public function __construct(){
		$this->codigo_particular=0;
		$this->rut_particular="";
		$this->nombre_particular="";
		$this->direccion_particular="";
		$this->email_particular="";
		$this->telefono_particular="";
	}
	public function get_codigo_particular(){
		return $this->codigo_particular;
	}

	public function set_codigo_particular($valor){
		$this->codigo_particular = $valor;
	}
	public function get_rut_particular(){
		return $this->rut_particular;
	}

	public function set_rut_particular($valor){
		$this->rut_particular = $valor;
	}

	public function get_nombre_particular(){
		return $this->nombre_particular;
	}

	public function set_nombre_particular($valor){
		$this->nombre_particular = $valor;
	}
	public function get_direccion_particular(){
		return $this->direccion_particular;
	}

	public function set_direccion_particular($valor){
		$this->direccion_particular = $valor;
	}
	public function get_email_particular(){
		return $this->email_particular;
	}

	public function set_email_particular($valor){
		$this->email_particular = $valor;
	}
	public function get_telefono_particular(){
		return $this->telefono_particular;
	}

	public function set_telefono_particular($valor){
		$this->telefono_particular = $valor;
	}
	public function listar_particular(){
		$listar = "--Datos del particular --<br>";
		$listar .= "codigo del particular: ".$this->get_codigo_particular()."<br>";
		$listar .= "rut del particular : ".$this->get_rut_particular()."<br>";
		$listar .= "nombre del particular".$this->get_nombre_particular()."<br>";
		$listar .= "direccion del particular".$this->get_direccion_particular()."<br>";
		$listar .= "email del particular ".$this->get_email_particular()."<br>";
		$listar .= "telefono del particular ".$this->get_telefono_particular()."<br>";
		echo $listar;

	}

}

?>