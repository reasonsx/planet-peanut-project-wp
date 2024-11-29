document.querySelectorAll('.faq-question').forEach(button => {
    button.addEventListener('click', () => {
        const answer = button.nextElementSibling;
        const svgIcon = button.querySelector('svg');
        const isVisible = answer.style.display === 'block';

        // Hide all other answers and reset the SVG rotation
        document.querySelectorAll('.faq-answer').forEach(answer => {
            answer.style.display = 'none';
        });

        document.querySelectorAll('.faq-question svg').forEach(svg => {
            svg.classList.remove('rotate-90'); // Reset all SVG icons to their original position
        });

        // Toggle visibility of the current answer
        answer.style.display = isVisible ? 'none' : 'block';

        // Rotate the current SVG icon
        svgIcon.classList.toggle('rotate-90', !isVisible);
    });
});


