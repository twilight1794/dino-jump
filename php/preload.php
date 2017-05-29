<?php
// require "dislines.php";
session_start();
/* Biblioteca para generar partes de HTML dinámicamente */
function doctype($titulo, $descripcion){
    echo "<!DOCTYPE HTML>\n<html>\n<head>\n";
    echo "    <title>" . $titulo . "</title>\n";
    echo "    <link rel=\"stylesheet\" type=\"text/css\" href=\"/css/main.css\" />\n";
    echo "    <link rel=\"icon\" type=\"image/svg+xml\" href=\"/favicon.svg\" />\n";
    echo "    <meta name=\"author\" content=\"Giovanni Alfredo Garciliano Díaz\" />\n";
    echo "    <meta name=\"copyright\" content=\"© 2017 Giovanni Alfredo Garciliano Díaz\" />\n";
    echo "    <meta name=\"robots\" content=\"index, follow\" />\n";
    echo "    <meta name=\"description\" content=\"" . $descripcion . "\" />\n";
    echo "    <meta name=\"viewport\" content=\"initial-scale=1.0, user-scalable=yes\" />\n";
    echo "    <meta charset=\"utf-8\">\n";
    echo "    <script src=\"js/main.js\" type=\"text/javascript\"></script>\n";
    echo "    <script src=\"js/snap.js\" type=\"text/javascript\"></script><!--Snap.svg-->\n";
    echo "</head>\n";
}

function bodyheader($h1){
    echo "<body>\n";
    echo "    <header>\n";
    echo "        <img src=\"/favicon.svg\" id=\"favicon-principal\"/>";
    echo "        <h1>" . $h1 . "</h1>\n";
    echo "        <nav><ul>\n";
    if (isset($_SESSION[nombreusuario])) {
        echo "            <li><a href=\"perfil.php?nombreusuario=" . $_SESSION[nombreusuario] . "\"><img src=\"$_SESSION[avatar]\" id=\"imgavatar\" /></a></li>\n";
        echo "            <li><a href=\"perfil.php?nombreusuario=" . $_SESSION[nombreusuario] . "\">" . $_SESSION[nombreusuario] . "</a></li>\n";
        echo "            <li><a href=\"procesar.php?accion=salida\">Salir</a></li>\n";
    } else {
        echo "            <li><a href=\"registro.php\">Registrarse</a></li>\n";
        echo "            <li><a href=\"acceder.php\">Acceder</a></li>\n";
    }
    echo "        </ul></nav>\n";
    echo "        </header>\n";
}

function bodyasides(){
    echo "    <aside id=\"jsrequired\">\n";
    echo "        <p>Bien, parece que vuestro navegador no soporta JavaScript, o lo tenés deshabilitado. Habilítalo, o <a href=\"https://www.mozilla.org/es-MX/firefox/new/\">descarga un navegador libre, seguro y actualizado que soporta JavaScript.</a></p>\n";
    echo "    </aside>\n";
    echo "    <aside id=\"cssrequired\">\n";
    echo "        <p>Bien, parece que vuestro navegador no soporta CSS, o lo tenés deshabilitado. Habilítalo, o <a href=\"https://www.mozilla.org/es-MX/firefox/new/\">descarga un navegador libre, seguro y actualizado que soporta CSS.</a></p>\n";
    echo "    </aside>\n";
}

function footer(){
    echo "    <footer>\n";
    echo "        <p>Hecho con <img src=\"img/amor.svg\" alt=\"amor\" id=\"amor\" /> desde México.</p>\n";
    echo "        <p>Este juego está publicado bajo la <a rel=\"license\" href=\"https://www.gnu.org/licenses/gpl.html\">GNU GPLv3</a>, así como este sitio web.</p>\n";
    echo "        <p>Copyright © 2017 Giovanni Alfredo Garciliano Díaz</p>\n";
    echo "    </footer>\n";
    echo "</body>\n";
    echo "</html>\n";
}

function getFileResource($archivo){
    $doc = fopen($archivo, "r");
    while(!feof($doc)) {
        $linea = fgets($doc);
        echo $linea;
    }
    fclose($doc);
}
