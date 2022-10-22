<?php
session_start();

$_SESSION = array();
function logout()
{
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }
    session_destroy();
    header("location:../forms/login.html");
}

echo "HANDLE THIS PAGE";
?>
