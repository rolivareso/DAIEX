<?php
Class Conexion{
	protected $mysqli;

	public function conectar(){
		$this->mysqli = new mysqli("localhost", "root", null, "isp");
		if($this->mysqli->connect_errno){
			echo "Falló la conexión con MYSQL: (".$this->mysqli->connect_errno.")".$this->mysqli->connect_error;
		}
	}

	public function desconectar(){
		$this->mysqli = null;
	}
}
	
?>