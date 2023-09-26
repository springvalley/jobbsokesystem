<?php 
include "../classes/dbh.php";
include "../classes/login.repo.php";
include "../classes/login.controller.php";


//Sjekker om brukeren kom til denne siden på riktig måte
if(isset($_POST["submit"])){
    //Sjekker om formen som ble submitted er fra arbeidssøker eller giver, hvis denne verdien er 1 er det arbeidssøker. 
         $isJobApplicant = $_POST["jobapplicant"];
    //Henter verdiene fra formen. 
        $email = $_POST["email"];
        $password = $_POST["password"];

    $loginController = new LoginController($email, $password);
    
    if($isJobApplicant == 1){
        $loginController->signInUser();
    }    else{
        $loginController->signInEmployer();
    }
    header("location: ../index.php");

} ?>