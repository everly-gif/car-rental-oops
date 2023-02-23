
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
<?php include('./components/header.php');

include('./src/Car.php');

$car = new Car($conn);

$result = $car->index();


?>
<div class="card-container">
<?php

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {


        ?>
<div class="card-cont">
<div class="card" style="width: 18rem;">
  <a href="car.php?id=<?=$row['id']?>"><img src="<?=$row['image_url']?>" class="card-img-top" alt="..."></a>
  <div class="card-body">
    <h5 class="card-title"><?=$row['brand']?> <?=$row['name']?></h5>
    <div class="color">
        <div></div>
        <div></div>
    </div>
    <p class="card-text"><i class="fa fa-inr" aria-hidden="true"></i><?=$row['price']?></p>
    <p><?=$row['discount']?>% OFF</p>
    <p><?php //if ((bool) $row['is_available'])
                echo "Available";
            // else 
            //  {
            //     echo "Unavailable";
            //  }
        ?>
    </p>
  </div>
</div>
</div>
<?php
    }
}
?>
</div>
<?php include('./components/footer.php');?>
</body>
</html>