
const nameExp = /\w+/
const numberExp = /\d{16}/; // Checks for 16 digits
const expiryExp = /(0[1-9]|1[0-2])\/\d{2}/; // Checks for (01-12)/(00-99)
const cvvExp = /\d{3}/; // Checks for 3 digits


function validateCard() {
    var cardForm = document.forms["credit-card-form"];

    let number = cardForm["number"].value.replaceAll(' ', ''); // Get number and remove whitespace
    let expiry = cardForm["expiry"].value.replaceAll(' ', '');
    let cvv = cardForm["cvv"].value.replaceAll(' ', '');

    let validCard = number.match(numberExp) && number.length == 16;
    let validExpiry = expiry.match(expiryExp);
    let validCVV = cvv.match(cvvExp);

    console.log("card: " + validCard);
    console.log("expiry: " + validExpiry);
    console.log("cvv: " + validCVV);

    if (validCard && validExpiry && validCVV) {
        cardForm.submit();
    }
}