<?php
session_start();
include("./functions.php");
$users = getUsers();



if (isset($_POST["delete_btn"])) {
    $userPassword = $_POST["userPassword"];
    // echo $userPassword;

    

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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <title>role management page</title>
</head>

<body>
    <div class="w-50 m-auto d-flex my-4 justify-content-between align-items-center">
        <h2 class="">Admin panel</h2> <button type="button" name="create_role" class="my-2 btn btn-success create_role_btn">Create user role</button>
        <div>
            <span>welcome </span> (<?php echo $_SESSION["role"] ?? ""; ?>) <button class="btn btn-dark"><a class="text-white" href="./logout.php">Log out</a></button>
        </div>
    </div>
    <form action="<?php $_SERVER["PHP_SELF"]; ?>" class="w-50 m-auto my-4 " method="POST">
        <div class="table_container card">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">SE</th>
                        <th scope="col">Username</th>
                        <th scope="col">Role</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                    $count = 0;
                    if (is_array($users)) {
                        foreach ($users as $user) {
                            if (is_array($user)) {
                                $count++;
                                echo " <tr>
                            <th scope='row'>{$count}</th>
                            <td>{$user['role']}</td>
                            <td>{$user['username']}</td>
                            <td>{$user['email']}

                           <td>
                        
                           <form action='./role-management.php' method='POST'>
                           <button onclick='passvalue(" . json_encode($user) . ")' name='edit_btn' type='button' id='show_modal_btn' class='show_modal_btn btn btn-warning'>Edit</button>
                           <input type='hidden' id='userPassword' name='userPassword' value='{$user['password']}'>
                          <button name='delete_btn' type='submit' class='btn btn-danger'>Delete</button></td>
                           </form>
                            </td>
                        </tr>";
                            }
                        }
                    }

                    ?>


                </tbody>
            </table>
        </div>

    </form>





    <!-- user edit modal start here  -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="GET">
                        <div class="mb-3">
                            <label for="role">Role</label>
                            <select class="d-block w-100 py-2 form-select" aria-label="Default select example" id="edit_roles" name="edit_roles">
                                <option selected value="user">User</option>
                                <option value="manager">Manager</option>
                                <option value="admin">Admin</option>

                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="edit_username" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="edit_email" placeholder="">
                        </div>

                        <div class="modal-footer d-flex justify-content-start">
                            <button type="submit" class="btn btn-primary" name="save_changes">Save changes</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!--  user edit modal end here  -->

    <!-- Optional JavaScript -->
    <script>
        document.getElementsByClassName('create_role_btn')[0].addEventListener("click", function() {
            window.location = 'create.php';
        })

        function passvalue($user) {
            document.getElementById("edit_roles").value = $user["role"];
            document.getElementById("edit_username").value = $user["username"];
            document.getElementById("edit_email").value = $user["email"];

        }
        // JavaScript to show the modal when the button is clicked
        document.querySelectorAll(".show_modal_btn").addEventListener("click", function() {
            $('#exampleModal').modal('show');
        });
    </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>