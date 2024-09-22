<?php
include 'Connection.php';
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: Booked.php'); 
    exit();
}
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">   
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="Parcel_Picker.css" />
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="Parcel_Picker.css" />
    <title>Parcel Picker</title>
</head>
<body style="background: Purple">
<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="Images/Logo.png" alt="logo" class="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mg-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="HomePage.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="map.php">Tracking</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="About.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Contact.php">Contact Us</a>
                </li>
            </ul>
            <button class="button" onclick="location.href='Logout.php'">Logout</button>
        </div>
    </div>
</nav>
<div class="carousel-inner">
    <div class="carousel-item active">
        <img src="img7.jpeg" class="d-block w-100-height" alt="img1">
        <div class="carousel-caption carousel1">
            <p>Hello, <?php echo htmlspecialchars($username); ?>!</p> 
            <h1>Welcome</h1>
            <p>Thank you for logging in. You can now book your parcel order</p>
            <button class="button" onclick="location.href='Booked.php'">Booked Now</button>
        </div>
    </div>
</div>
</body>
</html>
