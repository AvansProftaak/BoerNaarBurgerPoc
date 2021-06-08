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

    if (window.location.href.indexOf('step1') !== -1) {
        updateTotal();
    }

    let editDetailsButton = document.getElementById('edit-details-button');
    if (editDetailsButton) {
        editDetailsButton.addEventListener('click', editDetails);
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
    }

   shopTotal.value = productPrices.reduce((a, b) => a + b, 0).toFixed(2);

    // next button disabled when ordervalue is 0
    if(shopTotal.value === '0.00') {
        document.getElementById('submit-button').disabled = true
    } else {
        document.getElementById('submit-button').disabled = false
    }
}

// function to allow customerdata to be edited in shop step 2, and show password
function editDetails() {
    // show password field/save button and hide edit button
    let editButtons = document.querySelectorAll('.hide-button');
    for (let i = 0; i < editButtons.length; i++) {
        editButtons[i].classList.remove('hide-button');
    }

    document.querySelector('#edit-details-button').classList.add('hide-button');

    // loop over disabled fields and enable them.
    let disabledInputs = document.querySelectorAll('.input-field');
    for (let i = 0; i < disabledInputs.length; i++) {
        disabledInputs[i].removeAttribute('disabled');
    }
}

// cancel editing customerdata and disabling inputs
function cancelEdit() {
    let enabledInputs = document.querySelectorAll('.input-field');
    for (let i = 0; i < enabledInputs.length; i++) {
        enabledInputs[i].setAttribute('disabled', 'disabled');
    }

    document.querySelector('#edit-details-button').classList.remove('hide-button');

    let editButtons = document.getElementsByClassName('edit-buttons');
    for (let i = 0; i < editButtons.length; i++) {
        editButtons[i].classList.add('hide-button');
    }
}
