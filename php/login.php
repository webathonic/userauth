<?php
session_start();
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    loginUser($email, $password);
}

function loginUser($email, $password)
{
    $folder = "../storage/users.csv";
    $detail = fopen($folder, "r");

    while (!feof($detail)) {
        $line = fgetcsv($detail);
        if ($line[1] == $email && $line[2] == $password) {
            $_SESSION['username'] = $line[0];
            header("location:../dashboard.php");
            exit();
        } else {
            echo " Sorry... Email or Password is incorrect";
            fclose($detail);
        }
    }
}
