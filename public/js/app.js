// Increment/decrement product amount in shop
var count = 0;
var price = document.getElementById("price").innerHTML;
var count2 = 0;
var price2 = document.getElementById("price2").innerHTML;

function increment() {
    this.count++;
    document.getElementById("count").innerHTML = count;
    document.getElementById("total").innerHTML = parseFloat(count*price).toFixed(2);
}

function decrement () {
    if(this.count > 0){
        this.count-- ;
    }
    document.getElementById("count").innerHTML = count;
    document.getElementById("total").innerHTML = parseFloat(count*price).toFixed(2);
}

document.getElementById("count2").innerHTML = count2;

function increment2() {
    this.count2++;
    document.getElementById("count2").innerHTML = count2;
    document.getElementById("total2").innerHTML = parseFloat(count2*price2).toFixed(2);
}

function decrement2 () {
    if(this.count2 > 0){
        this.count2-- ;
    }
    document.getElementById("count2").innerHTML = count2;
    document.getElementById("total2").innerHTML = parseFloat(count2*price2).toFixed(2);
}

function calculateTotal() {
    let total = parseFloat(document.getElementById("total").innerHTML);
    let total2 = parseFloat(document.getElementById("total2").innerHTML);
    document.getElementById("totalAmount").innerHTML = parseFloat(total+total2).toFixed(2);
}

// Homepage Loading after creating database
function ButtonClicked()
{
    document.getElementById("create-db-button").style.display = "none";
    document.getElementById("loading-spinner").style.display = "";
    return true;
}
var Loading = true;
function RestoreSubmitButton() {
    if(Loading) {
        Loading = false;
        return;
    }
    document.getElementById("create-db-button").style.display = "";
    document.getElementById("loading-spinner").style.display = "none";
}

document.onfocus = RestoreSubmitButton;
