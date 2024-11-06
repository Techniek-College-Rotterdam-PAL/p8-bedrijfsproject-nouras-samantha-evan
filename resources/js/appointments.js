document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('appointmentForm');
    const messageDiv = document.getElementById('message');

    form.addEventListener('submit', async (event) => {
        event.preventDefault();

        const date = document.getElementById('date').value;
        const time = document.getElementById('time').value;
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        try {
            const response = await fetch('/appointments/book', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify({ date, time }),
            });

            const data = await response.json();

            if (response.status === 201) {
                alert('Appointment booked successfully!');
            } else if (response.status === 401) {
                messageDiv.style.display = 'block';
                messageDiv.textContent = data.message;
            } else if (response.status === 409) {
                messageDiv.style.display = 'block';
                messageDiv.textContent = data.message;
            }
        } catch (error) {
            console.error('Error:', error);
            messageDiv.style.display = 'block';
            messageDiv.textContent = 'An error occurred. Please try again later.';
        }
    });
});
