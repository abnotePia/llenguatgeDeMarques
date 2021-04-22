<?php
      function mensajeError($nombreusuario,$e,$adreca,$codi,$poblacio,$nom,$cognoms) {
            $error = array();
            if ($_POST["pass"] != $_POST["rp_pass"]) { $error[0] = "La contraseña no coincide"; }

            if (seguretatContrasenya($_POST["pass"]) != 3) { $error[1] = "La contraseña no es suficiente segura"; }
            
            if (!NIFValid($_POST["nif"])) { $error[2] = "DNI invalido"; }

		if ($e != null) { $error[2] = "DNI ya ha sido introducido";	}

            if (empty($_POST["mail"]) == false) {

                  if (!esEmail($_POST["mail"])) { $error[3] = "Email invalido"; }

            }
            if (!nomUsuariValid($nombreusuario)) {

                  if ("admin" != $nombreusuario) { $error[4] = "Nombre de usuario no valido"; }	

            }
            if($adreca === '') { $error[5] = "No se ha introducido nada en este campo"; }
            if ( $codi === '') { $error[6] = "No se ha introducido nada en este campo"; }
            if ($poblacio == null) { $error[7] = "No se ha introducido nada en este campo"; } 
            if($nom === '') { $error[8] = "No se ha introducido nada en este campo"; }
            if($cognoms === '') { $error[9] = "No se ha introducido nada en este campo"; }

            return $error;
      }


?>