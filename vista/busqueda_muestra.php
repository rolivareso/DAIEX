<title>Búsqueda de una muestra</title>
<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Inicio</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>
<body>
<a class="navbar-brand isp-logo" href="../index.php"><strong>Instituto de Salud Pública</strong></a>
<!--Nav-->
<nav class="navbar navbar-expand-sm">
	<div class="container">
  	<ul class="navbar-nav">
	    <li class="nav-item">
      	<a class="nav-link" href="../index.php">Inicio</a>
    	</li>
    	<li class="nav-item">
      	<a class="nav-link" href="#">Clientes</a>
    	</li>
    	<?php
    		if(isset($_SESSION["sesionUsuario"]) == null){
    			echo 
    			'<li class="nav-item dropdown">
    			<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
	        		Intranet
      			</a>
      			<div class="dropdown-menu">
	        		<a class="dropdown-item" href="#">1</a>
        			<a class="dropdown-item" href="#">2</a>
      			</div>
      			</li>';
    		}
    	?>
  	</ul>
	</div>
</nav><!--Fin nav-->
<br><br>
<!--Contenido-->
<div class="container">
	<div class="row">
		Contenido

	</div>
</div>
<!--Footer-->
<footer>
	<hr>
	<div class="container">
		<div class="row text-center">
			<div class="col-md-12">
			<a href="#"><i class="fab fa-instagram redes-sociales"></i> </a>
			<a href="#"><i class="fab fa-snapchat-ghost redes-sociales"></i></a>
			<a href="#"><i class="fab fa-twitter redes-sociales"></i></a>
			<a href="#"><i class="fab fa-facebook-f redes-sociales"></i></a>				
			</div>
		</div>
		<div class="row text-center enlaces-footer">
			<div class="col-md-12">				
			<a href="../index.php">Inicio</a>
			<a href="#">Servicios</a>
			<a href="#">Clientes</a>
			<a href="#">Intranet</a>
			<a href="#">Política de Privacidad</a>
			</div>
		</div>
		<div class="row text-center">
			<div class="col-md-12">
				<span> ISP &#169; 2018</span>
			</div>
		</div>
	</div>
</footer><!--Fin footer-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>