<?php


function logout(){
   session_start(); 

    if ($_SESSION){
        session_destroy();
        header("location:../forms/index.php");
        exit();
    }else{
        header("location:../forms/login.php?error=User not logged in");
        exit();       
    }
}
logout()

?>
