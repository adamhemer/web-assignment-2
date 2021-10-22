// When the user hovers over the linked text, show the dropdown content
function showMenu() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user moves the mouse away from dropbtn/dropmenu
window.onclick = function (event) {
if (!event.target.matches(".dropbtn")) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    dropdowns.addEventListener("blur", (event) => {
    var i;
    for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains("show")) {
        openDropdown.classList.remove("show");
        }
    }
    });
}
};