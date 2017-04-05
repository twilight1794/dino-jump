<?php
define("SERVIDOR","localhost");
define("BASEDATOS","u668904594_juego");
define("USUARIO","u668904594_juego");
define("CONTRASEÑA","dinojumprules");
$conexion = mysql_connect(SERVIDOR,USUARIO,CONTRASEÑA);
mysql_select_db(BASEDATOS,$conexion);
?>
