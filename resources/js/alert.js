document.addEventListener('DOMContentLoaded', function() {
    const alert = document.getElementById('login-alert');
    if (alert) {
        setTimeout(() => {
            alert.style.transition = 'opacity 0.5s ease';
            alert.style.opacity = '0';
        }, 3000); // Delay before starting fade (3 seconds)

        setTimeout(() => {
            alert.remove(); // Remove element from DOM after fade
        }, 3500); // Total time (3.5 seconds)
    }
});
