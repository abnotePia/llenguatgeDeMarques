<?php
	require "header.php";
?>
		<div class="container m-5 mx-auto col-4 offset-4 text-white">
			<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method="post">
				<div class="form-group">
					<label for="username">Nom d'usuari:</label>
					<input type="text" class="form-control" name="username" id="username" />
				</div>
				<div class="form-group">
					<label for="pass">Contrasenya:</label>
					<input type="password" class="form-control" name="pass" id="pass" />
				</div>
				<div class="form-group text-right">
					<button type="submit" class="btn btn-default">Entrar</button>
				</div>
				<?php
				if (empty($_POST)==false) {
					include "config.php";
					$usuari=$_POST["username"];
					$contra=$_POST["pass"];
					$sql = "SELECT id_client FROM clients WHERE nom_usuari = '$usuari' AND contrasenya = '$contra'";
					$result =$conn ->query($sql);
					$row = $result->fetch_assoc();
					if ($row["id_client"] != "") {
					$_SESSION['id'] = $row["id_usuari"];
					header("Location: comprar.php");
					}
					else {
						echo "<div class=\"alert alert-danger\" role=\"alert\">Error! Contrasenya o nombre de usuario incorrectos</div>";
					}
				}

				?>
			</form>
		</div>
	</body>
</html>
