<?php
session_start();
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (loginUser($email, $password)){
        header('location:.../dashboard.php');
    }else{
        echo 'Incorrect Details';
        echo '<meta http-equiv="refresh" content="2; url=../forms/login.html">';
    }
}

function loginUser($email, $password)
{
    $folder= "../storage/users.csv";
    $detail = fopen($folder, "r"); 

    while (!feof($detail)){
        $line= fgetcsv($detail);
        if ($line[1] == $email && $line[2] == $password) {
            $_SESSION['username'] = $line[0];
            header("location:../dashboard.php");
            exit()
        }else{
            echo '<script>
            alert(" Sorry... Email or Password is incorrect");
            window.location.href="../forms/logins.html";
            </script>';
        }

        }
    }

    fclose($database);
    if ($success=true){
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['password']=$password;
        session_write_close();
        header("location:../dashboard.php");
   
}


   
