<?php
include 'Connection.php';
session_start();

if (isset($_POST['submit']) && isset($_GET['ordersid'])) {
    $weightChecker = $_POST['weightChecker'];
    $ordersid = $_GET['ordersid'];

    // Update the order with product details
    $update = "UPDATE orders SET weightChecker = '$weightChecker' WHERE ordersid = $ordersid";
    $res = $conn->query($update);
    
    if ($res) {
        header('Location: Confirmation.php?ordersid=' . $ordersid);

        exit();
    }
    
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <title>Product Details</title>
   <link rel="stylesheet" href="style2.css">
</head>
 <body style="background: Purple">    
<div class="form-container">

   <form action="" method="post">
   <h1>Product Details</h1>
   <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
   ?>
      <p>Is it Paper? Or Less waight than 5kg.</p><br>
      <input type="text" name="weightChecker" required placeholder="Write 'YES' or 'NO'.">
      <input type="submit" name="submit" value="Next" class="form-btn">
   </form>
</div>
</body>
</html>
 