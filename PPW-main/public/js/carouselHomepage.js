var currRadio = 1;
var maxItems = 8;
var angle = 0;

//Funzione che aggiorna la variabile globale currRadio a seconda di quale card del carousel è selezionata
function checkCurrRadio() {
    for (var i = 0; i < maxItems; i++) {
        radioId = "radio" + (i + 1).toString()
        if (document.getElementById(radioId).checked) {
            currRadio = i + 1;
            break;
        }
    }
}

//Funzione che ruota l'immagine nello sfondo di 360 gradi in avanti
function rotatePizzaForward() {
    angle += 360;
    document.getElementById("rotatingpizza").style.transition = "transform 0.5s";
    document.getElementById("rotatingpizza").style.transform = "rotate(" + angle + "deg)";
}

//Funzione che ruota l'immagine nello sfondo di 360 gradi all'indietro
function rotatePizzaBack() {
    angle -= 360;
    document.getElementById("rotatingpizza").style.transition = "transform 0.5s";
    document.getElementById("rotatingpizza").style.transform = "rotate(" + angle + "deg)";
}

//Funzione che consente di scorrere in avanti gli elementi del carousel
//Nello script ci sono controlli per la scomparsa del tasto forward nel caso in cui la card corrente sia l'ultima del carousel
function clickForward() {
    checkCurrRadio()
    buttonAppear("back")
    if (currRadio < maxItems) {
        currRadio += 1;
        radioId = "radio" + currRadio.toString();
        document.getElementById(radioId).checked = true;
    }
    if (currRadio == maxItems) {
        buttonDisappear("forward");
    }
}

//Funzione che consente di scorrere indietro gli elementi del carousel
//Nello script ci sono controlli per la scomparsa del tasto back nel caso in cui la card corrente sia la prima del carousel
function clickBack() {
    checkCurrRadio();
    buttonAppear("forward");
    if (currRadio > 1) {
        currRadio -= 1;
        radioId = "radio" + currRadio.toString();
        document.getElementById(radioId).checked = true;
    }
    if (currRadio == 1) {
        buttonDisappear("back")
    }
}

//Funzione che fa scomparire il tasto dato come argomento
function buttonDisappear(buttonId) {
    document.getElementById(buttonId).disabled = true;
    document.getElementById(buttonId).style.color = "transparent";
    document.getElementById(buttonId).style.backgroundColor = "transparent";
    document.getElementById(buttonId).style.borderColor = "transparent";
    document.getElementById(buttonId).style.pointerEvents = "none";
}

//Funzione che fa comparire il tasto dato come argomento
function buttonAppear(buttonId) {
    document.getElementById(buttonId).disabled = false;
    document.getElementById(buttonId).style.color = "#000000";
    document.getElementById(buttonId).style.backgroundColor = "white";
    document.getElementById(buttonId).style.borderColor = "#08c001";
    document.getElementById(buttonId).style.pointerEvents = "auto";
}

