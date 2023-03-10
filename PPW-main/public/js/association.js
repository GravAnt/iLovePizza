
//Funzione per rendere visibili i pulsanti per cambiare l'immagine di copertina
function changeCoverpic() {
    document.getElementById("changeCoverpicFile").style.display = "inline-block";
    document.getElementById("changeCoverpicSubmit").style.display = "inline-block";
    sessionStorage.setItem("buttonClicked", "changeCoverpic");
}

//Funzione che rende visibile il box per aggiungere un membro in un'associazione
function addMember() {
    document.getElementById("addMemberContainer").style.display = "block";
    sessionStorage.setItem("buttonClicked", "addMember");
}

//Funzione per mostrare il box per cancellare un'associazione
function deleteAssociation() {
    document.getElementById("deleteAssociationContainer").style.display = "block";
    sessionStorage.setItem("buttonClicked", "deleteAssociation");
}

//Funzioni per memorizzare nel session storage il pulsante che è stato cliccato
function leaveAssociation() {
    sessionStorage.setItem("buttonClicked", "leaveAssociation");
}

function joinAssociation() {
    sessionStorage.setItem("buttonClicked", "joinAssociation");
}

//Funzione che utilizza la Validation API per verificare che l'elemento inserito dall'utente appartenga a un datalist (jotform.com)
function checkDatalist() {
    var inputs = document.querySelectorAll('input[list]');
for (var i = 0; i < inputs.length; i++) {
    inputs[i].addEventListener('change', function () {
        var optionFound = false,
            datalist = this.list;
        for (var j = 0; j < datalist.options.length; j++) {
            if (this.value == datalist.options[j].value) {
                optionFound = true;
                break;
            }
        }
        if (optionFound) {
            this.setCustomValidity('');
        } else {
            this.setCustomValidity('Inserisci un elemento valido');
        }
    });
}
}
