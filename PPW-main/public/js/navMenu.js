const logo = document.querySelector('.nav-icon');
const menu = document.querySelector('.navMenu');
const section = document.querySelector('section');




let isOpen = false;
let i = 0;

//Controllo dell'aperture e chiusura del navMenu al click dell'icona corrispondente
if (logo) {
    logo.addEventListener('click', function () {

        menu.classList.toggle('showNavMenu');
        logo.classList.toggle('x');
        if (isOpen) {
            isOpen = false;
        }

    });
}