<?php
include 'Connection.php';
session_start();
if (!isset($_SESSION['ridername'])) {
    header('Location: RiderHomePage.php'); 
    exit();
}
$ridername = $_SESSION['ridername'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>Parcel Picker Rider</title>
</head>
<body style="background: Purple"> 
<nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <?php include 'Header2.php'; ?>
            <div class="carousel-caption carousel1">
                <p>Hello, <?php echo htmlspecialchars($ridername); ?>!</p> 
                <h1>Welcome</h1>
                <p>Thank you for logging in.You can now earn by delivery parcel.</p>
                </div>
      <div class="main_div">     
      </div>
</body>
</html>




