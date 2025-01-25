// Collect answer input.
const newAnswer = document.getElementById('new_answer');

// Collect + button.
const buttonNewAnswer = document.getElementById('btn_new_answer');

// Collect added answer div.
const addedAnswer = document.getElementById('added_answer');

// Function to add an input with the answer added when the User click on the + button.
function addNewAnswer() {

    // Remove hidden attribute to the div.
    addedAnswer.classList.remove('hidden');

    // Create container for an answer.
    const newAnswerDiv = document.createElement('div');
    newAnswerDiv.classList.add('flex', 'gap-1', 'items-center');

    // Create checkbox element to check good answers.
    const checkbox = document.createElement('input');
    checkbox.type = 'checkbox';

    // Create number for indexing answers.
    const index = addedAnswer.children.length + 1;
    const indexLabel = document.createElement('label');
    indexLabel.innerHTML = index.toString() + ": ";
    indexLabel.classList.add('items-center');

    // Create input for the answer.
    const newAnswerInput = document.createElement('input');
    newAnswerInput.name = 'answer[]';
    newAnswerInput.classList.add('border', 'rounded-md', 'w-full');
    newAnswerInput.placeholder = `Answer n°${addedAnswer.children.length + 1}...`;

    // Set newAnswerInput with the value of the answer.
    newAnswerInput.value = newAnswer.value;

    // Add delete button.
    const deleteButton = document.createElement('button');
    deleteButton.type = 'button';
    deleteButton.innerHTML = `<img src="/images/close.png" alt="delete answer button">`;
    deleteButton.classList.add('size-6');

    // Event Listener to set the value of the checkbox when is checked.
    checkbox.addEventListener('change', () => {

       checkbox.name = 'checkbox_checked[]';
       checkbox.value = newAnswerInput.value;
    });

    // Event Listeners to change the size of the icon when the mouse hover it.
    deleteButton.addEventListener('mouseover', () => {

        deleteButton.style.transform = 'scale(1.2)';
        deleteButton.style.transition = 'transform 0.3s';
    });

    deleteButton.addEventListener('mouseout', () => {2

        deleteButton.style.transform = 'scale(1)';
    });

    // Event Listener for the button which delete an answer.
    deleteButton.addEventListener('click', () => {

        newAnswerDiv.remove();

        // If the parent div doesn't contain anything, add hidden class.
        if (addedAnswer.children.length === 0) {

            addedAnswer.classList.add('hidden');
        }
    });

    // Prevent Enter from creating a new div.
    newAnswerInput.addEventListener('keydown', (event) => {
        if (event.key === 'Enter') {
            event.preventDefault();
        }
    });

    // Add input and delete button in the container.
    newAnswerDiv.appendChild(checkbox);
    newAnswerDiv.appendChild(indexLabel);
    newAnswerDiv.appendChild(newAnswerInput);
    newAnswerDiv.appendChild(deleteButton);
    newAnswerDiv.classList.add('m-3');

    // Add containers to the principal container.
    addedAnswer.appendChild(newAnswerDiv);
}

// Event Listener for the button which add a new answer.
buttonNewAnswer.addEventListener('click', (event) => {
    event.preventDefault();
    addNewAnswer();
});
