<?php
require_once 'actions/db_connect.php';

$sql = "SELECT * from dishes";
$result = mysqli_query($connect,$sql);
$card = '';
if(mysqli_num_rows($result)  > 0) {   
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $card .= '<div class="col">
        <div class="card" style="height: 25rem;">
        <img src="./img/'.$row['image'].'" class="card-img-top" alt="..." style="height: 15rem;">
        <div class="card-body d-flex justify-content-center align-items-center flex-column">
          <h5 class="card-title text-center">'.$row['name'].'</h5>
          <p class="card-text text-center">Price: '.$row['price'].'€</p>
          <div class="buttons">
          <a href="details.php?id='.$row['dishID'].'" class="btn btn-secondary">Details</a>
          <a href="update.php?id='.$row['dishID'].'" class="btn btn-warning">Update</a>
          <a href="delete.php?id='.$row['dishID'].'" class="btn btn-danger">Delete</a>
          </div>
        </div></div></div>';
// echo "<p>" .$row['name']." ".$row['price']."</p>";
}
}
else {
    $card = "<p>No Data Available</p>";
}
mysqli_close($connect);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <?php require_once 'components/boot.php'?>
</head>
<body>
<div class="container my-5">
  <a href="create.php"class="btn btn-success">Add Product</a>
    <div class="row row-cols-3 g-3">
<?=$card;?>
<!-- <div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div> -->
</div>
</div>
</body>
</html>