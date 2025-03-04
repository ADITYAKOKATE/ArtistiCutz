
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <div class="feedback-container">
        <div class="appointment-message">
            <h2>Thank You for Booking an Appointment</h2>
            <p>Your feedback is important to us and helps improve our services. Kindly take a moment to share your
                experience.</p>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Pay at Counter
                </button>
            <a href="/ArtistiCutz/linkpe-main/linkpe.html"><button class="btn btn-success">Pay Online</button></a>
        </div>
        <!-- Button trigger modal -->
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Appointment Confirmed!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Thank you for booking an appointment! We are excited to serve you.</p>
                  <!-- Progress bar to show booking status -->
                  <div class="progress">
                    <div id="progressBar" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" 
                         style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="closeButton">Close</button>
                  </div>
                  
                  <script>
                    document.getElementById("closeButton").addEventListener("click", function() {
                      // Redirect to the index page when the button is clicked
                      window.location.href = "/ArtistiCutz/index.html";
                    });
                  </script>
                  
              </div>
            </div>
          </div>
          
        <!-- <div>
            <h3>We Appreciate Your Feedback</h3>
            <form id="feedbackForm">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" placeholder="Enter your name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="rating">Rate Us:</label>
                    <select id="rating" name="rating" required>
                        <option value="" disabled selected>Select Rating</option>
                        <option value="5">Excellent - 5</option>
                        <option value="4">Very Good - 4</option>
                        <option value="3">Good - 3</option>
                        <option value="2">Fair - 2</option>
                        <option value="1">Poor - 1</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="comments">Your Feedback:</label>
                    <textarea id="comments" name="comments" placeholder="Write your feedback here..." rows="4" maxlength="500" required></textarea>
                </div>
                <button type="submit" class="btn-submit">Submit Feedback</button>
            </form>
        </div> -->

        <div class="thank-you-message" style="display:none;">
            <h3>Thank You for Your Feedback</h3>
            <p>We appreciate your input and will review your feedback carefully.</p>
        </div>
    </div>
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
</body>

</html>
