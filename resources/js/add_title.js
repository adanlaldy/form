// Collect the divs for inputs.
const openDiv = document.getElementById('add_open_title');
const multipleDiv = document.getElementById('add_multiple_title');
const uniqueDiv = document.getElementById('add_unique_title');

document.getElementById('add_open_title_button').addEventListener('click', function() {

    // Afficher la div si elle était cachée
    if (openDiv.classList.contains('hidden')) {
        openDiv.classList.remove('hidden');
    }

    // Créer un nouvel élément input
    const newInput = document.createElement('input');
    newInput.type = 'text';
    newInput.name = 'open_title[]';
    newInput.placeholder = 'Enter another title here...';
    newInput.classList.add('border', 'rounded-md', 'mb-6', 'w-full');

    // Ajouter le nouvel input à la div
    openDiv.appendChild(newInput);
});
document.getElementById('add_multiple_title_button').addEventListener('click', function() {

    // Afficher la div si elle était cachée
    if (multipleDiv.classList.contains('hidden')) {
        multipleDiv.classList.remove('hidden');
    }

    // Créer un nouvel élément input
    const newInput = document.createElement('input');
    newInput.type = 'text';
    newInput.name = 'multiple_title[]';
    newInput.placeholder = 'Enter another title here...';
    newInput.classList.add('border', 'rounded-md', 'mb-6', 'w-full');

    // Ajouter le nouvel input à la div
    multipleDiv.appendChild(newInput);
});
document.getElementById('add_unique_title_button').addEventListener('click', function() {

    // Afficher la div si elle était cachée
    if (uniqueDiv.classList.contains('hidden')) {
        uniqueDiv.classList.remove('hidden');
    }

    // Créer un nouvel élément input
    const newInput = document.createElement('input');
    newInput.type = 'text';
    newInput.name = 'unique_title[]';
    newInput.placeholder = 'Enter another title here...';
    newInput.classList.add('border', 'rounded-md', 'mb-6', 'w-full');

    // Ajouter le nouvel input à la div
    uniqueDiv.appendChild(newInput);
});
