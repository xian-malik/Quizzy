<?php
  error_reporting(0);
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "quizzy";

  $conn = new mysqli($servername, $username, $password, $database);

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error . "\n<br><a href='/install/index.php'>Please install database here if you don't have</a>"); }
?>
