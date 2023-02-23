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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
<body>

<?php 

include('./components/header.php');

include('./src/Car.php');

$car = new Car($conn);

$res = $car->get($_GET['id']);

$name = null;
$price = null;
$discount = null;
$brand = null;
$available = null;
$count = 0;

$images = array();
$colors = array();
$numbers = array();
$cdids = array();


while($carDetails=mysqli_fetch_array($res)){
    if($count==0){
        $name = $carDetails['name'];
        $price = $carDetails['price'];
        $discount = $carDetails['discount'];
        $brand = $carDetails['brand'];
        $number = $carDetails['number'];
        $available = $carDetails['is_available'];
        $count=1;
    }

    $images[] = $carDetails['image'];
    $colors[] = $carDetails['color'];
    $numbers[] = $carDetails['number'];
    $cdids[] = $carDetails[9];
}


?>

<section class="main-container-1">
<div class="main-container-child">
    <div class="container-section">
            <div class="big-car-img">
                <img src="<?=$images[0]?>" id="big-img" alt="car">
            </div>

            <div class="img-options">
                <?php
                    foreach ($images as $key => $value) {
                    ?> <div class="img-option">
                        <img src="<?=$value?>" onclick="changeImage(this.src,'<?=$numbers[$key]?>',<?=$cdids[$key]?>)" alt="car">
                        </div>
                   <?php }
                ?>
            </div>

            <div class="color-options">
                <?php
                foreach ($colors as $key => $color) {
                ?>
                 <div class='color-option'>
                 <p style= "background-color:<?=$color?>" onclick="changeImage('<?=$images[$key]?>','<?=$numbers[$key]?>',<?=$cdids[$key]?>)"></p>
                 </div>
                <?php }
            ?>
            </div>
    </div>
    <div class="container-section">
    <h1><?=$brand?> <?=$name?></h1>
    <h2>Rs <?=$price?></h2>
    <p><?php if ($available)
        echo "Available";
        else
        echo "Unavailable";
        ?></p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda perferendis laborum mollitia commodi, non distinctio natus a, tempora libero beatae similique labore quisquam ad, animi laboriosam nulla. Placeat, temporibus exercitationem?</p>
    <h2 id="number"><?=$number?></h2>

    <a class="btn btn-primary" id="booking-url" href="booking.php?cdid=<?=$cdids[0]?>&price=<?=$price?>&discount=<?=$discount?>">Book Now</a>
</div>
</div>
</section>
<?php include('./components/footer.php');
?>
<script src="index.js"></script>
</body>
</html>
