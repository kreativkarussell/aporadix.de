window.addEventListener('DOMContentLoaded', function() {
    const items = document.querySelectorAll('.character-cards-grid li');

    items.forEach(item => {
        const spanElements = item.querySelector('#character');
        if (spanElements) {
            spanElements.style.before = ''
        }
    })
});
