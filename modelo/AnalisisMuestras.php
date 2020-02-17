<?php
class AnalisisMuestras{
	private $id_analisis_muestras;
	private $fecha_recepcion;
	private $temperatura_muestra;
	private $cantidad_muestra;
	private $codigo_empresa; 
	private $codigo_particular;
	private $rut_empleado_recibe;

	public function __construct(){
		$this->id_analisis_muestras=0;
		$this->fecha_recepcion="";
		$this->temperatura_muestra=0;
		$this->cantidad_muestra=0;
		$this->codigo_empresa=0;
		$this->codigo_particular=0;
		$this->rut_empleado_recibe="";

	}


	public function get_id_analisis_muestras(){
		return $this->id_analisis_muestras;
	}

	public function set_id_analisis_muestras ($valor){
		$this->id_analisis_muestras = $valor;
	}
	public function get_fecha_recepcion(){
		return $this->fecha_recepcion;
	}

	public function set_fecha_recepcion ($valor){
		$this->fecha_recepcion = $valor;
	}
	public function get_temperatura_muestra(){
		return $this->temperatura_muestra;
	}

	public function set_temperatura_muestra($valor){
		$this->temperatura_muestra = $valor;
	}
	public function get_cantidad_muestra(){
		return $this->cantidad_muestra;
	}

	public function set_cantidad_muestra($valor){
		$this->cantidad_muestra = $valor;
	}
	public function get_codigo_empresa(){
		return $this->codigo_empresa;
	}

	public function set_codigo_empresa($valor){
		$this->codigo_empresa = $valor;
	}
	public function get_codigo_particular(){
		return $this->codigo_particular;
	}

	public function set_codigo_particular($valor){
		$this->codigo_particular = $valor;
	}
	public function get_rut_empleado_recibe(){
		return $this->rut_empleado_recibe;
	}

	public function set_rut_empleado_recibe ($valor){
		$this->rut_empleado_recibe = $valor;
	}

	public function listar_analisisMuestras(){
    $listar = "--Datos de la muestras  --<br>";
	$listar .= "id del analisis de las muestras ".$this->get_id_analisis_muestras()."<br>";
	$listar .= "fecha de recepcion ".$this->get_fecha_recepcion()."<br>";
	$listar .= "temperatura de las muestras".$this->get_temperatura_muestra()."<br>";
	$listar .= "cantidad de las muestras".$this->get_cantidad_muestra()."<br>";
	$listar .= "codigo de la empresa".$this->get_codigo_empresa()."<br>";
	$listar .= "codigo particular".$this->get_codigo_particular()."<br>";
	$listar .= "rut empleado que recibe".$this->get_rut_empleado_recibe()."<br>";
	echo $listar;
   }
}

?>