<?php
class Empresa
{
	private $codigo_empresa;
	private $rut_empresa;
	private $nombre_empresa;
	private $direccion_empresa;


	public function __construct(){
		$this->codigo_empresa=0;
		$this->rut_empresa="";
		$this->nombre_empresa="";
		$this->direccion_empresa="";
	}
	public function get_codigo_empresa(){
		return $this->codigo_empresa;
	}

	public function set_codigo_empresa($valor){
		$this->codigo_empresa = $valor;
	}
	public function get_rut_empresa(){
		return $this->rut_empresa;
	}

	public function set_rut_empresa($valor){
		$this->rut_empresa = $valor;
	}
	public function get_nombre_empresa(){
		return $this->nombre_empresa;
	}

	public function set_nombre_empresa($valor){
		$this->nombre_empresa = $valor;
	}

	public function get_direccion_empresa(){
		return $this->direccion_empresa;
	}

	public function set_direccion_empresa($valor){
		$this->direccion_empresa= $valor;
	}

	public function listar_empresa(){
		$listar = "--Datos de la empresa --<br>";
		$listar .= "codigo de la empresa: ".$this->get_codigo_empresa()."<br>";
		$listar .= "rut de la empresa: ".$this->get_rut_empresa()."<br>";
		$listar .= "nombre de la empresa ".$this->get_nombre_empresa()."<br>";
		$listar .= "direccion de la empresa ".$this->get_direccion_empresa()."<br>";
		
		echo $listar;


	}




}
?>