<?php

@include 'Connection.php';

session_start();
session_unset();
session_destroy();

header('location:LandingPage.php');

?>