// Homepage Loading after creating database
function buttonClicked()
{
    document.getElementById("create-db-button").style.display = "none";
    document.getElementById("loading-spinner").style.display = "";
    return true;
}

let loading = true;
function restoreSubmitButton() {
    if(loading) {
        loading = false;
        return;
    }
    document.getElementById("create-db-button").style.display = "";
    document.getElementById("loading-spinner").style.display = "none";
}

document.onfocus = restoreSubmitButton;
