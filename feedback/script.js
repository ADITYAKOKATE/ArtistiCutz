document.getElementById('feedbackForm').addEventListener('submit', function (e) {
    e.preventDefault(); // Prevent form from submitting

    // Hide the form and show a thank-you message
    document.getElementById('feedbackForm').style.display = 'none';
    document.querySelector('.thank-you-message').style.display = 'block';
});
document.getElementById("appointmentForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form submission
    
    // Get selected values
    const selectedService = document.getElementById("service").value;
    const appointmentDate = document.getElementById("date").value;
    const appointmentTime = document.getElementById("time").value;

    // Set modal content dynamically
    document.getElementById("selectedService").innerText = selectedService;
    document.getElementById("appointmentDateTime").innerText = `${appointmentDate} at ${appointmentTime}`;

    // Show modal
    $('#exampleModal').modal('show');

    // Animate progress bar
    let progressBar = document.getElementById("progressBar");
    let progress = 0;
    let interval = setInterval(() => {
        progress += 10;
        progressBar.style.width = `${progress}%`;
        progressBar.setAttribute("aria-valuenow", progress);
        if (progress >= 100) {
            clearInterval(interval);
            // Optionally, redirect or show confirmation message after progress completes
        }
    }, 300); // Speed of progress (300ms per 10%)
});

document.getElementById("saveChanges").addEventListener("click", function() {
    alert("Your changes have been saved!");
});
