<?php
session_start();
include "./functions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]) ?? "";
    $username = trim($_POST["username"]) ?? "";
    $password = trim($_POST["password"]) ?? "";

    $errorUsername = "";
    $errorEmail = "";
    $errorPassword = "";
    $succesful = "";
    $role = "user";



    if (!is_valid_username($username)) {
        $errorUsername =  "* username is not valid";
    }
    if (!is_valid_email($email)) {
        $errorEmail = "* email is not valid";
    }
    if (!is_valid_password($password)) {
        $errorPassword = "* password is too short";
    }
    if (is_exits_username($username)) {
        $errorUsername = "* username is already exits";
    }
    if (is_exits_email($email)) {
        $errorEmail = "* email is already exits";
    }

    if ($errorPassword == "" && $errorUsername == "" && $errorEmail == "") {
      
        registerUsers($username,$email,$password);
       header("Location: ./alert.php");
        exit();
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

    <title>sign up form</title>
</head>

<body>
    <h1 class="text-center my-4">Registration form</h1>
    <div class="signup_form_container w-50 my-4 m-auto">
        <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST">

            <div class="form-group">
                <label for="username">Username</label> <span class="text-danger"><?php echo $errorUsername ?? "" ?></span>
               
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Enter username">

            </div>
            <div class="form-group">
                <label for="emial">Email</label> <span class="text-danger"><?php echo $errorEmail ?? "" ?></span>
                <input type="emial" class="form-control" name="email" id="emial" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="password">Password</label> <span class="text-danger"><?php echo $errorPassword ?? "" ?></span>
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
            </div>

            <button type="submit" class="btn btn-primary" name="signup">Signup</button>
            <div>
                <p class="mt-2">Alreay have an account? <a href="./login.php">Login</a></p>
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