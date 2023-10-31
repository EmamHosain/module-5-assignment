<?php
session_start();
include("./functions.php");

# role
# email 
# password
# username

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_btn"])) {
    $role = $_POST["role"] ?? "";
    $username = $_POST["username"] ?? "";
    $email = $_POST["email"];
    $password = $_POST["password"] ?? "";

    $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
   
    $array = [
        "role"=>$role,
        "username" =>$username,
        "email"=>$email,
        "password"=>$hashedPassword
        
    ];
    if(file_exists("./data/jsonData.txt")){
        $fp = fopen("./data/jsonData.txt","a");
        if(!empty($array)){
            $jsonData = json_encode($array,true);
            fwrite($fp,$jsonData . "\n");
           header("Location: role-management.php");
        }else{
            echo "array is empty";
        }
       
    }

}






?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>create page</title>
</head>

<body>
    <h1 class="text-center my-4">Create user role</h1>
    <div class="create_roll_container card w-25 m-auto my-4">
        <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST" class="p-4 ">
            <div class="form-group">
                <label for="roll">Roll</label>
                <input type="text" name="role" class="form-control" id="roll" aria-describedby="emailHelp" placeholder="Enter roll">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter username">
            </div>
            <div class="form-group">

                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">

            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>

            <button type="submit" name="submit_btn" class="btn btn-primary">Submit</button>
        </form>
    </div>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>