document.addEventListener("DOMContentLoaded", () => {
    const addButton = document.getElementById('add-question');

    if (!addButton) return;

    addButton.addEventListener('click', function () {
        const template = document.getElementById('question-template').content.cloneNode(true);
        document.getElementById('questions-wrapper').appendChild(template);
    });
});
