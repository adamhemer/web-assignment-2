
function init() {
    var amount = parseFloat(document.getElementById("hidden-total").innerText); // The PHP leaves a hidden element with the total price
    document.getElementById("cart-total").innerText = "$" + amount.toFixed(2);  // We grab that an place it in the correct spot to show the user
}

window.onload = init;
