<?php
$archivo = "assets/acceder.html";
$titulo = "Acceso";
$descripcion = "Registrarse para jugar en Dino Jump";
$h1 = "Accede";

require("php/preload.php");
require("php/conexion.php");

mysqli_select_db($conexion, BASEDATOS) or die ("error2".mysqli_error());
$consulta = mysqli_query($conexion, "SELECT * FROM usuarios WHERE USUARIO='$_GET[nombreusuario]'");
if (!$consulta){
    die("error3".mysqli_error());
}
mysqli_data_seek($consulta, 0);
while(true){
    $linea = mysqli_fetch_row($consulta);
    if (!$linea){
         break;
    }
    $usuarioreq['nombreusuario'] = $linea[0];
    $usuarioreq['email'] = $linea[1];
    $usuarioreq['avatar'] = $linea[3];
    $usuarioreq['mayor'] = $linea[4];
    $usuarioreq['fechamayor'] = $linea[5];
    $usuarioreq['ultimo'] = $linea[6];
    $usuarioreq['fechaultimo'] = $linea[7];
    $usuarioreq['fecharegistro'] = $linea[8];
}

doctype($titulo, $descripcion);
bodyheader($h1);
bodyasides();
?>
    <article id="firstarticle">
        <h2>Perfil: <span class="nombreusuario"><? echo $usuarioreq['nombreusuario'] ?></span></h2>
        <img class="perfilprinc" src="<? echo $usuarioreq['avatar'] ?>" alt="Imagen de <? echo $usuarioreq['nombreusuario'] ?>" />
        <dl id="infousuario">
            <dt>Nombre de usuario: </dt><dd><? echo $usuarioreq['nombreusuario'] ?></dd>
            <dt>Email: </dt><dd><a href="mailto:<? echo $usuarioreq['email'] ?>"><? echo $usuarioreq['email'] ?></a></dd>
            <dt>Fecha de registro: </dt><dd><? echo $usuarioreq['fecharegistro'] ?></dd>
            <dt>Ultima puntuación: </dt><dd><? echo $usuarioreq['ultimo'] ?>, el <? echo $usuarioreq['fechaultimo'] ?></dd>
            <dt>Mayor puntuación: </dt><dd><? echo $usuarioreq['mayor'] ?>, el <? echo $usuarioreq['fechamayor'] ?></dd>
        </dl>
    </article>
<?
footer();
?>
