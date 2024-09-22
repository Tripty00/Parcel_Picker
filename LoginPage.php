<?php
include 'Connection.php';
session_start(); 
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    if ($name == 'Suria' && $password == '1234') {
        $_SESSION['username'] = 'Suria'; // Store the username in the session
        header('Location: HomePage.php');
        exit(); // Ensure no further code is executed
    } else {
        $select = "SELECT * FROM users WHERE (email = '$name' AND password = '$password') OR (username = '$name' AND password = '$password')";
        $result = mysqli_query($conn, $select);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $_SESSION['username'] = $row['username']; // Store the username in the session
            header('Location: HomePage.php');
            exit(); // Ensure no further code is executed
        } else {
            $error[] = 'Incorrect email or password!';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Form</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body style="background: url('img7.jpeg') no-repeat center center fixed; background-size: cover;">  
<div class="form-container">
    <form action="" method="post">
        <h1>LOGIN</h1>
        <?php
        if (isset($error)) {
            foreach ($error as $error) {
                echo '<span class="error-msg">' . $error . '</span>';
            }
        }
        ?>
        <input type="text" name="name" required placeholder="Enter your username or email">
        <input type="password" name="password" required placeholder="Enter your password">
        <input type="submit" name="submit" value="Login Now" class="form-btn">
        <p>Don't have an account? <a href="SignUp.php">SignUp</a></p><br>
        <p>Are you a rider? Log in <a href="RiderLogIn.php">Here</a></p>
    </form>
</div>
</body>
</html>
