<?php
	require "header.php";
	include "config.php";
	include "common/carrito.php";
?>
		<div class="container m-5 mx-auto">
			<div class="col-8 offset-2">
				<h3 class="text-white">Contingut del carrito</h3>
				<table class="table">        
					<tr> 
						<th>Producte</th> 
						<th class="text-right">Preu</th>
						<th class="text-right">Unitats</th>
						<th class="text-right">Import</th>
					</tr>
					<?php
					$cont=0;
					while ($cont<sizeof($_SESSION["carrito"])) {
						$codigo = $_SESSION["carrito"][$cont]["codi"];
						$nombreProducto = $_SESSION["carrito"][$cont]["nom"];
						$precio = $_SESSION["carrito"][$cont]["preu"];
						$unidades = $_SESSION["carrito"][$cont]["quantitat"];
						$importProducte2 = importProducte($_SESSION["carrito"][$cont]["codi"]);
						$importotal = importTotal();
						if ($_GET["codi"] != $codigo) {
							echo "
							<tr> 
							<th>$nombreProducto</th> 
							<th class=\"text-right\">$precio</th>
							<th class=\"text-right\">$unidades</th>
							<th class=\"text-right\">$importProducte2</th>
							<th class=\"text-right\"><a href=\"carrito.php?codi=$codigo\" ><img src=\"images/delete.png\" onmouseover=\"focus333(this);\" onmouseout=\"focus222(this);\" style=\"height: 50px;\"/></a></th>
							</tr>
							";
						}
						else {
							eliminarProducte($codigo);
							header("Location: carrito.php");
						}
						$cont++;
					}
					
					$codigo = $_POST["codi"];
					$sql = "SELECT* FROM productes where codi like '$codigo'";
					$result =$conn ->query($sql);
					$row = $result->fetch_assoc();
					if (afegirProducte($_POST["codi"],$row["nom"],$row["preu"],$_POST["quantitat"])) {
						header("Location: carrito.php");

					}

					echo "
					<tr class=\"bg-info\"> 
						<th colspan=\"3\" scope=\"row\" class=\"text-right\">							
							Import total
						</td>
						<td class=\"align-middle text-right\">$importotal €</td>
					</tr>";
					?>
				</table>
				<div class="text-right">
					<a href="comprar.php" class="btn btn-outline-secondary mx-2">Afegir més productes</a>
					<a href="index.php" class="btn btn-secondary">Finalitzar la compra</a>
				</div>
			</div>
		</div>
		<script type="text/javascript">

		function focus333(obj) {
			obj.src="images/delete_hover.png";
		}
		function focus222(obj) {
			obj.src="images/delete.png";
		}
		</script>
	</body>
	
</html>
