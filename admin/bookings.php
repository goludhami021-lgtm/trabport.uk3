<?php 
include 'Header.php';
?>
<div class="main">
        <div class="container mt-5">
        <!-- Form Section -->
        <h2 class="mb-4">Create Booking</h2>
        <form class="row g-3" id="createBookingForm">
            <div class="col-md-4">
              <label for="inputName" class="form-label">Customer Name:</label>
              <input type="text" class="form-control" name="customerName" id="customerName" placeholder="Enter your name" >
            </div>
            <div class="col-md-4">
              <label for="inputName" class="form-label">Driver Name:</label>
              <input type="text" class="form-control" name="driverName" id="driverName" placeholder="Enter driver's name" >
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
              <input type="text" class="form-control" name="route" id="route" placeholder="Enter your route" >
            </div>
            

            <div class="col-md-4">
            <label for="bookingDate" class="form-label">Booking Date:</label>
            <input type="datetime-local" class="form-control" name="bookingDate" id="bookingDate" value="<?php echo date("Y-m-d\TH:i"); ?>" >
            </div>
            <div class="col-md-4">
            <label for="inputCity" class="form-label">Rate</label>
            <input type="text" class="form-control" name="rate" id="rate" placeholder="enter rate" >
            </div>
            <div class="col-md-4">
            <label for="kuntal" class="form-label">Kuntal</label>
            <input type="text" class="form-control" name="kuntal" id="kuntal" placeholder="150" >
            </div>
            <div class="col-md-4">
            <label for="bhada" class="form-label">Bhada</label>
            <input type="text" class="form-control" name="bhada" id="bhada" placeholder="10500" >
            </div>
             <div class="col-md-4">
            <label for="total_rent" class="form-label">Total Rent</label>
            <input type="text" class="form-control" name="total_rent" id="total_rent" placeholder="105" >
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
            <label for="total_driver_expense" class="form-label">Total Driver Expense</label>
            <input type="hidden" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id="OpenModal">
            <input type="text" class="form-control" name="total_driver_expense" id="total_driver_expense" placeholder="cash">
            </div>
            <div class="col-md-4">
            <label for="total_vehicle_expense" class="form-label">Total Vehicle Expense</label>
            <input type="text" class="form-control" name="total_vehicle_expense" id="total_vehicle_expense" placeholder="type">
            </div>
            <div class="col-md-4">
            <label for="driver_expense_type" class="form-label">Driver Expense Type</label>
            <input type="text" class="form-control" name="driver_expense_type" id="driver_expense_type" placeholder="type">
            </div>
            <div class="col-md-4">
            <label for="vehicle_expense_type" class="form-label">Vehicle Expense Type</label>
            <input type="text" class="form-control" name="vehicle_expense_type" id="vehicle_expense_type" placeholder="type">
            </div>
            <div class="col-md-4">
            <label for="goods_owner" class="form-label">Goods Owner</label>
            <input type="text" class="form-control" name="goods_owner" id="goods_owner" placeholder="Enter goods owner">
            </div>
            <div class="col-md-4">
            <label for="loading_time" class="form-label">Loading Time</label>
            <input type="datetime-local" class="form-control" name="loading_time" id="loading_time" placeholder="Enter loading time">

            </div>
            <div class="col-md-4">
            <label for="unloading_time" class="form-label">Unloading Time</label>
            <input type="datetime-local" class="form-control" name="unloading_time" id="unloading_time" placeholder="Enter unloading time">
            </div>
            <div class="col-md-4">
            <label for="seller_name" class="form-label">Seller Name</label>
            <input type="text" class="form-control" name="seller_name" id="seller_name" placeholder="Enter seller name">
            </div>
            <div class="col-md-4">
            <label for="driver_name" class="form-label">Payment Receiver</label>
            <input type="text" class="form-control" name="payment_receiver" id="payment_receiver" placeholder="Enter payment receiver name">
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

            </div>
           
            <div class="col-12">
              <input type="hidden" value="CreateBooking" name="booking" id="booking">  
            <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>

        
        </div>
    </div>
</div>
<?php
include 'Footer.php'; 
?>