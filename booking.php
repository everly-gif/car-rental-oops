<?php



?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </head>
    <body>
    <?php 
    
    include('./components/header.php');
    include('./src/Car.php');
    include('./src/Booking.php');
    if(!isset($_SESSION['car_user'])){
        header('location:login.php');
    }
    $car = new Car($conn);

    $response = $car->getSingleCarDetails($_GET['cdid']);
    $carDetails = mysqli_fetch_assoc($response);
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $cdid = $_GET['cdid'];
        $uid = $_SESSION['user_id'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $start_date_f =  date_create($_POST['start_date']);
        $end_date_f = date_create($_POST['end_date']);
    
        $booking = new Booking($conn);

        $total_days = date_diff($start_date_f,$end_date_f)->days;
        $amount = $carDetails['price']*$total_days;
        $discount = ($carDetails['discount'])/100*$amount;
        $amount = $amount - $discount;
    
        $response = $booking->create($cdid,$uid,$start_date,$end_date,$amount);
    
        if ($response) {
            echo "<script>alert('Booking successful')</script>";
        } else {
            echo "<script>alert('Error')</script>";
        }
    
    }

    ?>

<section class="main-container-1">

<div class="main-container-child">
    <div class="booking-section">
        <div class="booking-section-img">
            <img src="<?=$carDetails['image']?>" alt="car">
        </div>
        <div class="booking-details">
            <h1><?=$carDetails['brand']?> <?=$carDetails['name']?></h1>

            <h2>Rs <?=$carDetails['price']?></h2>

            <h4><?=$carDetails['number']?></h4>

            <p><?=$carDetails['is_available']?"Available":"Unavailable" ?></p>
        </div>
    </div>
    <div class="booking-section" >

        <h1>Fill Booking Details</h1>

        <div>
        <form method="POST">
        <p>Start Date</p>
        <input type="date" id="start_date" name="start_date" min="<?=Date('Y-m-d')?>"/>
        </div>

        <div>
        <p>End Date</p>
        <input type="date" id="end_date" min="<?=Date('Y-m-d')?>" name="end_date" onchange="calculatePrice(<?=$carDetails['price']?>,<?=$carDetails['discount']?>)"/>
        </div>
       
        <span> To Be Paid : </span>
        <h2 id="price">

        Rs <?=$carDetails['price']?> 

        </h2> <span>(<?= $carDetails['discount']?> % Discount)</span>

        <button class="btn btn-primary">Confirm Booking</button>
       </form>

</div>
</div>

</section>
 <script src="index.js"></script>


    </body>
</html>