<?php
$archivo = "assets/acceder.html";
$titulo = "Registro";
$descripcion = "Registrarse para jugar en Dino Jump";
$h1 = "Regístrate";
require ("php/preload.php");
doctype($titulo, $descripcion);
bodyheader($h1);
bodyasides();
getFileResource($archivo);
footer();
?>
