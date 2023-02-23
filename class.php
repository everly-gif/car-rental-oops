<?php

 /*class Demo{

    private int $age;
    private string $name;
    public function __construct($name, $age){  //constructs the object
        $this->name = $name;
        $this->age = $age;
    }

    public function setName($name)
    {

        $this->name = $name;
    }

    public function getName():string 
    {

        return $this->name ;
    }

    public function printDetails(){

        echo "The name is ".$this->name;
        echo "<br/>";
        echo "The age is ".$this->age;

    }

}

// $obj = new Demo("Everly",20);
// $obj->printDetails();


class Child extends Demo{

}

$obj = new Child("Everly",20);
$obj->printDetails();
*/

trait demo{
    function getUserDetails(){
        echo "GET";
    }
    function setUserDetails(){
        echo "SET";
    }
}

class First{
    use demo;
}

$obj = new First();
$obj->setUserDetails();