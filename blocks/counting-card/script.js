window.addEventListener('DOMContentLoaded', function() {
    const listItems = document.querySelectorAll('.counting-card-grid li');

    listItems.forEach(listItem => {
        const spanElement = listItem.querySelector('#count');
        if (spanElement) {
            const targetValue = parseInt(spanElement.textContent.trim(), 10); // Get the target value
            spanElement.textContent = '0'; // Initialize the span text to '0'

            animate(0, targetValue, {
                duration: 2,
                ease: "circOut",
                onUpdate: (latest) => (spanElement.textContent = Math.round(latest)),
            });
        }
    });
});
