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
			$enviar=true;
			$gmail=false;
			if (isset($_POST["gmail"])) {
			if(!strpos($_POST["correo"], "@")) {
						$enviar=false;
						header("Location: index.php?error_mail=1");
			}
			$gmail=true;
			}

				if (empty($_POST)==false) {
					if (!file_exists("files")) {
						mkdir("files");
					}
					$destination_path ="files/".$_FILES['archivo']['name']; 
					$extension= explode(".", $destination_path);

					if (comrpovar($extension)==3 && $enviar){
					move_uploaded_file($_FILES['archivo']['tmp_name'],$destination_path);
					$Year =strval(date("Y"));
					$Month = strval(date("m"));
					$day=strval(date("d"));
					$nombre=$Year.$Month.$day;
					for ($i=0;$i<5;$i++) {
					$numeros=strval(rand(0,9));
					$nombre=$nombre.$numeros;
					}
					rename($destination_path,"files/".$nombre.".".$extension[1]);
					if ( $gmail == true ) {
					mail($_POST["correo"],"Compartir",mensage());
					}
					echo "<h1>Archivo Enviado Correctamente</h1>";
					if (empty($_POST["nombre"])){
						echo "<p>Oye tu!! Usa éste link para compartir tu archivo</p>";
				}
					else {
					echo "<p> Hola $_POST[nombre], usa éste link para compartir tu archivo</p>";
				}
					$i=0;
					if (empty($_COOKIE["numero"]) == false ) {
					$i=$_COOKIE["numero"];}
					$idemail="email".strval($i);
					setcookie($idemail,"files/$nombre.$extension[1]",time()+604800);
					$i++;
					setcookie("numero",$i);
					echo "<a href=\"files/$nombre.$extension[1]\">files/$nombre.$extension[1]</a>";
				
			}
				else if (comrpovar($extension)==1){
					echo "Extension del archivo no soportada";
				}
				else if (comrpovar($extension)==2){
					echo "MES GRAN";
			}

			}
		else {
			
			echo "Vacio";
		}

		function mensage() {
			$mensage=$_POST["mensage"];
			if (empty($_POST["mensage"])) {
				$mensage="Sorpresa!! Alguien ha compartido contigo un archivo.";
			}
			return $mensage;
		}

			function comrpovar($extension) {
			$correcte=0;
			if (filesize($_FILES['archivo']['tmp_name'])<=10485760) {
				$correcte++;
			}
			
			if (($extension[1]=="pdf" || $extension[1]=="png" || $extension[1]=="jpg" || $extension[1]=="rar" || $extension[1]=="zip")) {
				$correcte=$correcte+2;
			}
			return $correcte;
			}
			?>

	</body>
</html>