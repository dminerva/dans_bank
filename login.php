<?php

include 'connectDB.php';

$email = filter_var($_POST["inputEmail"], FILTER_SANITIZE_STRING);
//echo $email;
$password = filter_var($_POST["inputPassword"], FILTER_SANITIZE_STRING);
//echo $password;

$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "success";
        header("location: customerHome.php");
        exit();
    }
} else {
    //echo "0 results";
    header("location: index.html");
    exit();
}

$conn->close();
?>