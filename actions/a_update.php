<?php
require_once 'db_connect.php';
require_once 'file_upload.php';
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

if ($_POST) {    
   $name = $_POST['name'];
   $price = $_POST['price'];
   $description = $_POST['description'];
   $id = $_POST['id'];
   $uploadError = '';

   $image = file_upload($_FILES['image']);
   
   if($image->error===0){
       ($_POST["image"]=="product.png")?: unlink("../img/$_POST[image]");          
       $sql = "UPDATE dishes SET name = '$name', price = $price, description = '$description', image = '$image->fileName' WHERE dishID = {$id}";
       
   }else{
       $sql = "UPDATE dishes SET name = '$name', price = $price, description = '$description' WHERE dishID = {$id}";
   }    
   
   if (mysqli_query($connect, $sql)) {
       $class = "success";
       $message = "The record was successfully updated";
       $uploadError = ($image->error !=0)? $image->ErrorMessage :'';
   } else {
       $class = "danger";
       $message = "Error while updating record : <br>" . mysqli_connect_error();
       $uploadError = ($image->error !=0)? $image->ErrorMessage :'';
   }
   mysqli_close($connect);    
} else {
   header("location: ../error.php");
}
?>


<!DOCTYPE html>
<html lang="en">
   <head>
       <meta charset="UTF-8">
       <title>Update</title>
       <?php require_once '../components/boot.php'?> 
   </head>
   <body>
       <div class="container">
           <div class="mt-3 mb-3">
               <h1>Update request response</h1>
           </div>
           <div class="alert alert-<?php echo $class;?>" role="alert">
               <p><?php echo ($message) ?? ''; ?></p>
               <p><?php echo ($uploadError) ?? ''; ?></p>
               <a href='../update.php?id=<?=$id;?>'><button class="btn btn-warning" type='button'>Back</button></a>
               <a href='../index.php'><button class="btn btn-success" type='button'>Home</button></a>
           </div>
       </div>
   </body>
</html>

