<?php
$archivo = "assets/index.html";
$titulo = "Dino Jump";
$descripcion = "Un port libre y de código abierto del famoso juego del dinosaurio de Chrome, con diversos añadidos";
$h1 = "Dino Jump";
require ("php/preload.php");
doctype($titulo, $descripcion);
bodyheader($h1);
bodyasides();
getFileResource($archivo);
footer();
?>
