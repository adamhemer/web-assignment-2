
function init() {
    sort(0);    // Initial sort on page load
}

window.onload = init;

const sortFunctions = [ // Functions for each of the sorting modes, children[1] is name and children[2] is price
    (a, b) => a.children[1].innerHTML > b.children[1].innerHTML ? 1 : -1,   // Sort by name ascending
    (a, b) => a.children[1].innerHTML < b.children[1].innerHTML ? 1 : -1,   // Sort by name descending
    (a, b) => a.children[2].innerHTML > b.children[2].innerHTML ? 1 : -1,   // Sort by price ascending
    (a, b) => a.children[2].innerHTML < b.children[2].innerHTML ? 1 : -1    // Sort by price descending
];

function sort(option) {
    var products = document.getElementsByClassName("shop-products")[0]; // Get the products parent node

    [...products.children]  // Convert the HTMLCollection to an array
        .sort((a, b) => sortFunctions[option](a, b)) // Select a comparison function from the array
        .forEach(x => {
            products.appendChild(x);    // Move the node to its sorted position
        });
}