document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('appointmentForm');
    const messageDiv = document.getElementById('message');
    const timeSelect = document.getElementById('time');

    // Generate 30-minute interval time slots from 10:00 to 17:00
    const startTime = 10 * 60; // 10:00 AM in minutes
    const endTime = 17 * 60; // 5:00 PM in minutes

    for (let minutes = startTime; minutes <= endTime; minutes += 30) { // Increment by 30 minutes
        const hours = Math.floor(minutes / 60);
        const mins = minutes % 60;

        // Format time as HH:MM
        const formattedTime = `${String(hours).padStart(2, '0')}:${String(mins).padStart(2, '0')}`;

        // Create option element and append to select
        const option = document.createElement("option");
        option.value = formattedTime;
        option.textContent = formattedTime;
        timeSelect.appendChild(option);
    }

    // Form submission handler
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

            // Parse the JSON response
            const data = await response.json();

            if (response.ok) {
                // Success
                alert('Appointment booked successfully!');
            } else if (response.status === 400) {
                // Show specific error message for 400 Bad Request
                messageDiv.style.display = 'block';
                messageDiv.textContent = data.message;
            } else if (response.status === 409) {
                // Show specific error message for 409 Conflict
                messageDiv.style.display = 'block';
                messageDiv.textContent = data.message;
            } else if (response.status === 401) {
                // Show specific error message for 401 Unauthorized
                messageDiv.style.display = 'block';
                messageDiv.textContent = data.message;
            } else {
                // Catch-all for unexpected errors
                throw new Error('Unexpected error occurred');
            }
        } catch (error) {
            console.error('Error:', error);
            messageDiv.style.display = 'block';
            messageDiv.textContent = 'An error occurred. Please try again later.';
        }
    });
});
