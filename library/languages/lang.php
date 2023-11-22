<?php
require "english.php";
require "norwegian.php";

require get_language_file();
function get_language_file()
{
    if(isset($_SESSION["lang"])){
        return $_SESSION["lang"] .".php";
    }else{
        session_start();
        $_SESSION["lang"] = "english";
        return $_SESSION["lang"]. ".php";
    }
}


function translate($str){
    global $lang;
    if(!empty($lang[$str])){
        return $lang[$str];
    }else{
        return "Ikke oversatt!";
    }
}
