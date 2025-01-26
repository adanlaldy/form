// Collect multiple answer input.
const multipleNewAnswer = document.getElementById('multiple_new_answer');

// Collect multiple added answer div.
const multipleAddedAnswer = document.getElementById('multiple_added_answer');

// Collect multiple answer input.
const uniqueNewAnswer = document.getElementById('unique_new_answer');

// Collect multiple added answer div.
const uniqueAddedAnswer = document.getElementById('unique_added_answer');

// Function to add a div when the User click on the + button with the boolean parameter isMultiple.
export function addAnswers(isMultiple) {

    // Remove hidden attribute to the div.
    isMultiple ? multipleAddedAnswer.classList.remove('hidden') : uniqueAddedAnswer.classList.remove('hidden');

    // Create container for an answer.
    const newAnswerDiv = document.createElement('div');
    newAnswerDiv.classList.add('flex', 'gap-1', 'items-center');

    // Create input for the answer.
    const newAnswerInput = document.createElement('input');
    isMultiple ? newAnswerInput.name = 'multiple_answer[]' : newAnswerInput.name = 'unique_answer[]';
    newAnswerInput.classList.add('border', 'rounded-md', 'w-full');
    newAnswerInput.placeholder = `Answer n°${multipleAddedAnswer.children.length + 1}...`;

    // Set newAnswerInput with the value of the answer.
    newAnswerInput.value = isMultiple ? multipleNewAnswer.value : uniqueNewAnswer.value;

    // Prevent Enter from creating a new div.
    newAnswerInput.addEventListener('keydown', (event) => {
        if (event.key === 'Enter') {
            event.preventDefault();
        }
    });

    // Checkboxes or radio are set to know good answers.
    if (isMultiple) {

        // Create checkbox element to check good answers.
        const checkbox = document.createElement('input');
        checkbox.type = 'checkbox';
        checkbox.classList.add('accent-green-500', 'hover:accent-pink-500');

        // Event Listener to set the value of the checkbox when is checked.
        checkbox.addEventListener('change', () => {

            checkbox.name = 'checkbox_checked[]';
            checkbox.value = newAnswerInput.value;
        });

        // Append the checkbox to the div.
        newAnswerDiv.appendChild(checkbox);
    } else {

        // Create radio element to select a unique good answer.
        const radio = document.createElement('input');
        radio.type = 'radio';
        radio.classList.add('accent-green-500');

        // Event Listener to set the value of the radio when is selected.
        radio.addEventListener('change', () => {

            radio.name = 'radio_checked';
            radio.value = newAnswerInput.value;
        });

        // Append the radio to the div.
        newAnswerDiv.appendChild(radio);
    }

    // Create number for indexing answers.
    const index = isMultiple ? multipleAddedAnswer.children.length + 1 : uniqueAddedAnswer.children.length + 1;
    const indexLabel = document.createElement('label');
    indexLabel.innerHTML = index.toString() + ": ";
    indexLabel.classList.add('items-center');

    // Append the index to the div.
    newAnswerDiv.appendChild(indexLabel);

    // Add delete button.
    const deleteButton = document.createElement('button');
    deleteButton.type = 'button';
    deleteButton.innerHTML = `<img src="/images/close.png" alt="delete answer button">`;
    deleteButton.classList.add('size-6');

    // Event Listeners to change the size of the icon when the mouse hover it.
    deleteButton.addEventListener('mouseover', () => {

        deleteButton.style.transform = 'scale(1.2)';
        deleteButton.style.transition = 'transform 0.3s';
    });

    deleteButton.addEventListener('mouseout', () => {

        deleteButton.style.transform = 'scale(1)';
    });

    // Event Listener for the button which delete an answer.
    deleteButton.addEventListener('click', () => {

        newAnswerDiv.remove();

        if (isMultiple) {

            // If the parent div doesn't contain anything, add hidden class.
            if (multipleAddedAnswer.children.length === 0) {

                multipleAddedAnswer.classList.add('hidden');
            }
        } else {

            // If the parent div doesn't contain anything, add hidden class.
            if (uniqueAddedAnswer.children.length === 0) {

                uniqueAddedAnswer.classList.add('hidden');
            }
        }

    });

    // Add input and delete button in the container.
    newAnswerDiv.appendChild(newAnswerInput);
    newAnswerDiv.appendChild(deleteButton);
    newAnswerDiv.classList.add('m-3');

    // Add containers to the principal container.
    isMultiple ? multipleAddedAnswer.appendChild(newAnswerDiv) : uniqueAddedAnswer.appendChild(newAnswerDiv);
}
