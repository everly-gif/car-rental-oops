
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
    <?php 
    
    include('./components/header.php');
    
    include("./src/User.php");
    $message = "";
    $messageType = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = sha1($_POST['password']);

        $user = new User($conn);

        $response = $user->login($username, $password);

        if ($response["success"]===true) {
            $message = "Logged in successfully";
            $messageType = "success";
            $_SESSION['car_user'] = $username;
            $_SESSION['user_id'] = $response['user_id'];
            header('location:index.php');
        } else {
            $message = "Wrong Credentials";
            $messageType = "danger";
        }

    }
    
    ?>
    <div style="display:flex;justify-content:center;align-items:center; margin-top: 120px; ">
    <form  method="post" class="m-3" style="width:35%; background-color: #fff; padding:20px;border-radius: 30px;">
    <h3 class="text-center">Login User</h3><br>
    <input type="text" class="form-control mb-3" name="username" placeholder="Enter username">
    <input type="password" class="form-control mb-3" name="password" placeholder="Enter password">
    <button class="btn btn-success" style="width:100%;" type="submit" name="submit" value="submit">Login</button>
   
    <br/><br/>
  
    <?php if ($message != null) { ?>
        <div class="alert alert-<?=$messageType?>">
        <?=$message?>
    </div>
    <?php }?>
    <p class="mt-3">Don't have an account ? <a href="register.php">Create one</a></p>
    </form>
   
  </div>
  <?php include('./components/footer.php');?>
</body>
</html>

