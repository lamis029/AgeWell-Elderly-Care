//Function to update the cart
function updateCart() {
    var cartItems = document.querySelectorAll('.cart-items tr');
    var total = 0;
    var discount = 0;
    var taxRate = 0.05; //5% tax
    var discountRate = 0.10; //10% discount for 65 years old and above
    
    //Loop through each cart item to calculate the total price
    for (let i = 0; i < cartItems.length; i++) {
        var priceText = cartItems[i].querySelector('.cart-price').innerText;
        var price = parseFloat(priceText.split(' ')[0]); //Extract the price 
        var quantity = cartItems[i].querySelector('input').value;
    
        total += price * quantity;
    }
    
    //Discount if age >= 65
    var age = document.getElementById('age').value;
    if (age >= 65) {
        discount = total * discountRate;
    }

    //Calculate tax
    var tax = total * taxRate;

    //Calculate final total 
    var finalTotal = total + tax - discount;

    //Update the DOM with the new calculated values
    document.getElementById('cart-discount').innerText = discount.toFixed(2);//Display the calculated discount
    document.getElementById('cart-total').innerText = finalTotal.toFixed(2);//Display the calculated finalTotal
    document.getElementById('cart-tax').innerText = tax.toFixed(2); //Display the calculated tax
}

//Add for input fields in the cart items
var cartInputs = document.querySelectorAll('.cart-items input');
for (let i = 0; i < cartInputs.length; i++) {
    cartInputs[i].addEventListener('input', updateCart);
}

//Add for the "Remove" buttons
var removeButtons = document.querySelectorAll('.btn-danger');
for (let i = 0; i < removeButtons.length; i++) {
    removeButtons[i].addEventListener('click', function () {
        //Remove the item from the cart
        this.closest('tr').remove();

        updateCart();
    });
}


//Add for the "Clear Cart" button
document.getElementById('clearCartButton').addEventListener('click', function () {
    // Clear all items from the cart
    document.querySelector('.cart-items').innerHTML = '';
    updateCart();
});

//Add for the age input to recalculate the discount
document.getElementById('age').addEventListener('input', function () {
    updateCart();
});

//Initial call to update the cart when the page load
updateCart();
