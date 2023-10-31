<?php
session_start();


?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>user page</title>
</head>

<body>

    <div class="user_container my-4 m-auto w-25">
        <div class="d-flex justify-content-between align-items-center  my-4">
            <h2 class="" style="display:inline-block">welcome <?php echo $_SESSION["username"]; ?></h2> <button class="bg-dark"><a class="text-white" href="./login.php">log out</a></button>
        </div>
        <div class="card" style="width: 25rem;">
            <div class="card-body">
                <h5 class="text-center card-title">User Identity</h5>
                <p class="mb-2"> <strong>Username : </strong><?php echo $_SESSION["username"]; ?></p>
                <p class="mb-2 "> <strong>Role : </strong><?php echo $_SESSION["role"]; ?></p>
                <p class=""> <strong>Email : </strong><?php echo $_SESSION["email"]; ?></p>
               
                 
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>