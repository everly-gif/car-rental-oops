
<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP & HTML Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<style>
    input{
        border:solid none !important;
        outline:none;
        
    }
</style>
<body style="background-color: #ccc;">
    <?php include('./components/header.php');
    
    
    include("./src/User.php");

    $message = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = sha1($_POST['password']);
        $contact = $_POST['contact'];

        $user = new User($conn);

        $response = $user->create($name, $username, $email, $password, $contact);

        if ($response) {
            $message = true;
        } else {
            $message = false;
        }

    }
    
    ?>
    <div style="display:flex;justify-content:center;align-items:center; margin-top: 120px; ">
    <form  method="post" class="m-3" style="width:35%; background-color: #fff; padding:20px;border-radius: 30px;">
    <h3 class="text-center">Register User</h3><br>
    <input type="text" class="form-control mb-3" name="name" placeholder="Enter name">
    <input type="text" class="form-control mb-3" name="username" placeholder="Enter username">
    <input type="email"  class="form-control mb-3" name="email" placeholder="Enter email">
    <input type="password" class="form-control mb-3" name="password" placeholder="Enter password">
    <input type="tel" class="form-control mb-3" name="contact" placeholder="Enter contact">
    <button class="btn btn-success" style="width:100%;" type="submit" name="submit" value="submit">Register</button>

    <br/><br/>
    <?php if ($message === true) { ?>
        <div class="alert alert-success">
        <?php echo "User Created"; ?>
    </div>
    <?php
    } else if($message === false) { ?>
    <div class="alert alert-danger">
        <?php echo "Error"; ?>
    </div>
    <?php }?>
    <p>Already have an account ? <a href="login.php">Log In</a></p>
    </form>
  </div>
  <?php include('./components/footer.php');?>
</body>
</html>

