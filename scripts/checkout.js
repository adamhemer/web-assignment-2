
const numberExp = /\d{16}/; // Checks for 16 digits
const expiryExp = /(0[1-9]|1[0-2])\/\d{2}/; // Checks for (01-12)/(00-99)
const cvvExp = /\d{3}/; // Checks for 3 digits


function validateCard() {
    console.log("press");
    var cardForm = document.forms["credit-card-form"];

    let number = cardForm["number"].value.replace(' ', ''); // Get number and remove whitespace
    if (!number.match(numberExp)) {
        console.log("invalid card number");
    } else console.log("valid card number");

    let expiry = cardForm["expiry"].value.replace(' ', '');
    if (!expiry.match(expiryExp)) {
        console.log("invalid expiry date");
    } else console.log("valid expiry date");

    let cvv = cardForm["cvv"].value.replace(' ', '');
    if (!cvv.match(cvvExp)) {
        console.log("invalid cvv date");
    } else console.log("valid cvv date");
}