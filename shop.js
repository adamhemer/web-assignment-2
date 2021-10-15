
var strainFilters = [];
var categoryFilters = [];
var sortMode = 0;

function init() {
    sort(sortMode); // Initial sort on page load
    document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => checkbox.checked = false);  // Set all the checkboxes to unchecked
}

window.onload = init;

const sortFunctions = [ // Functions for each of the sorting modes, children[1] is name and children[2] is price
    (a, b) => a.children[1].innerHTML > b.children[1].innerHTML ? 1 : -1,   // Sort by name ascending
    (a, b) => a.children[1].innerHTML < b.children[1].innerHTML ? 1 : -1,   // Sort by name descending
    (a, b) => a.children[2].innerHTML > b.children[2].innerHTML ? 1 : -1,   // Sort by price ascending
    (a, b) => a.children[2].innerHTML < b.children[2].innerHTML ? 1 : -1    // Sort by price descending
];

function sort(option) {
    sortMode = option;
    var products = document.getElementsByClassName("shop-products")[0]; // Get the products parent node

    [...products.children]  // Convert the HTMLCollection to an array
        // Children: 0 - main div, 1 - add to cart button, 2 - hidden description, 3 - hidden id
        .sort((a, b) => sortFunctions[sortMode](a.children[0], b.children[0])) // Select a comparison function from the array
        .forEach(x => {
            filter(x);
            products.appendChild(x);    // Move the node to its sorted position
        });
}

function filter(element) {
    if (strainFilters.length == 0 && categoryFilters == 0) { // If no filters are applied, show all products
        element.style.display = "";
        return;
    }

    // Check if it belongs to a selected category
    let categoryMatch = true;
    if (categoryFilters.length > 0) {
        categoryMatch = false;
        for (let i = 0; i < categoryFilters.length; i++) {
            let id = element.children[3].innerText.toLowerCase();   // Get id case insensitive
            if (id.match(categoryFilters[i])) {                     // If the description matches a filter term
                categoryMatch = true;                               // Mark it as matched
                break;
            }
        }
    }

    // Check if it belongs to a selected strain
    let strainMatch = true;
    if (strainFilters.length > 0) {
        strainMatch = false;
        for (let i = 0; i < strainFilters.length; i++) {
            let description = element.children[2].innerText.toLowerCase();  // Get description case insensitive
            if (description.match(strainFilters[i])) {                      // If the description matches a filter term
                strainMatch = true;                                         // Mark it as matched
                break;
            }
        }
    }

    // Only display the item if it matched against both
    let display = "none";
    if (categoryMatch && strainMatch) {
        display = "";
    }
    element.style.display = display;
}

function setCategory(category) {    // Takes a string and filters for matching IDs
    let index = categoryFilters.indexOf(category);    // Find it in the filter array, -1 if not in the array
    if (index == -1) {  // Strain is not in the array
        categoryFilters.push(category)    // Add it
    } else {    // Strain is in the array
        categoryFilters.splice(index, 1)    // Remove it
    }
    sort(sortMode); // Re-sort
}

function setStrain(strain) {    // Takes a string and filters for descriptions containing it
    let index = strainFilters.indexOf(strain);    // Find it in the filter array, -1 if not in the array
    if (index == -1) {  // Strain is not in the array
        strainFilters.push(strain)    // Add it
    } else {    // Strain is in the array
        strainFilters.splice(index, 1)  // Remove it
    }
    sort(sortMode); // Re-sort
}