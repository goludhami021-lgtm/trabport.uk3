<?php
if(! isset($_SESSION['user'])) {
   //   header("Location: login.php");
  } // Check if session is created, if not redirect to login

   require_once 'bhatttransportdb.php';
              //Calling static method for geting bookings
              //$bookings = bhatttransportdb::getBookings("SELECT * FROM bookings WHERE id=".$_GET['id']);
              $bookings = bhatttransportdb::getBookings("SELECT a.*,b.* FROM bookings as a,booking_detail as b WHERE a.id=b.bookingId AND a.id=".$_GET['id']);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Transport Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { font-family: Arial, sans-serif; margin:0; background:#f4f4f4; }
    .sidebar { width:200px; background:#333; color:#fff; height:100vh; float:left; }
    .sidebar a { display:block; padding:15px; color:#fff; text-decoration:none; }
    .sidebar a:hover { background:#444; }
    .main { margin-left:200px; padding:20px; }
    .card { background:#fff; padding:20px; margin:10px; display:inline-block; width:200px; box-shadow:0 2px 5px rgba(0,0,0,0.1); }
    table { width:100%; border-collapse:collapse; margin-top:20px; }
    table, th, td { border:1px solid #ccc; }
    th, td { padding:10px; text-align:left; }
  </style>

</head>
<body>
  <div class="sidebar">
    <h2><a href="../index.php">Transport</a></h2>
    <a href="dashboard.php">Dashboard</a>
    <a href="bookings.php">Bookings</a>
    <a href="#">Vehicles</a>
    <a href="#">Drivers</a>
    <a href="#">Routes</a>
    <a href="#">Reports</a>
    <a href="#">Settings</a>
    <a href="#" id="logoutLink">logout</a>
  </div>
  
  <div class="main">
        <div class="container mt-5">
        <!-- Form Section -->
        <h2 class="mb-4">Update Booking</h2>
        <form class="row g-3" id="updateBookingForm">
            <div class="col-md-4">
            <label for="inputName" class="form-label">Customer Name:</label>
            <input type="text" class="form-control" name="customerName" id="customerName" placeholder="Enter your name" value="<?php echo $bookings[0]['customerName']; ?>">
            </div>
            <div class="col-md-4">
              <label for="inputName" class="form-label">Driver Name:</label>
              <input type="text" class="form-control" name="driverName" id="driverName" placeholder="Enter driver's name" value="<?php echo $bookings[0]['driverName']; ?>">
            </div>
            <div class="col-md-4">
              <label for="inputName" class="form-label">vehical Number:</label>
              <select class="form-select" name="vehical_number" id="vehical_number">
                <option value="UK05CA1508" selected>UK05CA1508</option>
                <option value="UK03CA1839">UK03CA1839</option>
              </select>
            </div>

            <div class="col-md-4">
            <label for="route" class="form-label">Route:</label>
            <input type="text" class="form-control" name="route" id="route" placeholder="Enter your route" value="<?php echo $bookings[0]['route']; ?>">
            </div>
            <div class="col-md-4">
            <label for="bookingDate" class="form-label">Booking Date:</label>
            <input type="text" class="form-control" name="bookingDate" id="bookingDate" placeholder="Enter booking date" value="<?php echo $bookings[0]['bookingDate']; ?>">
            </div>
            <div class="col-md-4">
            <label for="inputCity" class="form-label">Rate</label>
            <input type="text" class="form-control" name="rate" id="rate" placeholder="70" value="<?php echo $bookings[0]['rate']; ?>">
            </div>
            <div class="col-md-4">
            <label for="kuntal" class="form-label">Kuntal</label>
            <input type="text" class="form-control" name="kuntal" id="kuntal" placeholder="150" value="<?php echo $bookings[0]['kuntal']; ?>">
            </div>
            <div class="col-md-4">
            <label for="bhada" class="form-label">Bhada</label>
            <input type="text" class="form-control" name="bhada" id="bhada" placeholder="10500" value="<?php echo $bookings[0]['bhada']; ?>">
            </div>
             <div class="col-md-4">
            <label for="total_rent" class="form-label">Total Rent</label>
            <input type="text" class="form-control" name="total_rent" id="total_rent" placeholder="105" value="<?php echo $bookings[0]['total_rent']; ?>">
            </div>
            <div class="col-md-4">
            <label for="rent_status" class="form-label">Rent Status</label>
            <select class="form-select" name="rent_status" id="rent_status">
            <option value="paid" selected>paid</option>
            <option value="unpaid">- Unpaid</option>
            </select>
            </div>
             <div class="col-md-4">
            <label for="Payment_type" class="form-label">Payment type</label>
            <select class="form-select" name="Payment_type" id="Payment_type">
            <option value="Cash" selected>Cash</option>
            <option value="Mobile Payment">Mobile Payment</option>
            </select>
            </div>
             <div class="col-md-4">
            <label for="Driver's expense" class="form-label">Driver's expense</label>
            <input type="text" class="form-control" name="Driver's expense" id="Driver's expense" placeholder="Enter value here" value="<?php echo $bookings[0]['total_driver_expense']; ?>">
            </div>
             <div class="col-md-4">
            <label for=" Vehicle  expense" class="form-label"> Vehicle  expense</label>
            <input type="text" class="form-control" name=" Vehicle  expense" id=" Vehicle  expense" placeholder="enter value here" value="<?php echo $bookings[0]['total_vehicle_expense']; ?>">
            </div>
             <div class="col-md-4">
            <label for="driver_expense_type" class="form-label">Driver Expense Type</label>
            <input type="text" class="form-control" name="driver_expense_type" id="driver_expense_type" placeholder="type" value="<?php echo $bookings[0]['driver_expense_type']; ?>">
            </div>
            <div class="col-md-4">
            <label for="vehicle_expense_type" class="form-label">Vehicle Expense Type</label>
            <input type="text" class="form-control" name="vehicle_expense_type" id="vehicle_expense_type" placeholder="type" value="<?php echo $bookings[0]['vehicle_expense_type']; ?>">
            </div>
            <div class="col-md-4">
            <label for="goods_owner" class="form-label">Goods Owner</label>
            <input type="text" class="form-control" name="goods_owner" id="goods_owner" placeholder="Enter goods owner" value="<?php echo $bookings[0]['goods_owner']; ?>">
            </div>
            <div class="col-md-4">
            <label for="loading_time" class="form-label">Loading Time</label>
            <input type="datetime-local" class="form-control" name="loading_time" id="loading_time" placeholder="Enter loading time" value="<?php echo $bookings[0]['loading_time']; ?>">

            </div>
            <div class="col-md-4">
            <label for="unloading_time" class="form-label">Unloading Time</label>
            <input type="datetime-local" class="form-control" name="unloading_time" id="unloading_time" placeholder="Enter unloading time" value="<?php echo $bookings[0]['unloading_time']; ?>">
            </div>
            <div class="col-md-4">
            <label for="seller_name" class="form-label">Seller Name</label>
            <input type="text" class="form-control" name="seller_name" id="seller_name" placeholder="Enter seller name" value="<?php echo $bookings[0]['seller_name']; ?>">
            </div>
            <div class="col-md-4">
            <label for="driver_name" class="form-label">Payment Receiver</label>
            <input type="text" class="form-control" name="payment_receiver" id="payment_receiver" placeholder="Enter payment receiver name" value="<?php echo $bookings[0]['payment_receiver']; ?>">
            </div>
             <div class="col-md-4">
             <label for="loading_unloading_status" class="form-label">Loading/Unloading Status</label>
            <select class="form-select" name="loading_unloading_status" id="loading_unloading_status">
            <option value="Loading" selecteds>Loading</option>
            <option value="Unloading">Unloading</option>
            </select>
            </div>
              <div class="col-12">
              <input type="hidden" value="type" name="check_loading_status" id="check_loading_status">  
              <input  type="hidden" name="id" id="id" value="<?php echo $_GET['id']?> "> 
               </div>
               
             <div class="col-12">
              <input type="hidden" value="UpdateBooking" name="UpdateBooking" id="UpdateBooking">  
            <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
      </div>
</div>
<?php
include 'Footer.php'; 
?>