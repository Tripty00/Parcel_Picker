<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">   
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>welcome page</title>
</head>
<body>
    <!-- Navbar -->
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
            </ul>
            <button class="button" onclick="location.href='LoginPage.php'">Login</button>
          </div>
        </div>
      </nav>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
           <img src="img7.jpeg" class="d-block w-100-height" alt="img1"> 
            <div class="carousel-caption carousel1">
                <h1>Emargency? Deliver via Parcel</h1>
                <p>With Parcel Picker,you can get your item in the quickest time.Because your emergencies are Parcel's biggest concern!</p>
                <button class="button" onclick="location.href='SignUp.php'">Join Us</button>
            </div>
          </div>
          <div class="carousel-item">
            <img src="img7.jpeg" class="d-block w-100-height" alt="img2">
            <div class="carousel-caption carousel1">
                <h1>Riliable delivery</h1>
                <p>Send things to your destination
                    fast and securely.
                </p>
                <button class="button" onclick="location.href='SignUp.php'">Join Us</button>
            </div>
          </div>
          <div class="carousel-item">
            <img src="img7.jpeg" class="d-block w-100-height" alt="img3">
            <div class="carousel-caption carousel1">
                <h1>Trust Us</h1>
                <p>You can trust us to deliver your most confidential documents to the desired place absolutely intact right on time</p>
                <button class="button" onclick="location.href='SignUp.php.php'">Join Us</button>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div><!DOCTYPE html>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
<?php
include 'Database.php';
?>
