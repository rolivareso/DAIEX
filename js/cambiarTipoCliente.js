function cambiarTipoCliente(){
	var tipoCliente = document.getElementById("ddlTipoCliente").value;
	
	if(tipoCliente === "Particular"){
		location.href ="../vista/registro_cliente_particular.php";
	}else if (tipoCliente === "Empresa"){
		location.href ="../vista/registro_cliente_empresa.php";
	}
}
	