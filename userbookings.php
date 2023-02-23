
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </head>
    <body>
    <?php

include("./components/header.php");
include("./src/Booking.php");

if(!isset($_SESSION['user_id'])){
    header('location:login.php');
}

$bookings = new Booking($conn);

$result = $bookings->get($_SESSION['user_id']);



   
   ?>

<table class="table p-3">
  <thead>
    <tr>
      <th scope="col">Car Name</th>
      <th scope="col">Car Brand</th>
      <th scope="col">Car Number</th>
      <th scope="col">Car Color</th>
      <th scope="col">Start Date</th>
      <th scope="col">End Date</th>
      <th scope="col">Amount</th>
      
    </tr>
  </thead>
  <tbody>
    <?php while($row = mysqli_fetch_assoc($result)){?>
    <tr>
      <td><a href="car.php?id=<?=$row['cid']?>"><?=$row['name']?></a></td>
      <td><?=$row['brand']?></td>
      <td><?=$row['number']?></td>
      <td><?=$row['color']?></td>
      <td><?=$row['start_date']?></td>
      <td><?=$row['end_date']?></td>
      <td><?=$row['amount']?></td>
    </tr>
    <?php }?>
  </tbody>
</table>
    </body>
</html>





