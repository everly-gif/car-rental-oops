<?php

class Car{

    private $conn = null;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function index(){

        $query = "SELECT * FROM cars";

        if($response = mysqli_query($this->conn->getConnection(),$query)){
            return $response;
        }
    }

    public function get($id){
        $query = "SELECT * from cars c, car_details cd where c.id = cd.cid and c.id=$id";

        $response = mysqli_query($this->conn->getConnection(), $query);

        return $response;
    }

    public function getSingleCarDetails($id){
        $query = "SELECT * FROM car_details cd, cars c WHERE cd.cid = c.id and cd.id = $id";

        if($result = mysqli_query($this->conn->getConnection(),$query)){
            return $result;
        }
    }
}