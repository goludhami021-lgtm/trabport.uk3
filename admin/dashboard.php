<?php
include 'Header.php';
?>
  <div class="main">
    <h1>Dashboard</h1>
    <div class="card">🚍 Vehicles: 120</div>
    <div class="card">👨‍✈️ Drivers: 80</div>
    <div class="card">📦 Bookings: 45</div>
    <div class="card">🛣️ Routes: 12</div>
    <div class="card">💰 Revenue: $25,000</div>

    <h2 class="mt-5 mb-4">Bookings</h2>
        <table class="table table-striped table-hover">
            <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Route</th>
                <th scope="col">Booking Date</th>
                <th scope="col">Rate</th>
                <th scope="col">Kuntal</th>
                <th scope="col">Bhada</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
       <tbody>
              <?php
              require_once 'bhatttransportdb.php';
              //Calling static method for geting bookings
              $bookings = bhatttransportdb::getBookings("SELECT * FROM bookings");
              if(!empty($bookings)){
              foreach($bookings as $booking) { ?>
                  <tr>
                      <th scope='row'><?php echo $booking['id']; ?></th>
                      <td><a href="updateBooking.php?id=<?php echo $booking['id']; ?>"><?php echo $booking['customerName']; ?></a></td>
                      <td><?php echo $booking['route']; ?></td>
                      <td><?php echo $booking['rate']; ?></td>
                      <td><?php echo $booking['kuntal']; ?></td>
                      <td><?php echo $booking['bhada']; ?></td>
                      <td><?php echo $booking['bookingDate']; ?></td>
                      <td><?php echo $booking['status']; ?></td>
                      <td><input  class="btn btn-danger" type="button" value="Delete" id="delete" onclick=""></td>

                  </tr>
              <?php }
              } else {
                  echo '<tr><td colspan="8" class="text-center">No data found</td></tr>';
              }
              ?>
            </tbody>
    </table>
    <div class="pagination">
    <a href="#">&laquo;</a>
    <a href="#">1</a>
    <a href="#" class="active">2</a>
    <a href="#">3</a>
    <a href="#">4</a>
    <a href="#">5</a>
    <a href="#">6</a>
    <a href="#">&raquo;</a>
  </div>

  </div>

<?php
include 'Footer.php'; 
?>