<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" href="images/goldcoin.jpg">
  <title>Signin</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/signin.css" rel="stylesheet">
  <script src="js/bootstrap.min.js"></script>
</head>
<body class="text-center">
  <form class="form-signin" action="index.php" method="post">
    <img class="mb-4" src="images/goldcoin.jpg" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>
    <!--<div class="checkbox mb-3">
      <label>
        <input id="rememberMeCheck" type="checkbox" value="remember-me"> Remember me
      </label>
    </div>-->
    <p id="loginError" style="color: red;"></p>
    <button id="signInButton" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
  </form>
</body>
</html>

<?php
if(isset($_POST["inputEmail"]) && isset($_POST["inputPassword"])) {
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
          $idStr = (string)$id;
          ?>
          <script>
          sessionStorage.setItem("currUserId", <?php echo $idStr ?>);
          //console.log(sessionStorage.getItem("currUserId"));
          </script>
          <?php
          header("location: " . $userType);
          exit();
      }
  } else {
      //echo "0 results";
      //header("location: index.html");
      //exit();
      ?>
      <script>
        $("#loginError").text("ERROR: email or password incorrect");
      </script>
      <?php
  }

  $conn->close();
}
?>