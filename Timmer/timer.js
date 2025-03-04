document.addEventListener('DOMContentLoaded'), function () {
    document.addEventListener('DOMContentLoaded', function () {
        // Generate time slots from 9 AM to 10 PM in 20-minute intervals
        const timeSlotSelect = document.getElementById('timeSlot');
        const startTime = 9; // 9 AM
        const endTime = 22; // 10 PM
        const interval = 20; // 20-minute intervals
    
        for (let hour = startTime; hour < endTime; hour++) {
            for (let min = 0; min < 60; min += interval) {
                const option = document.createElement('option');
                const time = `${hour.toString().padStart(2, '0')}:${min.toString().padStart(2, '0')}`;
                option.value = time;
                option.textContent = formatTime(hour, min);
                timeSlotSelect.appendChild(option);
            }
        }
    
        // Format time to AM/PM
        function formatTime(hour, min) {
            const period = hour < 12 ? 'AM' : 'PM';
            const formattedHour = hour % 12 === 0 ? 12 : hour % 12;
            return `${formattedHour}:${min.toString().padStart(2, '0')} ${period}`;
        }
    
        // Handle form submission and show remaining time
        const form = document.getElementById('appointmentForm');
        form.addEventListener('submit', function (e) {
            e.preventDefault();
    
            const selectedTime = document.getElementById('timeSlot').value;
            const [selectedHour, selectedMinute] = selectedTime.split(':').map(Number);
    
            const now = new Date();
            const appointmentTime = new Date();
            appointmentTime.setHours(selectedHour, selectedMinute, 0, 0);
    
            const timeDiff = appointmentTime - now;
            if (timeDiff > 0) {
                startCountdown(timeDiff, appointmentTime);
            } else {
                alert('Please select a valid time slot.');
            }
        });
    
        // Countdown logic
        function startCountdown(timeDiff, appointmentTime) {
            const popup = document.getElementById('remainingTimePopup');
            const remainingTimeEl = document.getElementById('remainingTime');
    
            popup.classList.add('show');
    
            const countdownInterval = setInterval(() => {
                const now = new Date();
                const diff = appointmentTime - now;
    
                if (diff <= 0) {
                    clearInterval(countdownInterval);
                    remainingTimeEl.textContent = "Appointment Time!";
                    popup.classList.remove('show');
                    return;
                }
    
                const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((diff % (1000 * 60)) / 1000);
    
                remainingTimeEl.textContent = `${minutes} min ${seconds} sec`;
    
                if (diff <= 5 * 60 * 1000) { // Less than 5 minutes
                    remainingTimeEl.classList.add('red');
                }
    
                if (diff <= 1000) {
                    clearInterval(countdownInterval);
                }
            }, 1000);
        }
    });
}