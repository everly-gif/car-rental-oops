<?php
class Booking{

    private $conn = null;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function create($cdid,$uid,$start_date,$end_date,$amount){
        $query = "INSERT INTO bookings(cdid,uid,start_date,end_date,amount) VALUES ($cdid,$uid,'$start_date','$end_date','$amount')";

        if($result = mysqli_query($this->conn->getConnection(),$query)){
            return $result;
        }
    }

    public function get($uid){
        $query = "SELECT * from bookings b, car_details cd,cars c where b.cdid = cd.id and cd.cid = c.id and uid = $uid";

        if($result = mysqli_query($this->conn->getConnection(),$query)){
            return $result;
        }
    }
}