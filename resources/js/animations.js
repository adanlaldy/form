
// Collect all link images.
const images = [
    document.getElementById('new_survey'),
    document.getElementById('all_surveys'),
    document.getElementById('logout'),
    document.getElementById('multiple_btn_new_answer'),
    document.getElementById('unique_btn_new_answer'),
];

// Add a Event Listener if the button exist.
images.forEach(button => {
    if (button) {
        button.addEventListener('mouseover', () => {
            button.style.transform = 'scale(1.2)';
            button.style.transition = 'transform 0.3s';
        });

        button.addEventListener('mouseout', () => {
            button.style.transform = 'scale(1)';
        });
    }
});
