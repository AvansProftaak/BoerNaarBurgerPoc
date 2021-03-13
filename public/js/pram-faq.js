

/* ************************************************** */
/*           PRAM GODAKANDA (CONTACT & FAQ)           */
/* ************************************************** */


var acc = document.getElementsByClassName('accordion');
var i;
var len = acc.length;
for (i = 0; i < len; i++) {
    acc[i].addEventListener('click', function () {
        this.classList.toggle('faq-active');
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight) {
            panel.style.maxHeight = null;
        } else {
            panel.style.maxHeight = panel.scrollHeight + 'px'
        }
    })
}



const inputs = document.querySelectorAll(".input");

function focusFunc() {
    let parent = this.parentNode;
    parent.classList.add("focus");
}

function blurFunc() {
    let parent = this.parentNode;
    if (this.value === "") {
        parent.classList.remove("focus");
    }
}

inputs.forEach(input => {
    input.addEventListener("focus", focusFunc);
    input.addEventListener("blur", blurFunc);
});


function alertBericht() {
    alert("Bedankt voor uw bericht!\nEen medewerker van Boer naar Burger neemt zo spoedig mogelijk contact met u op. \t")
}
