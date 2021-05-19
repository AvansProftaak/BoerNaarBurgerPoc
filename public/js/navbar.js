/* ********************************************* */
/*         ROB VAN DER HORST (DROPDOWNMENU)      */
/* ********************************************* */


function dropdownContact() {
    document.getElementById("Drop-Language").classList.remove("show");
    document.getElementById("Drop-Aanmelden").classList.remove("show");
    document.getElementById("Drop-Contact").classList.toggle("show");
}

function dropdownAanmelden() {
    document.getElementById("Drop-Language").classList.remove("show");
    document.getElementById("Drop-Contact").classList.remove("show");
    document.getElementById("Drop-Aanmelden").classList.toggle("show");
}

function dropdownLanguage() {

    document.getElementById("Drop-Aanmelden").classList.remove("show");
    document.getElementById("Drop-Contact").classList.remove("show");
    document.getElementById("Drop-Language").classList.toggle("show");
}

window.onclick = function (event) {
    if (!event.target.matches('.dropButton')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}
