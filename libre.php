<?php
$archivo = "assets/libre.html";
$titulo = "Dino Jump";
$descripcion = "¿Por qué Dino Jump es especial?";
$h1 = "¿Por qué es especial?";
require ("php/preload.php");
doctype($titulo, $descripcion);
bodyheader($h1);
bodyasides();
getFileResource($archivo);
footer();
?>
