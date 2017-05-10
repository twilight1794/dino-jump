<?php
$archivo = "assets/acceder.html";
$titulo = "Acceso";
$descripcion = "Registrarse para jugar en Dino Jump";
$h1 = "Accede";
require ("php/preload.php");
doctype($titulo, $descripcion);
bodyheader($h1);
bodyasides();
getFileResource($archivo);
footer();
?>
