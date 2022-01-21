
function listen() {
    document.getElementById('productType').addEventListener('change', function () {
        var option = document.getElementsByTagName('select').productType.value;
        extendForm(option)
    })
}

function extendForm(option) {
    var dynamicForm = document.getElementById('dynamic-form');
    // Remove child nodes in case the type switcher changes
    removeChildNodes(dynamicForm);
    switch (option) {
        case 'dvd':
            createLabelInputNodes(['Size (MB)'],
                ['size'],
                'number',
                dynamicForm);
            createProductDescription('size in (MB)', dynamicForm);
            break
        case 'furniture':
            createLabelInputNodes(['Length (CM)', 'Width (CM)', 'Height (CM)'],
                ['length', 'width', 'height'],
                'number',
                dynamicForm);
            createProductDescription('dimensions in (HxWxL)', dynamicForm);
            break
        case 'book':
            createLabelInputNodes(['Weight (KG)'],
                ['weight'],
                'number',
                dynamicForm);
            createProductDescription('weight in (Kg)', dynamicForm);
            break
    }
}

function removeChildNodes(parent) {
    while (parent.firstChild) {
        parent.removeChild(parent.firstChild);
    }
}

function createLabelInputNodes(labels, ids, type, parent) {
    while (labels.length > 0) {
        var nodeLabel = document.createElement('label');
        var nodeInput = document.createElement('input');
        var textnode = document.createTextNode(labels[labels.length - 1]);
        nodeInput.id = ids[ids.length - 1];
        nodeInput.type = type;
        // Append nodes to the document
        nodeLabel.appendChild(textnode);
        parent.appendChild(nodeLabel);
        parent.appendChild(nodeInput);
        // Remove used label and id
        labels.pop();
        ids.pop();
        createLabelInputNodes(labels, ids, type, parent);
    }
}

function createProductDescription(description, parent) {
    var nodeP = document.createElement('p');
    var textnode = document.createTextNode('Please, provide ' + description);
    nodeP.appendChild(textnode);
    parent.appendChild(nodeP);
}

document.addEventListener("DOMContentLoaded", listen);