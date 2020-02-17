<?php
class TipoAnalisis{
	private $id_tipo_analisis;
	private $nombre;
	private $estado_tipo_analisis;

	public function __construct(){
		$this->id_tipo_analisis=0;
		$this->nombre="";
		$this->estado_tipo_analisis="";
	}
	public function get_id_tipo_analisis(){
		return $this->id_tipo_analisis;
	}

	public function set_id_tipo_analisis($valor){
		$this->id_tipo_analisis = $valor;
	}

	public function get_nombre(){
		return $this->nombre;
	}

	public function set_nombre($valor){
		$this->nombre = $valor;
	}

	public function get_estado_tipo_analisis(){
		return $this->estado_tipo_analisis;
	}

	public function set_estado_tipo_analisis($valor){
		$this->estado_tipo_analisis = $valor;
	}

	public function listar_analisis(){
    $listar = "--Datos de la empresa --<br>";
	$listar .= "id del tipo de analisis".$this->get_id_tipo_analisis()."<br>";
	$listar .= "nombre del analisis".$this->get_nombre()."<br>";
	$listar .= "estado".$this->get_estado_tipo_analisis()."<br>";
	echo $listar;
   }
}
?>