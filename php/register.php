<?php
if(isset($_POST['submit'])){
    $username = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

registerUser($username, $email, $password);

}

function registerUser($username, $email, $password){
    $user= array(
        'fullname' => $username,
        'email'=> $email,
        'password' => $password,       
    );
    //save data into the file
    if (checkUserExist($email)){
        echo "User Already Exists";
    }else{
        $folder= "../storage/users.csv";
        $detail = fopen($folder, "ra+"); 
        fputincsv($detail, $user);
         fclose($detail);
    
    // echo "OKAY";
    echo "User Successfully registered";
    }
}
    
   
    
//now check if the user exist
function checkUserExist($email){
    $folder= "../storage/users.csv";
    $detail = fopen($folder, "ra+"); 
    while (!feof($detail)){
        $line = fgetcsv($detail);
        if ($line[1] == $email){
            return true;
   }
 }
        return false;   
}
?>






