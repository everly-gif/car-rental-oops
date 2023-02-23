<?php

class User{

    private $conn = null;
    public function __construct($conn){
        $this->conn = $conn;
    }
    public function create(string $name, string $username, string $email, string $password, string $contact){
        
        $query = "INSERT INTO users(name,username,email,password,contact) VALUES ('$name', '$username','$email','$password','$contact')";


        $result = mysqli_query($this->conn->getConnection(), $query);


        return $result;
        
        
    }

    public function login($username,$password){


        $query = "SELECT * FROM users WHERE username = '$username' and password = '$password' ";

        $result = mysqli_query($this->conn->getConnection(), $query);
        
        if(mysqli_num_rows($result)==1){

            $row = mysqli_fetch_assoc($result);

            return array("success"=>true,"user_id"=>$row['id']);
        }
        
        else return array("success"=>false);
    }
}