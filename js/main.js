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
    } else {
        audiobg.pause();
        volanterior = volcontrol.value;
        volcontrol.value = 0;
        volcontrol.disabled = true;
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
    }
}
