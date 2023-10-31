<?php
session_start();
include "./functions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $login_email = trim($_POST["login_email"]) ?? "";
  $login_password = trim($_POST["login_password"]) ?? "";

  $errorEmail = $errorAuthencate = "";

  if (!is_valid_email($login_email)) {
    $errorEmail = "* email is not valid";
  }

  $users = authenticateUser($login_email, $login_password);
  if(is_array($users)){
    $_SESSION["role"] = $users["role"] ?? "";
    $_SESSION["email"] = $users["email"] ?? "";
    $_SESSION["username"] = $users["username"] ?? "";
    header("Location: index.php");
  }else{
    $errorAuthencate = "Authentication failed!";
  }
}



?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <title>login page</title>
</head>

<body>
  <h1 class="text-center my-4">welcome login page</h1>
  <div class="login_form_container w-50 m-auto my-4">

    <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST">
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label> <span class="text-danger"><?php echo $errorEmail ?? ""; ?></span>
        <input type="email" class="form-control" name="login_email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="login_password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        <span class="text-danger"><?php echo $errorAuthencate ?? ""; ?></span>
      </div>
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Remember me</label>
      </div>
      <button type="submit" class="btn btn-primary">Log in</button>
      <div>
        <p class="mt-2">Don't have an account? <a href="./signup.php">Sign in</a></p>
      </div>
    </form>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>