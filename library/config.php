<?php 

session_start();

if(!isset($_SESSION["lang"])){
    $_SESSION["lang"] = "en";
}