<?php
require_once 'actions/db_connect.php';

if($_GET['id']){
$sql = "SELECT * from dishes where dishID= $_GET[id]";
$result = mysqli_query($connect,$sql);
$card = '';
if(mysqli_num_rows($result)  > 0) {   
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $card .= '<div class="col">
        <div class="card" style="height: 25rem;">
        <img src="'.$row['image'].'" class="card-img-top" alt="..." style="height: 15rem;">
        <div class="card-body">
          <h5 class="card-title">'.$row['name'].'</h5>
          <p class="card-text">Price:'.$row['price'].'€</p>
          <p class="card-text">Description: '.$row['description'].'</p>
        </div></div></div>';
    // echo $_GET['id']; 
}}
else{
    $play = '<div class="play d-flex justify-content-center align-items-center text-danger h1" style="height: 100vh;">
    <p>Dont play with the url.</p>
</div>';
}
}
else{
    $play = '<div class="play d-flex justify-content-center align-items-center text-danger h1" style="height: 100vh;">
    <p>Dont play with the url.</p>
</div>';
}
mysqli_close($connect);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require_once 'components/boot.php'?>
</head>
<body>
    <!-- <p>hello</p> -->
    <div class="container">
    <?=$play;?>
    <div class="row row-cols-3 g-3">
<?=$card;?>

</div>
</div>
</body>
</html>

