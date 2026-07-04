</body>
</html>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="config.js"></script>
<script>

$("#createBookingForm").on("submit", function(e) {
      e.preventDefault();
      $.ajax({
        url: "config.php",
        type: "POST",
        data: $(this).serialize(),
        success: function(response) { 
           // alert("this is response: " + response);
        if(response.trim() === "success") {
            alert("Booking created successfully!");
            // Redirect to admin dashboard or another page
            window.location.href = "dashboard.php"; // Change to your dashboard page
          } else {
            alert("Error creating booking: " + response);
          }
        }
      });
    });

   // Delete booking
   $(".btn-danger").on("click", function() {
       const bookingId = $(this).closest("tr").find("th").text();
       alert( bookingId);
       if (confirm("Are you sure you want to delete this booking?")) {
           $.ajax({
               url: "config.php",
               type: "POST",
               data: { action: "deleteBooking", id: bookingId },
               success: function(response) {
                   if (response.trim() === "success") {
                       alert("Booking deleted successfully!");
                       location.reload(); // Reload the page to see the changes
                   } else {
                       alert("Error deleting booking: " + response);
                   }
               }
           });
       }
   });

    /*
    $("#createBookingForm").on("submit", function(e) {
        alert("method called create booking");
        e.preventDefault();
        const obj = new BookingConfig();
        obj.createBooking(e);
    });   */

    $("#vehical_number").on("change", function() {
        alert("getting status");
        const obj = new BookingConfig();
        obj.getLoading();
    });

$("#updateBookingForm").on("submit", function(e) {
  alert("update booking method called");
    e.preventDefault();
      $.ajax({
        url: "config.php",
        type: "POST",
        data: $(this).serialize(),
        success: function(response) { 
        if(response.trim() === "success") {
            window.location.href = "dashboard.php"; // Change to your dashboard page
          } else {
            alert("Error updating booking: " + response);
          }
        }
      });
    });



</script>   
</body>
</html>