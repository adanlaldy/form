
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

// Function to update each text if the radio associate is checked.
function updateTextDisplay() {

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
        formOpen.style.display = "block";
        textOpen.style.display = "block";
    } else if (radioMultipleChoices.checked) {

        // Display multiple elements.
        formMultiple.style.display = "block";
        textMultiple.style.display = "block";
    } else if (radioUniqueChoice.checked) {

        // Display unique elements.
        formUnique.style.display = "block";
        textUnique.style.display = "block";
    }
}

// Event Listener for each radio input.
radioOpenAnswers.addEventListener('change', updateTextDisplay);
radioMultipleChoices.addEventListener('change', updateTextDisplay);
radioUniqueChoice.addEventListener('change', updateTextDisplay);

// Launch the function.
updateTextDisplay();
