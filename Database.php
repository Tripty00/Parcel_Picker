<?php
     $servername = "localhost"; 
     $username = "root"; 
     $password = ""; 
     $dbname = "Parcel_picker";
 
     $conn = new mysqli($servername, $username, $password);
 
    if ($conn->connect_error) {
        die("DB Connection failed: " . $conn->connect_error);
    } 
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    if ($conn->query($sql) === TRUE) {
        echo "Database created!<br>";
    } else {
        echo "Error creating database: " . $conn->error;
    }
    $conn->close();
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "CREATE TABLE IF NOT EXISTS users (
        uid INT PRIMARY KEY AUTO_INCREMENT,
        username VARCHAR(50) NOT NULL,
        password VARCHAR(50) NOT NULL,
        address VARCHAR(250) NOT NULL,
        phone VARCHAR(50) NOT NULL,
        optional_num VARCHAR(50) null,
        email VARCHAR(50) NOT NULL
    )";
    $sql1 = "CREATE TABLE IF NOT EXISTS riders (
        rid INT PRIMARY KEY AUTO_INCREMENT,
        ridername VARCHAR(50) NOT NULL,
        address VARCHAR(250) NOT NULL,
        nid VARCHAR(50) NOT NULL,
        licence VARCHAR(50) NOT NULL,
        phone VARCHAR(50) NOT NULL,
        optional_num VARCHAR(50) null,
        email VARCHAR(50) NOT NULL,
        password VARCHAR(50) NOT NULL
    )";
    $sql2 = "CREATE TABLE IF NOT EXISTS orders (
        ordersid INT PRIMARY KEY AUTO_INCREMENT,
        senderName VARCHAR(50) NOT NULL,
        senderPhone VARCHAR(11) NOT NULL,
        senderAddress VARCHAR(250) NOT NULL,
        receiverName VARCHAR(50) NOT NULL,
        receiverPhone VARCHAR(11) NOT NULL,
        receiverAddress VARCHAR(250) NOT NULL,
        weightChecker VARCHAR(250) NOT NULL,
        status VARCHAR(250) NOT NULL 
    )";
    if ($conn->query($sql) === TRUE) {
        echo "Users table created!<br>";
    } else {
        echo "Error creating table: " . $conn->error;
    }
    if ($conn->query($sql1) === TRUE) {
        echo "Riders table created!<br>";
    } else {
        echo "Error creating table: " . $conn->error;
    }
    if ($conn->query($sql2) === TRUE) {
        echo "Orders table created!<br>";
    } else {
        echo "Error creating table: " . $conn->error;
    }
    $conn->close();

?>