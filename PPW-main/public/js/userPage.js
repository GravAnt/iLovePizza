//Funzione che mostra i tasti per cambiare l'immagine del profilo
function changePropic() {
    document.getElementById("changePropicFile").style.display = "inline-block";
    document.getElementById("changePropicSubmit").style.display = "inline-block";
    sessionStorage.setItem("buttonClicked", "changePropic");
}

//Funzione che mostra il box per cambiare la password
function changePassword() {
    document.getElementById("changePasswordContainer").style.display = "inline-block";
    sessionStorage.setItem("buttonClicked", "changePassword");
}

//Funzione che visualizza il box per cancellare l'account lato utente
function deleteAccount() {
    document.getElementById("deleteAccountContainer").style.display = "inline-block";
    sessionStorage.setItem("buttonClicked", "deleteAccount");
}

//Funzione che mostra il box per cambiare la bio del profilo
function changeBio() {
    document.getElementById("changeBioContainer").style.display = "inline-block";
    sessionStorage.setItem("buttonClicked", "changeBio");
}

//Funzioni per memorizzare nel session storage il pulsante che è stato cliccato
function deleteAdmin() {
    sessionStorage.setItem("buttonClicked", "deleteAdmin");
}

function addAdmin() {
    sessionStorage.setItem("buttonClicked", "addAdmin");
}