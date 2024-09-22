<?php
include 'Connection.php';
session_start(); 
if(isset($_POST['submit'])){
   $name = $_POST['name'];
   $password = $_POST['password'];
    if($name == 'Suria'&& $password=='1234'){
      header('location:HomePage.php');
    }else{
   $select = " SELECT * FROM riders WHERE (email = '$name' && password = '$password') or (ridername = '$name' && password = '$password') ";
   $result = mysqli_query($conn, $select);
      if(mysqli_num_rows($result) > 0){
         $row = mysqli_fetch_array($result);
         $_SESSION['ridername'] = $row['ridername']; 

         header('location:RiderHomePage.php');
         exit();
   }else{
      $error[] = 'Incorrect email or password!';
   }
}  
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <title>Rider login form</title>
   <link rel="stylesheet" href="style2.css">
</head>
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
      <p>Don't have an account? <a href="RiderSignUp.php">SignUp</a></p>
   </form>
</div>
</body>
</html>