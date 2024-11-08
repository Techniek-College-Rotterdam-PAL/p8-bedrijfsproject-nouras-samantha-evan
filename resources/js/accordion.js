document.addEventListener('DOMContentLoaded', function () {
    // Select all accordion headers
    const accordionHeaders = document.querySelectorAll('.accordion-header');

    accordionHeaders.forEach(header => {
        header.addEventListener('click', function () {
            // Find the target content
            const target = document.querySelector(header.getAttribute('data-target'));
            const icon = header.querySelector('.accordion-icon');

            // Toggle visibility and rotation of icon
            const isExpanded = header.getAttribute('aria-expanded') === 'true';
            header.setAttribute('aria-expanded', !isExpanded);
            target.classList.toggle('hidden', isExpanded);
            icon.classList.toggle('rotate-180', !isExpanded);
        });
    });
});
