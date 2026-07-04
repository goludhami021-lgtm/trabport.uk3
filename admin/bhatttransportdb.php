<?php
session_start();
class bhatttransportdb {
    private $host = "localhost";
    private $db_name = "bhatttransport_db";
    private $username = "root";
    private $password = "";
    private $charset = "utf8mb4";
    private $pdo;
    private $error;

    // Constructor automatically creates the connection
    public function __construct() {
        $dsn = "mysql:host={$this->host};dbname={$this->db_name};charset={$this->charset}";
        try {
            $this->pdo = new PDO($dsn, $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo "Connection failed: " . $this->error;
        }
    }

    // Method to get the PDO instance
    public function getConnection() {
        return $this->pdo;
    }

    // Insert data into table
    public function createBooking($customerName, $driverName, $vehical_number, $route, $rate, $kuntal, $bhada, $bookingDate) {
                try{
            $stmt = $this->pdo->prepare("INSERT INTO bookings (customerName, driverName, vehical_number, route, rate, kuntal, bhada, bookingDate) VALUES (:customerName, :driverName, :vehical_number, :route, :rate, :kuntal, :bhada, :bookingDate)");
            // Bind values
            $stmt->execute([
                ':customerName' => $customerName,
                ':driverName'   => $driverName,
                ':vehical_number'=> $vehical_number,
                ':route'        => $route,
                ':rate'         => $rate,
                ':kuntal'       => $kuntal,
                ':bhada'        => $bhada,
                ':bookingDate'  => $bookingDate
            ]);
            return $this->pdo->lastInsertId();
        }
        catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

// Insert data into table
    public function createBookingDetails($bookingId, $total_rent, $rent_status, $payment_type, $total_driver_expense, $total_vehicle_expense, $driver_expense_type, $vehicle_expense_type, $goods_owner, $loading_time, $unloading_time, $seller_name, $payment_receiver, $loading_unloading_status, $vehical_number) {
             try{
            $stmt = $this->pdo->prepare("INSERT INTO booking_detail (bookingId, total_rent, rent_status, payment_type, total_driver_expense, total_vehicle_expense, driver_expense_type, vehicle_expense_type, goods_owner, loading_time, unloading_time, seller_name, payment_receiver, loading_unloading_status, vehical_number) VALUES (:bookingId, :total_rent, :rent_status, :payment_type, :total_driver_expense, :total_vehicle_expense, :driver_expense_type, :vehicle_expense_type, :goods_owner, :loading_time, :unloading_time, :seller_name, :payment_receiver, :loading_unloading_status, :vehical_number)");
            $stmt->execute([
                ':bookingId' => $bookingId,
                ':total_rent' => $total_rent,
                ':rent_status' => $rent_status,
                ':payment_type' => $payment_type,
                ':total_driver_expense' => $total_driver_expense,
                ':total_vehicle_expense' => $total_vehicle_expense,
                ':driver_expense_type' => $driver_expense_type,
                ':vehicle_expense_type' => $vehicle_expense_type,
                ':goods_owner' => $goods_owner,
                ':loading_time' => $loading_time,
                ':unloading_time' => $unloading_time,
                ':seller_name' => $seller_name,
                ':payment_receiver' => $payment_receiver,
                ':loading_unloading_status' => $loading_unloading_status,
                ':vehical_number' => $vehical_number
            ]);
            return $this->pdo->lastInsertId();
        }
        catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function updateBooking($id, $customerName, $driverName, $vehical_number, $route, $rate, $kuntal, $bhada, $bookingDate) {
       try{
            $stmt = $this->pdo->prepare("UPDATE bookings SET customerName = :customerName, driverName = :driverName, vehical_number = :vehical_number, route = :route, rate = :rate, kuntal = :kuntal, bhada = :bhada, bookingDate = :bookingDate WHERE id = :id");
            // Bind values
            $stmt->execute([
                ':customerName' => $customerName,
                ':driverName'   => $driverName,
                ':vehical_number'=> $vehical_number,
                ':route'        => $route,
                ':rate'         => $rate,
                ':kuntal'       => $kuntal,
                ':bhada'        => $bhada,
                ':bookingDate'  => $bookingDate,
                ':id'           => $id
            ]);
            return $stmt->rowCount(); // number of rows updated
        }
        catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function updateBookingDetails($bookingId, $total_rent, $rent_status, $payment_type, $total_driver_expense, $total_vehicle_expense, $driver_expense_type, $vehicle_expense_type, $goods_owner, $loading_time, $unloading_time, $seller_name, $payment_receiver, $loading_unloading_status, $vehical_number) {
    try {
        $stmt = $this->pdo->prepare(" UPDATE booking_detail SET total_rent = :total_rent,
                rent_status = :rent_status,
                payment_type = :payment_type,
                total_driver_expense = :total_driver_expense,
                total_vehicle_expense = :total_vehicle_expense,
                driver_expense_type = :driver_expense_type,
                vehicle_expense_type = :vehicle_expense_type,
                goods_owner = :goods_owner,
                loading_time = :loading_time,
                unloading_time = :unloading_time,
                seller_name = :seller_name,
                payment_receiver = :payment_receiver,
                loading_unloading_status = :loading_unloading_status,
                vehical_number = :vehical_number
            WHERE bookingId = :bookingId
        ");

        $stmt->execute([
            ':bookingId' => $bookingId,
            ':total_rent' => $total_rent,
            ':rent_status' => $rent_status,
            ':payment_type' => $payment_type,
            ':total_driver_expense' => $total_driver_expense,
            ':total_vehicle_expense' => $total_vehicle_expense,
            ':driver_expense_type' => $driver_expense_type,
            ':vehicle_expense_type' => $vehicle_expense_type,
            ':goods_owner' => $goods_owner,
            ':loading_time' => $loading_time,
            ':unloading_time' => $unloading_time,
            ':seller_name' => $seller_name,
            ':payment_receiver' => $payment_receiver,
            ':loading_unloading_status' => $loading_unloading_status,
            ':vehical_number' => $vehical_number
        ]);

        return $stmt->rowCount(); // number of rows updated
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}


    // Insert data into table
    public static function getBookings($query) {
        try{
            $stmt = (new self())->getConnection()->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

           // return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

// Close connection
    public function __destruct() {
        $this->pdo = null;
    }

    public function deleteBooking($query) {
        try {
            $stmt = $this->pdo->prepare($query);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error deleting booking: " . $e->getMessage();
            return false;
        }
    }


}