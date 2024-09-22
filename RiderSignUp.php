<?php

include 'Connection.php';

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $email = $_POST['email'];
   $address = $_POST['address'];
   $phn = $_POST['number'];
   $phn2 = $_POST['number2'];
   $nid = $_POST['nid'];
   $licence = $_POST['licence'];
   $password = $_POST['password'];
   $confirmpassword = $_POST['confirmpassword'];

   $select = " SELECT * FROM riders WHERE email = '$email' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $error[] = 'User already exist!';
   }else{
      if($password != $confirmpassword){
         $error[] = 'Password not matched!';
      }else{
         $insert = "INSERT INTO riders(ridername,email,address,phone,optional_num,nid,licence,password) VALUES('$name','$email','$address','$phn','$phn2','$nid','$licence','$password')";
         $res = $conn->query($insert);
         if ($res == TRUE) {
            header('location:RiderLogIn.php');
         }
         }
         $conn->close();
      }
   };

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title> Rider Sign Up form</title>
   <link rel="stylesheet" href="style2.css">
</head>
 <body style="background: Purple">    
<div class="form-container">

   <form action="" method="post">
   <h1>SIGN UP</h1>
   <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
   ?>
      <input type="text" name="name" required placeholder="Enter your username">
      <input type="email" name="email" required placeholder="Enter your email">
      <input type="text" name="address" required placeholder="Enter your address">
      <input type="text" name="number" required placeholder="Enter your phone number">
      <input type="text" name="number2" placeholder="Enter your phone number(optional)">
      <input type="text" name="nid" required placeholder="Enter your NID number">
      <input type="text" name="licence" required placeholder="Enter your licence number">
      <input type="password" name="password" required placeholder="Enter your password">
      <input type="password" name="confirmpassword" required placeholder="Confirm your password">
      <input type="submit" name="submit" value="Sign Up" class="form-btn">
      <p>Already have an account? <a href="RiderLogIn.php">Log in</a></p><br>

   </form>

</div>

</body>
</html>
 
 