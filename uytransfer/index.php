<!doctype html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>PHP</title>
		<link rel="stylesheet" type="text/css" href="css/estilos.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	</head>

	<body>
			<?php	
			include "header.php";
			echo "<nav>";
				cabezero();
			echo "</nav>";
			if (empty($_GET)==false){
			if ($_GET["error_mail"]==1) {
				echo "<div class= \" offset-3 alert alert-danger col-5 border \">Error! Correo electronico no correcto</div>";
			}
		}
	
			echo "<form name=\"datos\" action=\"upload.php\" method=\"post\" enctype=\"multipart/form-data\" class=\"col-12 \">
			<div class=\"col-12 my-3\">
			<input type=\"text\" name=\"nombre\" class=\"offset-3 col-4\" placeholder=\"Tu nombre \">
			</div>
			<div class=\"col-12\">
			<input type=\"file\" name=\"archivo\" class=\"offset-3\">
			</div>
			<div class=\"col-12 my-3\">
			<input type=\"checkbox\" name=\"gmail\" class=\"offset-3\">
			<label for=\"gmail \">Quiero enviar el link de descarga por email</label>
			</div>
			<div class=\"col-12 my-3\">
			<label for=\"correo \" class=\"offset-3 col-5 \">Gmail</label>
			<input type=\"text\" name=\"correo\" class=\"offset-3 col-5 \">
			</div>
			<div class=\"col-12 my-3\">
			<label for=\"mensage \" class=\"offset-3 col-5 \">Mensage</label>
			<textarea name=\"mensage\" class=\"offset-3 col-5\"></textarea>
			</div>
			<button type=\"submit\" class=\"offset-4 col-3 offset-3  btn btn-primary\">Subir archivo</button>
			</form>"; 
		
			
	
			?>
 	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
	</body>
</html>