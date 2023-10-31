<?php
# functions start here for signup.php 
function getUsers()
{
    $filePath = "./data/jsonData.txt";
    if (file_exists($filePath)) {
        $fp = fopen($filePath, "r");
        if (strlen(file_get_contents($filePath)) > 0) {
            while ($line = fgets($fp)) {
                $UsersAssocArray = json_decode($line, true);
                if (is_array($UsersAssocArray)) {
                    $allArray[] = $UsersAssocArray;
                }
            }
        }
    }
    return $allArray ?? [];
}
// print_r(getUsers());
function is_valid_username($username)
{
    if (preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
        return true;
    } else {
        return false;
    }
}
function is_valid_email($email)
{
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function is_valid_password($password)
{
    if ($password > 4) {
        return true;
    } else {
        return false;
    }
}

function is_exits_username($username)
{
    $users = getUsers();
    if (is_array($users)) {
        $length = count($users);
        for ($i = 0; $i < $length; $i++) {
            if (is_array($users[$i])) {
                foreach ($users[$i] as $key => $value) {
                    if ($value == $username) {
                        return true;
                    }
                }
            }
        }
    }
    return false;
}

function is_exits_email($email)
{
    $users = getUsers();
    if (is_array($users)) {
        $length = count($users);
        for ($i = 0; $i < $length; $i++) {
            if (is_array($users[$i])) {
                foreach ($users[$i] as $key => $value) {
                    if ($value == $email) {
                        return true;
                    }
                }
            }
        }
    }
    return false;
}

function registerUsers($username, $email, $password)
{
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $users = [
        "role" => "user",
        "username" => $username,
        "email" => $email,
        "password" => $hashedPassword,
    ];


    if (file_exists("./data/jsonData.txt")) {
        $fp = fopen("./data/jsonData.txt", "a");
        $jsonData = json_encode($users);
        fwrite($fp, $jsonData . "\n");
        fclose($fp);
    }
}
# <------function end for signup.php------->


# <------function start for login.php------->
function authenticateUser($email, $password)
{

    if (file_exists("./data/jsonData.txt")) {
        if (strlen(file_get_contents("./data/jsonData.txt")) > 0) {
            $fp = fopen("./data/jsonData.txt", "r");
            while ($line = fgets($fp)) {
                $array = json_decode($line, true);
                if (isset($array["email"]) == $email && password_verify($password, $array["password"])) {
                    return $array;
                }
            }
        }
    }
}


# <------function end for login.php------->


# <------function start for save changes------->

