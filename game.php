<?php
$archivo = "assets/game.html";
$titulo = "A jugar Dino Jump";
$descripcion = "Página del juego";
$h1 = "Juega Dino Jump";
require ("php/preload.php");
doctype($titulo, $descripcion);
bodyheader($h1);
bodyasides();
getFileResource($archivo);
footer();
?>
