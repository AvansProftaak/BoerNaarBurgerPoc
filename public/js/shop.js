// wait for page to load, before starting js script
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', ready);
} else {
    ready();
}

//page is loaded, intialize variables
function ready() {
    // define array of productbuttons increment and add eventlistener
    let addProductButtons = document.getElementsByClassName('btn-increment');
    for (let i = 0; i < addProductButtons.length; i++) {
        let button = addProductButtons[i];
        button.addEventListener('click', addToCartClicked);
    }

    // define array of productbuttons decrement and add eventlistener
    let removeProductButtons = document.getElementsByClassName('btn-decrement');
    for (let i = 0; i < removeProductButtons.length; i++) {
        let button = removeProductButtons[i];
        button.addEventListener('click', removeFromCartClicked);
    }
}

function addToCartClicked(event) {
    let button = event.target;
    let product = button.parentElement.parentElement;
    let price = parseFloat(product.querySelector('#price').innerText);
    let quantityElement = product.querySelector('#quantity');
    let quantity = quantityElement.value;

    quantity++;

    let total = price * quantity;
    quantityElement.value = quantity;
    product.getElementsByClassName('total')[0].value = total.toFixed(2);

    updateTotal();
}

function removeFromCartClicked(event) {
    let button = event.target;
    let product = button.parentElement.parentElement;
    let price = parseFloat(product.querySelector('#price').innerText);
    let quantityElement = product.querySelector('#quantity');
    let quantity = quantityElement.value;

    if (quantity > 0) {
        quantity--;

        let total = price * quantity;

        quantityElement.value = quantity;
        product.getElementsByClassName('total')[0].value = total.toFixed(2);
    }
    updateTotal()
}

function updateTotal() {
    // define array of all product total prices
    let productTotals = document.getElementsByClassName('total');
    let shopTotal = document.getElementById('totalAmount');
    let productPrices = [];

    for (let i = 0; i < productTotals.length; i++){
        //loop through the array to get all the chosen values
        productPrices.push(parseFloat(productTotals[i].value));
        console.log(productPrices);
    }

   shopTotal.value = productPrices.reduce((a, b) => a + b, 0).toFixed(2);
    console.log(shopTotal.value);
}
