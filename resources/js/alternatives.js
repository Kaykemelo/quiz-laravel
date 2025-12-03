document.addEventListener('DOMContentLoaded', () => {
    const addButton = document.getElementById('add-alternative');

    if (!addButton ) return;
    
    addButton.addEventListener('click', function () {
        const template = document.getElementById('alternative-template').content.cloneNode(true);
        document.getElementById('alternative-wrapper').appendChild(template);
    });
        
    
});