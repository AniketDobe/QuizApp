<?php
    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $db = "quizapp";

    $conn = mysqli_connect("localhost", "root", "", "quizapp");

    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
?>