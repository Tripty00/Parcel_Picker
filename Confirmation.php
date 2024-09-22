<?php
include 'Connection.php';
session_start();

if (isset($_GET['ordersid'])) {
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
   <style>
       body {
           display: flex;
           justify-content: center;
           align-items: center;
           height: 100vh;
           background: purple;
           color: white;
       }
       .form-container {
           background: rgba(255, 255, 255, 0.1);
           padding: 20px;
           border-radius: 10px;
           text-align: center;
           display: flex;
           flex-direction: column;
           align-items: center;
       }
       .button-container {
           display: flex;
           gap: 20px; /* Space between buttons */
       }
       .form-btn {
           padding: 10px 20px;
           background: #007BFF;
           color: white;
           border: none;
           border-radius: 5px;
           cursor: pointer;
       }
       .form-btn:hover {
           background: #0056b3;
       }
   </style>
</head>
<body>
<div class="form-container">
   <h1>Confirmation</h1>
   <?php
       if (isset($error)) {
           echo '<span class="error-msg">'.$error.'</span>';
       }
   ?>
   <p>Total Amount to Pay: <strong><?php echo isset($paymentAmount) ? $paymentAmount . ' Taka' : 'N/A'; ?></strong></p>
   
   <p>Please choose an option:</p>

   <div class="button-container">
       <form action="PaymentMethod.php" method="post">
           <input type="hidden" name="ordersid" value="<?php echo $ordersid; ?>">
           <input type="hidden" name="paymentAmount" value="<?php echo isset($paymentAmount) ? $paymentAmount : 0; ?>">
           <input type="submit" value="Go to Payment Method" class="form-btn">
       </form>

       <form action="HomePage.php" method="get">
           <input type="hidden" name="ordersid" value="<?php echo $ordersid; ?>">
           <input type="submit" value="Confirm" class="form-btn">
       </form>
   </div>
</div>
</body>
</html>
