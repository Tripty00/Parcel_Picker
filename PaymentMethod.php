<?php
include 'Connection.php';
session_start();

if (isset($_POST['submit']) && isset($_GET['ordersid'])) {
    $ordersid = $_GET['ordersid'];

    // Fetch weightChecker from the database
    $select = "SELECT weightChecker FROM orders WHERE ordersid = $ordersid";
    $result = mysqli_query($conn, $select);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $weightChecker = $row['weightChecker'];

        // Determine the payment amount based on the weightChecker value
        if ($weightChecker === 'YES') {
            $paymentAmount = 180;
        } elseif ($weightChecker === 'NO') {
            $paymentAmount = 80;
        } else {
            $error = "Invalid weight checker value.";
        }

        // Process payment when user submits payment form
        if (isset($_POST['pay'])) {
            // Here you would integrate your payment processing logic
            // For demo purposes, we'll assume the payment is successful
            $paymentSuccessful = true; // Simulate a successful payment
            
            if ($paymentSuccessful) {
                header('Location: HomePage.php?ordersid=' . $ordersid);
                exit();
            } else {
                $error = "Payment failed. Please try again.";
            }
        }
    } else {
        $error = "Order not found.";
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <title>Confirmation</title>
   <link rel="stylesheet" href="style2.css">
</head>
<body style="background: Purple">    
<div class="form-container">
   <form action="" method="post">
       <h1>Payment Confirmation</h1>
       <?php
           if (isset($error)) {
               echo '<span class="error-msg">'.$error.'</span>';
           }
       ?>
       <p>Total Amount to Pay: <strong><?php echo isset($paymentAmount) ? $paymentAmount . ' Taka' : 'N/A'; ?></strong></p>
       <p>Please enter your payment details:</p><br>

       <label for="cardNumber">Card Number:</label>
       <input type="text" name="cardNumber" required placeholder="Enter Card Number">

       <label for="expiryDate">Expiry Date:</label>
       <input type="text" name="expiryDate" required placeholder="MM/YY">

       <label for="cvv">CVV:</label>
       <input type="text" name="cvv" required placeholder="Enter CVV">

       <input type="submit" name="pay" value="Pay Now" class="form-btn">
   </form>
</div>
</body>
</html>
