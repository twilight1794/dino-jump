/* Un sleep() */
function delay(nsegundos){
    objetivo = (new Date()).getTime() + 1000 * Math.abs(nsegundos);
    while ( (new Date()).getTime() < objetivo );
}

/* Oculta el aviso de JavaScript a los navegadores que sí lo soportan */
function jsRequired(){
    var ggg = document.getElementById("jsrequired");
    ggg.parentNode.removeChild(ggg);
}

/* Comprueba y envían el formulario */
function checkForm(){
    var primero = true;
    /* Asegura que se haya seleccionado un personaje */
    var radiobuttons = document.getElementsByName("personaje");
    for(var i = 0; i < radiobuttons.length; i++) {
        if (radiobuttons[i].checked == true) {
            break;
        } else {
            if (primero == false){
                return false;
            } else {
                primero = false;
                continue;
            }
        }
    }
    /* Asegura que se haya seleccionado un paisaje */
    primero = true;
    var radiobuttons2 = document.getElementsByName("paisaje");
    for(var i = 0; i < radiobuttons2.length; i++) {
        if (radiobuttons2[i].checked == true) {
            return true;
        } else {
            if (primero == false){
                return false;
            } else {
                primero = false;
                continue;
            }
        }
    }
}

function checkFormRegistro(){
    /* Comprueba que las contraseñas sean iguales */
    var pass1 = document.getElementById("contrasena1").value;
    var pass2 = document.getElementById("contrasena2").value;
    if (pass1 != pass2){
        return false;
    } else {
        return true;
    }
}

function submitForm(){
    if (checkForm() == true){
        ggg = document.getElementById("ajugar");
        ggg.value = "Enviando...";
        ggg.form.submit()
    }
}

function submitFormRegistro(){
    if (checkFormRegistro() == true){
        ggg = document.getElementById("registrarseb");
        ggg.value = "Accediendo...";
        ggg.form.submit()
    }
}

/* Funciones para opciones del juego */
function MuteDismuteSound(){
    if (audiobg.paused == true) {
        audiobg.play();
        volcontrol.disabled = false;
        volcontrol.value = volanterior;
        btnSound.childNodes[0].nodeValue = "Sonido activado";
    } else {
        audiobg.pause();
        volanterior = volcontrol.value;
        volcontrol.value = 0;
        volcontrol.disabled = true;
        btnSound.childNodes[0].nodeValue = "Sonido desactivado";
    }
}

/* Funciones para jugar */
function quitPxSuffix(propiedad){
    var p = "";
    for (var i = 0; i < 10; i++){
        if (propiedad[i] == "p") {
            return p;
        }
        p = p.concat(propiedad[i]);
    }
}

function dinoJump(theEvent){
     var event = window.event || theEvent;
     if (event.charCode == 32){
        imgp = document.getElementById("imgpersonaje");
        for (var i = 0; i < 50; i++){
            imgp.style.top = String(Number(quitPxSuffix(imgp.style.top)) - 1).concat("px");
            delay(50);
        }
     }
}

function isAlive(){
    return true;
}

function setPuntuacion(){
    output = document.getElementsByTagName("output")[0];
    while (isAlive()){
        setTimeout(function(){output.childNodes[0].nodeValue = String(Number(output.childNodes[0].nodeValue) + 4);}, 100);
    }
}

window.onload = function() {
    jsRequired();
    var pagvisitada = window.location.pathname;
    if (pagvisitada == "/index.php" || pagvisitada == "/"){
        buttonsubmit = document.getElementById("ajugar");
        buttonsubmit.onclick = submitForm;
    } else if (pagvisitada == "/registro.php"){
        buttonsubmit = document.getElementById("registrarseb");
        buttonsubmit.onclick = submitFormRegistro;
    } else if (pagvisitada == "/game.php"){
        volanterior = 1;
        /* Botón de sonido */
        audiobg = document.getElementById("audiobg");
        btnSound = document.getElementById("btnSound");
        btnSound.onclick = MuteDismuteSound;
        /* Control volumen */
        volcontrol = document.getElementById("volumenrg");
        volcontrol.addEventListener("change",function(ev){
            audiobg.volume = ev.target.value;
        },true);
        /* Paisaje */
        divjuego = document.getElementById("juego");
        imgfondo = document.createElement("img");
        imgpersonaje = document.createElement("img");
        if (paisaje == "desierto"){
            imgfondo.setAttribute("src","../img/game/desierto.svg");
        } else {
            imgfondo.setAttribute("src","../img/game/selva.svg");
        }
        /* Personaje */
        if (personaje == "rex"){
            imgpersonaje.setAttribute("src","../img/game/d-stop.png");
        } else {
            imgpersonaje.setAttribute("src","../img/game/c-stop.png");
        }
        imgfondo.style.opacity = ".5";
        imgfondo.style.width = "100%";
        imgfondo.id = "imgfondo";
        imgpersonaje.style.width = "48px";
        imgpersonaje.style.top = "0px";
        imgpersonaje.id = "imgpersonaje";
        divjuego.appendChild(imgfondo);
        divjuego.appendChild(imgpersonaje);
        /* Juego */
        document.onkeypress = dinoJump;
        firsttime = true;
    }
}
