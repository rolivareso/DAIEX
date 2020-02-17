<?php
class ResultadoAnalisis{
	private $id_tipo_analisis;
	private $id_analisis_muestras;
	private $fecha_registro;
	private $ppm;
	private $estado;
	private $rut_empleado_analista; 

	public function __construct(){
		$this->id_tipo_analisis=0;
		$this->id_analisis_muestras=0;
		$this->fecha_registro="";
		$this->ppm=0;
		$this->estado="";
		$this->rut_empleado_analista="";
	}
	public function get_id_tipo_analisis(){
		return $this->id_tipo_analisis;
	}

	public function set_id_tipo_analisis($valor){
		$this->id_tipo_analisis = $valor;
	}
	public function get_id_analisis_muestra(){
		return $this->id_analisis_muestras;
	}

	public function set_id_analisis_muestra($valor){
		$this->id_analisis_muestras = $valor;
	}
	public function get_fecha_registro(){
		return $this->fecha_registro;
	}

	public function set_fecha_registro($valor){
		$this->fecha_registro= $valor;
	}
	public function get_ppm(){
		return $this->ppm;
	}

	public function set_ppm($valor){
		$this->ppm = $valor;
	}
	public function get_estado(){
		return $this->estado;
	}

	public function set_estado($valor){
		$this->estado = $valor;
	}
	public function get_rut_empleado_analista(){
		return $this->rut_empleado_analista;
	}

	public function set_rut_empleado_analista($valor){
		$this->rut_empleado_analista = $valor;
	}

	public function listar_resultadoAnalisis(){
    $listar = "--Datos del resultado --<br>";
	$listar .= "id del tipo de analisis".$this->get_id_tipo_analisis()."<br>";
	$listar .= "id del analisis de las muestras ".$this->get_id_analisis_muestra()."<br>";
	$listar .= "fecha del registro ".$this->get_fecha_registro()."<br>";
	$listar .= "PPM".$this->get_ppm()."<br>";
	$listar .= "estado".$this->get_estado()."<br>";
	$listar .= "rut del empleado analista".$this->get_rut_empleado_analista()."<br>";

	echo $listar;
   }


}


?>