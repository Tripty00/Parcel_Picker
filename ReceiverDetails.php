<?php
include 'Connection.php';
session_start();

if (isset($_POST['submit']) && isset($_GET['ordersid'])) {
    $rname = $_POST['name'];
    $rphn = $_POST['number'];
    $raddress = $_POST['address'];
    $ordersid = $_GET['ordersid'];
    $update = "UPDATE orders SET receiverName = '$rname', receiverPhone = '$rphn', receiverAddress = '$raddress' WHERE ordersid = $ordersid";
    $res = $conn->query($update);
    
    if ($res) {
        header('Location: ProductDetails.php?ordersid=' . $ordersid);
        exit();
    }
    
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <title>Receiver Details</title>
   <link rel="stylesheet" href="style2.css">
</head>
 <body style="background: Purple">    
<div class="form-container">

   <form action="" method="post">
   <h1>Receiver Details</h1>
   <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
   ?>
      <input type="text" name="name" required placeholder="Enter receiver name ">
      <input type="text" name="number" required placeholder="Enter sender phone number">
      <input type="text" name="address" required placeholder="Enter receiver address">
      <input type="submit" name="submit" value="Next" class="form-btn">
   </form>
</div>
</body>
</html>
 