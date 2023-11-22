<?php 
session_start();
$current = $_SESSION["lang"];
    if($current == "english"){
        $_SESSION["lang"] = "norwegian";
    }else{
        $_SESSION["lang"] = "english";
    }

    /**Note that this may not work with secure pages (HTTPS) and it's a pretty bad idea overall as the header can be hijacked, sending the user to some other destination. The header may not even be sent by the browser. */
    header('Location: ' . $_SERVER['HTTP_REFERER']);