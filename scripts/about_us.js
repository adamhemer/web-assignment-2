window.onload = showMessage;

function showMessage() {
    // If the user subscribed
    const subscribed = window.location.toString().match(/subscribed=true/);
    if (subscribed) {
        // Scroll to the bottom of the page (so the page doesnt jump up from the reload)
        scroll(0, document.body.scrollHeight);
        // Show the thank you message
        document.getElementById("thankyou").style.display = "block";
    }
}