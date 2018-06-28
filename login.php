<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    <script src="js/script.js"></script>
</head>
<body>    
</body>
</html>

<?php
include 'connectDB.php';

$email = filter_var($_POST["inputEmail"], FILTER_SANITIZE_STRING);
//echo $email;
$password = filter_var($_POST["inputPassword"], FILTER_SANITIZE_STRING);
//echo $password;

$sql = "SELECT * FROM users AS u
        LEFT JOIN user_type AS ut ON u.type = ut.type_id
        WHERE u.email='$email' AND u.password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "success";
        $userType = $row["type_name"] . "Home.php";
        $id = $row["user_id"];
        ?>
        <script>
        sessionStorage.setItem("currUserId", <?php echo $id ?>);
        console.log(sessionStorage.getItem("currUserId"));
        </script>
        <?php
        //header("location: " . $userType);
        //exit();
    }
} else {
    //echo "0 results";
    header("location: index.html");
    exit();
}

$conn->close();
?>