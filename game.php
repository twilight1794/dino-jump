<?php
$archivo = "assets/game.html";
$titulo = "A jugar Dino Jump";
$descripcion = "Página del juego";
$h1 = "Juega Dino Jump";
require ("php/preload.php");
doctype($titulo, $descripcion);
bodyheader($h1);
bodyasides();
?>
    <article id="firstarticle" class="juegocompleto">
        <section id="botonera">
            <button id="btnSound">Sonido activado</button>
            <button id="btnRestart">Iniciar</button>
            <div><label for="volumenrg">Volumen: </label><input type="range" min="0" max="1" value="1" step="0.1" id="volumenrg" /></div>
        </section>
        <div id="juego"></div>
<?php
    echo "        <script type=\"text/javascript\">\n";
    if ($_GET["paisaje"] == "desierto") {
        echo "paisaje = \"desierto\";\n";
    } elseif ($_GET["paisaje"] == "selva") {
        echo "paisaje = \"selva\";\n";
    } else {
        echo "paisaje = \"null\";\n";
    }
    if ($_GET["personaje"] == "rex") {
        echo "personaje = \"rex\";\n";
    } elseif ($_GET["personaje"] == "bunny") {
        echo "personaje = \"bunny\";\n";
    } else {
        echo "personaje = \"null\";\n";
    }
    echo "        </script>\n";
?>
        <section id="barraestado">
            <div><label for="volumenrg">Progreso: </label><meter value="0" min="0" max="100" low="0" high="100" optimum="100">Puntuación</meter></div>
            <div><label for="volumenrg">Puntuación: </label><output for="juego">0</output></div>
        </section>
        <audio id="audiobg" src="ogg/Dino_Jump_Track.ogg" loop preload="auto"></audio>
    </article>
<?php
footer();
?>
