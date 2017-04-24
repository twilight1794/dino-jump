<?php
define("SERVIDOR","mysql.hostinger.mx");
define("BASEDATOS","u668904594_juego");
define("USUARIO","u668904594_juego");
define("CONTRASEÑA","dinojumprules");
$conexion = mysqli_connect(SERVIDOR,USUARIO,CONTRASEÑA) or die ("error1".mysqli_error("error1"));
/*
mysql_select_db(BASEDATOS,$conexion) or die ("error2".mysql_error());
*/
?>
