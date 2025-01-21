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
    // Reset all texts.
    textOpen.style.display = "none";
    textMultiple.style.display = "none";
    textUnique.style.display = "none";

    // Condition to check if a radio input is checked.
    if (radioOpenAnswers.checked) {
        textOpen.style.display = "block";
    } else if (radioMultipleChoices.checked) {
        textMultiple.style.display = "block";
    } else if (radioUniqueChoice.checked) {
        textUnique.style.display = "block";
    }
}

// Event Listener for each radio input.
radioOpenAnswers.addEventListener('change', updateTextDisplay);
radioMultipleChoices.addEventListener('change', updateTextDisplay);
radioUniqueChoice.addEventListener('change', updateTextDisplay);

// Launch the function.
updateTextDisplay();
