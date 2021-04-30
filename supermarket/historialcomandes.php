<?php
include "header.php";
include "config.php";
$ac2 = "";
if (empty($_SESSION["historial"]) == false) {
      foreach ($_SESSION["historial"] as $aw) {
            foreach($aw as $r) {
                  $ac2 .=$r;    
            }
      }
}

$actual = $_SESSION["carrito"];
foreach($actual as $ac) {
      foreach($ac as $a) {
            $ac2 = $ac2." ".$a;
      }
}
echo $ac2;
$_SESSION["historial"] = $ac2;
if ($_SESSION["carrito"] == null) {
$_SESSION["historial"] = $actual;
}
$_SESSION["carrito"] = null;
?>