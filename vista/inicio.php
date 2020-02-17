<?php
	include_once("../modelo/Usuario.php");
	include_once("../modelo/EmpresaBD.php");
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Inicio</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<link rel="stylesheet" type="text/css" href="../css/inicio.css">
</head>
<body>
<!--Nav-->
<?php
	include("nav.php");
?>
<!--Contenido-->
<div class="container">
	<h3 class="text-center titulo">Noticias</h3>
	<div class="row text-center">
		<div class="col-md-2"></div>
		<div class="col-xs-12 col-md-8">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. </p>
		</div>
		<div class="col-md-2"></div>
	</div>
	<br>
	<div id="row-noticias" class="row text-center border">
		<div class="col-md-4 border border-left-0 border-bottom-0 border-top-0">
			<a href="" data-toggle="tooltip" title="Noticia 1"><img src="../imagenes/img-noticia1.jpg" class="img-thumbnail"></a>
			<h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h4><br>
			Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			<br>
			<a href="#"><i class="fas fa-chevron-circle-right enlace-noticia"></i></a> 
		</div>
		<div class="col-md-4 border border-left-0 border-bottom-0 border-top-0">
			<a href=""  data-toggle="tooltip" title="Noticia 2"><img src="../imagenes/img-noticia2.jpg" class="img-thumbnail"></a>
			<h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h4><br>
			Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			<br>
			<a href="#"><i class="fas fa-chevron-circle-right enlace-noticia"></i></a> 
		</div>
		<div class="col-md-4">
			<a href=""  data-toggle="tooltip" title="Noticia 3"><img src="../imagenes/img-noticia3.jpg" class="img-thumbnail"></a>
			<h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h4><br>
			Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			<br>
			<a href="#"><i class="fas fa-chevron-circle-right enlace-noticia"></i></a> 
		</div>
	</div>
</div>
<!--Footer-->
<?php
	include("footer.php");
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>