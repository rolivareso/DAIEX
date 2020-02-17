<?php
class Contacto
{
	private $rut_contacto;
	private $nombre_contacto;
	private $email_contacto;
	private $telefono_contacto;
	private $codigo_empresa; 

	public function __construct(){
		$this->rut_contacto="";
		$this->nombre_contacto="";
		$this->email_contacto="";
		$this->telefono_contacto="";
		$this->codigo_empresa=0;
	}
	public function get_rut_contacto(){
		return $this->rut_contacto;
	}
	public function set_rut_contacto($valor){
		$this->rut_contacto=$valor; 
	}
	public function get_nombre_contacto(){
		return $this->nombre_contacto;

	}
	public function set_nombre_contacto($valor){
		$this->nombre_contacto=$valor; 
	}
	public function get_email_contacto(){
		return $this->email_contacto;

	}
	public function set_email_contacto($valor){
		$this->email_contacto=$valor; 
	}
	public function get_telefono_contacto(){
		return $this->telefono_contacto;

	}
	public function set_telefono_contacto($valor){
		$this->telefono_contacto=$valor; 
	}
	public function get_codigo_empresa(){
		return $this->codigo_empresa;

	}
	public function set_codigo_empresa($valor){
		$this->codigo_empresa=$valor; 
	}

	public function listar_contacto(){
		$listar = "--Datos del contacto--<br>";
		$listar .= "rut del contacto: ".$this->get_rut_contacto()."<br>";
		$listar .= "nombre del contacto: ".$this->get_nombre_contacto()."<br>";
		$listar .= "email del contacto  ".$this->get_email_contacto()."<br>";
		$listar .= "telefono del contacto: ".$this->get_telefono_contacto()."<br>";
		$listar .= "codigo de la empresa".$this->get_codigo_empresa()."<br>";
		
		echo $listar;


	}




}


?>