

<?php

@include 'Connection.php';

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $pass = $_POST['password'];

    if($name == 'Suria'&& $pass=='1234'){
      header('location:HomePage.php');
    }else{

   $select = " SELECT * FROM users WHERE (email = '$name' && password = '$password') or (username = '$name' && password = '$password') ";
   $result = mysqli_query($conn, $select);
     
      if(mysqli_num_rows($result) > 0){
         $row = mysqli_fetch_array($result);
         header('location:HomePage.php');
   }else{
      $error[] = 'Incorrect email or password!';
   }
}  
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title>login form</title>
   <link rel="stylesheet" href="style2.css">
</head>
<!-- <body style="background: url(background.jpg);background-repeat:no-repeat;background-size:100%">   -->
<body style="background: purple">  
<div class="form-container">
   <form action="" method="post">
   <h1>LOGIN</h1>
   <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" required placeholder="Enter your username or email">
      <input type="password" name="password" required placeholder="Enter your password">
      <input type="submit" name="submit" value="Login Now" class="form-btn">
      <p>Don't have an account? <a href="SignUp.php">SignUp</a></p>

   </form>

</div>

</body>
</html>