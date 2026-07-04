<?php

require_once 'bhatttransportdb.php';
$db = new bhatttransportdb();
$db->getConnection();
if(isset($_REQUEST['AdminLogin']) && $_REQUEST['AdminLogin'] == 'ADMIN_LOGIN'){
    $username = $_POST['username'];
    $password = $_POST['password'];

    // For demonstration, using hardcoded credentials. In production, use hashed passwords from the database.
    $valid_username = "admin";
    $valid_password = "Admin@123";
    $message = "";
    if($username === $valid_username && $password === $valid_password){
        $_SESSION['user'] = $username; // Set session variable to indicate admin is logged in    
        $message = "valid";
    } else {
         $message = "invalid";
    }
    echo $message;
}


if (isset($_POST['UpdateBooking']) && $_POST['UpdateBooking'] == 'UpdateBooking') {
   extract($_POST);
    $db->updateBooking($id, $customerName, $driverName, $vehical_number, $route, $rate, $kuntal, $bhada, $bookingDate);
    $db->updateBookingDetails($id, $total_rent, $rent_status, $payment_type, $total_driver_expense, $total_vehicle_expense, $driver_expense_type, $vehicle_expense_type, $goods_owner, $loading_time, $unloading_time, $seller_name, $payment_receiver, $loading_unloading_status, $vehical_number);    

}

// Handle booking form
if (isset($_POST['booking']) && $_POST['booking'] == 'CreateBooking') {
   
    $customerName   = $_POST['customerName'];
    $driverName   = $_POST['driverName'];
    $vehical_number  = $_POST['vehical_number'];
    $route  = $_POST['route'];
    $rate   = $_POST['rate'];
    $kuntal = $_POST['kuntal'];
    $bhada  = $_POST['bhada'];
    $date   = $_POST['bookingDate'];
    $rent  = $_POST['total_rent'];
    $status  = $_POST['rent_status'];
    $payment   = $_POST['Payment_type'];
    $driver_expense = $_POST['total_driver_expense'];
    $vehicle_expense  = $_POST['total_vehicle_expense'];
    $driver_expense_type   = $_POST['driver_expense_type'];
    $vehicle_expense_type = $_POST['vehicle_expense_type'];
    $goods_owner = $_POST['goods_owner'];
    $loading_time = $_POST['loading_time'];
    $unloading_time = $_POST['unloading_time'];
    $seller_name = $_POST['seller_name'];
    $payment_receiver = $_POST['payment_receiver'];
    $loading_unloading_status = $_POST['loading_unloading_status'];
    $vehical_number = $_POST['vehical_number'];
    $check_loading_status = $_POST['check_loading_status']; 
    if($check_loading_status == "Unloaded"){
        $bookingID =  $createBooking = $db->createBooking($customerName, $driverName, $vehical_number, $route, $rate, $kuntal, $bhada, $date);
        if ($bookingID != null) {
            // insert data in bookingdetails table.
            $createBookingDetail = $db->createBookingDetails($bookingID, $rent, $status, $payment,$driver_expense, $vehicle_expense, $driver_expense_type, $vehicle_expense_type, $goods_owner, $loading_time, $unloading_time, $seller_name, $payment_receiver, $loading_unloading_status, $vehical_number);
            echo "success";
        }
    } else {
        echo "Vehicle is currently loaded. Cannot create a new booking until it is unloaded." . $check_loading_status;
    }
}

// Handle logout
if (isset($_GET['logout']) && $_GET['logout'] == 'TRUE') {
    // Destroy session or perform any necessary cleanup
    session_destroy();
    echo "success";
}

if (isset($_POST['CheckLoadingStatus'])) {
    $loadingStatus = bhatttransportdb::getBookings("SELECT * FROM booking_detail WHERE loading_unloading_status = 'Loading' and vehical_number = '".$_POST['vehical_number']."'");
    if(empty($loadingStatus)){
        echo "Unloaded";
    } else {    
        echo "Loaded";
    }
}
if (isset($_POST['action']) && $_POST['action'] == 'deleteBooking') {
    $bookingId = $_POST['id'];
   $isDelete =  $db->deleteBooking("DELETE FROM bookings WHERE id = $bookingId");
   if($isDelete){
       echo "success";
   } else {
       echo "error" . $isDelete;
   }
}
