function listen() {
    var productsContainer = document.getElementsByClassName('product-container');

    for (var i = 0; i < productsContainer.length; i++) {
        const node = productsContainer[i];
        node.addEventListener('click', function () {
            toggleCheckbox(node);
        })
    }
}

function toggleCheckbox(node) {
    var checkbox = node.childNodes[1];
    checkbox.checked ? checkbox.checked = false : checkbox.checked = true;
}


document.addEventListener("DOMContentLoaded", listen);