<?php
	require "header.php";
?>
		<div class="container m-5 mx-auto">
			<div class="row">
				<div class="col-2 offset-1">
					<div class="list-group">
						<a href="comprar.php?cat=1" class="list-group-item list-group-item-action">Arròs</a>
						<a href="comprar.php?cat=2" class="list-group-item list-group-item-action">Begudes</a>
						<a href="comprar.php?cat=3" class="list-group-item list-group-item-action">Drogueria</a>
						<a href="comprar.php?cat=4" class="list-group-item list-group-item-action">Conserves</a>
						<a href="comprar.php?cat=5" class="list-group-item list-group-item-action">Esmorzars</a>
						<a href="comprar.php?cat=6" class="list-group-item list-group-item-action">Mascotes</a>
						<a href="comprar.php?cat=7" class="list-group-item list-group-item-action">Lactis i ous</a>
						<a href="comprar.php?cat=8" class="list-group-item list-group-item-action">Llegums</a>
						<a href="comprar.php?cat=9" class="list-group-item list-group-item-action">Oli, vinagre i sal</a>
						<a href="comprar.php?cat=10" class="list-group-item list-group-item-action">Pasta</a>
						<a href="comprar.php?cat=11" class="list-group-item list-group-item-action">Salses i espècies</a>
						<a href="comprar.php?cat=12" class="list-group-item list-group-item-action">Snacks i aperitius</a>
						<a href="comprar.php?cat=13" class="list-group-item list-group-item-action">Sopa i puré</a>
					</div>
				</div>
				<div class="col-8">						 
							<?php
							include "config.php";
							if (empty($_GET)==false) {
							$id = $_GET["cat"]; 
							$sql = "SELECT productes.codi,productes.categoria,productes.nom,productes.preu,productes.imatge,categories.nom as cat FROM productes
							inner join categories on categories.id_categoria =  productes.categoria
							where categories.id_categoria = $id
							";
							$result =$conn ->query($sql);
							$row = $result->fetch_assoc();
							echo "
							<h3 class=\"text-white\">$row[cat]</h3>
						<table class=\"table\">        
							<tr> 
								<th>Producte</th> 
								<th>Categoria</th>
								<th class=\"text-right\">Preu</th>
								<th></th>
							</tr>";
							}
							else {
								echo "
								<h3 class=\"text-white\">Els nostres productes</h3>
								<table class=\"table\">        
									<tr> 
										<th>Producte</th> 
										<th>Categoria</th>
										<th class=\"text-right\">Preu</th>
										<th></th>
									</tr>";
								$sql = "SELECT productes.codi,productes.categoria,productes.nom,productes.preu,productes.imatge,categories.nom as cat FROM productes
							inner join categories on categories.id_categoria =  productes.categoria";
							$result =$conn ->query($sql);
								$row = $result->fetch_assoc();
							}
								
								while ($row) {
									echo "<tr>
									<td class=\"align-middle\">
								<img src=\"$row[imatge]\" class=\"img-thumbnail mr-2\" style=\"height: 50px;\" />
								$row[nom]
							</td>
							<td class=\"align-middle\">$row[cat]</td>
							<td class=\"align-middle text-right\">$row[preu] €</td>
							<td class=\"align-middle\">
								<form class=\"form-inline\" action=\"carrito.php\" method=\"post\">
									<div class=\"form-group\">
										<input type=\"hidden\" name=\"codi\" value=\"$row[codi]\" />
										<input type=\"number\" class=\"form-control form-control-sm mr-2\" name=\"quantitat\" min=\"1\" value=\"1\" style=\"width: 50px;\" />
									</div>
									<button type=\"submit\" class=\"btn btn-primary\"><i class=\"fas fa-cart-plus\"></i></button>
								</form>
							</td> 
						</tr>";
								$row = $result->fetch_assoc();	
								}
								$conn->close();
							?>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>
