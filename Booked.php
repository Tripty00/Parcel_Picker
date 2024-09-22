<?php
include 'Connection.php';
session_start();

if (isset($_POST['submit'])) {
    $sname = $_POST['name'];
    $sphn = $_POST['number'];
    $saddress = $_POST['address'];
    $insert = "INSERT INTO orders (senderName, senderPhone, senderAddress, receiverName, receiverPhone, receiverAddress, weightChecker) VALUES ('$sname', '$sphn', '$saddress', 'noData', 'noData', 'noData', 'noData')";
    $res = $conn->query($insert);
    
    if ($res) {
        $ordersid = $conn->insert_id;
        header('Location: ReceiverDetails.php?ordersid=' . $ordersid);
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
   <h1>Sender Details</h1>
   <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
   ?>
      <input type="text" name="name" required placeholder="Enter sender name ">
      <input type="text" name="number" required placeholder="Enter sender phone number">
      <input type="text" name="address" required placeholder="Enter sender address">
      <input type="submit" name="submit" value="Next" class="form-btn">
   </form>
</div>
</body>
</html>
 
