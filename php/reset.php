<?php
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $newpassword =$_POST['password'];

    resetPassword($email, $newpassword);
}

function resetPassword($email, $password){    
    $folder= "../storage/users.csv";
    $detail = fopen($folder, "r");     
    while (!feof($detail)){
        $line = fgetcsv($detail);
        if ($line[1] == $email){
            $line[2]=$password;
            fclose($detail);
            $detail = fopen($folder, "w");
            fputcsv($detail,$line);
            fclose($detail);
            echo "Password reset successfully";
            exit();  
        }
    }     
    
}


