import {addAnswers} from "./add_answer.js";

// Collect the divs for inputs.
const openDiv = document.getElementById('add_open_title');
const multipleDiv = document.getElementById('add_multiple_title');
const uniqueDiv = document.getElementById('add_unique_title');

// Collect forms.
const formOpen = document.getElementById('open_form');
const formMultiple = document.getElementById('multiple_form');
const formUnique = document.getElementById('unique_form');

// Collect radio inputs.
const radioOpenAnswers = document.getElementById('open_answers');
const radioMultipleChoices = document.getElementById('multiple_choices');
const radioUniqueChoice = document.getElementById('unique_choice');

// Collect text labels.
const textOpen = document.getElementById('text_open');
const textMultiple = document.getElementById('text_multiple');
const textUnique = document.getElementById('text_unique');

// Collect + button.
const multipleButtonNewAnswer = document.getElementById('multiple_btn_new_answer');
const uniqueButtonNewAnswer = document.getElementById('unique_btn_new_answer');

// Function to update each text if the radio associate is checked.
function updateTextDisplay() {

    // Reset all inputs.
    openDiv.style.display = "none";
    multipleDiv.style.display = "none";
    uniqueDiv.style.display = "none";

    // Reset all forms.
    formOpen.style.display = "none";
    formMultiple.style.display = "none";
    formUnique.style.display = "none";

    // Reset all texts.
    textOpen.style.display = "none";
    textMultiple.style.display = "none";
    textUnique.style.display = "none";

    // Condition to check if a radio input is checked.
    if (radioOpenAnswers.checked) {

        // Display open elements.
        openDiv.style.display = "block";
        formOpen.style.display = "block";
        textOpen.style.display = "block";
    } else if (radioMultipleChoices.checked) {

        // Display multiple elements.
        multipleDiv.style.display = "block";
        formMultiple.style.display = "block";
        textMultiple.style.display = "block";

    } else if (radioUniqueChoice.checked) {

        // Display unique elements.
        uniqueDiv.style.display = "block";
        formUnique.style.display = "block";
        textUnique.style.display = "block";
    }
}

// Event Listener for each radio input.
radioOpenAnswers.addEventListener('change', updateTextDisplay);
radioMultipleChoices.addEventListener('change', updateTextDisplay);
radioUniqueChoice.addEventListener('change', updateTextDisplay);

// Event Listener to call the addAnswers function with the parameter isMultiple on true.
multipleButtonNewAnswer.addEventListener('click', (event) => {

    event.preventDefault();
    addAnswers(true);
});

// Event Listener to call the addAnswers function with the parameter isMultiple on false.
uniqueButtonNewAnswer.addEventListener('click', (event) => {

    event.preventDefault();
    addAnswers(false);
});

// Launch the function.
updateTextDisplay();
