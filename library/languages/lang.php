<?php
require "english.php";
require "norwegian.php";

require get_language_file();
function get_language_file()
{
    if(isset($_SESSION["lang"])){
        return $_SESSION["lang"] .".php";
    }else{
        if(session_status() == PHP_SESSION_NONE){session_start();} 
        $_SESSION["lang"] = "english";
        return $_SESSION["lang"]. ".php";
    }
}

   /**
     * This function is used to translate words.
     * @param string The string you want to translate
     * @return mixed either the string you wanted or if it does not exist, an error message
     */

function translate($str){
    global $lang;
    if(!empty($lang[$str])){
        return $lang[$str];
    }else{
        return "Ikke oversatt!";
    }
}
