<?php

include("User.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = sha1($_POST['password']);
    $contact = $_POST['contact'];

    $user = new User();

    $response = $user->create($name, $username, $email, $password, $contact);

    if ($response) {
        echo "<h1>Success</h1>";
    } else {
        echo "<h1>Error</h1>";
    }

}
