
const nameExp = /\w+\s\w+/  // Checks for two words separated by whitespace
const numberExp = /\d{16}/; // Checks for 16 digits
const expiryExp = /(0[1-9]|1[0-2])\/\d{2}/; // Checks for (01-12)/(00-99)
const cvvExp = /\d{3}/; // Checks for 3 digits in a row


function validateCard() {

    var cardForm = document.forms["credit-card-form"];

    // Get the input elements from the form
    let nameInput = cardForm["name"];
    let numberInput = cardForm["number"];
    let expiryInput = cardForm["expiry"];
    let cvvInput = cardForm["cvv"];

    // Extract the values and normalise them
    let name = nameInput.value;
    let number = numberInput.value.replaceAll(' ', ''); // Get number and remove whitespace
    let expiry = expiryInput.value.replaceAll(' ', '');
    let cvv = cvvInput.value.replaceAll(' ', '');

    // Check the values against the regex expressions and lengths
    let validName = name.match(nameExp) && name.length <= 25;
    let validNumber = number.match(numberExp) && number.length == 16;
    let validExpiry = expiry.match(expiryExp) && expiry.length == 5;
    let validCVV = cvv.match(cvvExp) && cvv.length == 3;

    console.log("name: " + validName);
    console.log("card: " + validNumber);
    console.log("expiry: " + validExpiry);
    console.log("cvv: " + validCVV);

    if (validName && validNumber && validExpiry && validCVV) {
        // Set form values to whitespace filtered values
        numberInput.value = number;
        expiryInput.value = expiry;
        cvvInput.value = cvv;

        cardForm.submit();
    } else {
        // Report to the user that the field is invalid
        if (!validName) {
            nameInput.setCustomValidity("Please enter a valid name");   // Sets the invalid message
            nameInput.reportValidity(); // Shows the popup
        }
        else if (!validNumber) {    // Else used so the fields show up as invalid one at a time
            numberInput.setCustomValidity("Please enter a valid card number");
            numberInput.reportValidity();
        }
        else if (!validExpiry) {
            expiryInput.setCustomValidity("Please enter a valid expiry");
            expiryInput.reportValidity();
        }
        else if (!validCVV) {
            cvvInput.setCustomValidity("Please enter a valid cvv");
            cvvInput.reportValidity();
        }
    }
}